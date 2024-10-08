<?php

namespace App\Http\Controllers;

use App\Models\Challan;
use App\Http\Requests\StoreChallanRequest;
use App\Http\Requests\UpdateChallanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChallanController extends Controller
{   

    public function last10challan()
    {
        $challans = Challan::orderBy('created_at', 'desc')->take(10)->get();
        return view('dashboard', compact('challans'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = (string) $request->query('search'); 

        $challans = Challan::when($search, function ($query, $search) {
            return $query->where('challan_number', 'like', "%{$search}%")
                        ->orWhere('bill_number', 'like', "%{$search}%")
                        ->orWhere('customer_name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
        })->orderBy('created_at', 'desc')->paginate(15);

        return view('challans.index', compact('challans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('challans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChallanRequest $request)
    {
        try {
            $challan = Challan::create($request->validated());
            return redirect()->route('dashboard')->with('success', 'Challan created successfully.');
        } catch (\Exception $e) {
            Log::error('Challan creation error: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the challan.'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Challan $challan)
    {
        return view('challans.show', compact('challan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Challan $challan)
    {
        return view('challans.edit', compact('challan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChallanRequest $request, Challan $challan)
    {
        $challan->update($request->validated());
        return redirect()->route('challans.index')->with('success', 'Challan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Challan $challan)
    {
        $challan->delete();
        return redirect()->route('challans.index')->with('success', 'Challan deleted successfully.');
    }
}
