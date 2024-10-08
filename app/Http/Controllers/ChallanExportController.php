<?php

namespace App\Http\Controllers;

use App\Models\Challan;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use Illuminate\Http\Request;

class ChallanExportController extends Controller
{
    public function export($format = 'xlsx')
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Challan Number');
        $sheet->setCellValue('C1', 'Bill Number');
        $sheet->setCellValue('D1', 'Customer Name');
        $sheet->setCellValue('E1', 'Issue Date');
        // $sheet->setCellValue('G1', 'Description');

        $challans = Challan::all();
        $row = 2; 
        foreach ($challans as $challan) {
            $sheet->setCellValue('A' . $row, $challan->id);
            $sheet->setCellValue('B' . $row, $challan->challan_number);
            $sheet->setCellValue('C' . $row, $challan->bill_number);
            $sheet->setCellValue('D' . $row, $challan->customer_name);
            $sheet->setCellValue('E' . $row, $challan->issue_date->format('Y-m-d'));
            // $sheet->setCellValue('G' . $row, $challan->description);
            $row++;
        }

        if ($format == 'csv') {
            $writer = new Csv($spreadsheet);
            $mimeType = 'text/csv';
            $fileName = 'challans.csv';
        } else {
            $writer = new Xlsx($spreadsheet);
            $mimeType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
            $fileName = 'challans.xlsx';
        }

        return response()->stream(
            function () use ($writer) {
                $writer->save('php://output');
            },
            200,
            [
                'Content-Type' => $mimeType,
                'Content-Disposition' => "attachment; filename=\"$fileName\"",
            ]
        );
    }
}
