<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillValidateRequest extends FormRequest
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
            'component_name' => 'required',
            'part_number'=> 'required',
            'description' => 'required',
            'quantity_per_unit'=> 'required',
            'quantity_purchased'=> 'required',
            'quantity'=> 'required',
            'quantity_unit'=> 'required',
            'source'=> 'required',
            'supplier'=> 'required',
            'track_id'=>'required',
        ];
    }
}
