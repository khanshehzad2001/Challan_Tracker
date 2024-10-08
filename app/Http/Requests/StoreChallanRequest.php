<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChallanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'challan_number' => 'required|string|unique:challans,challan_number',
            'bill_number' => 'required|string',
            'customer_name' => 'nullable|string',
            'issue_date' => 'required|date',
            'description' => 'nullable|string',
        ];
    }
}
