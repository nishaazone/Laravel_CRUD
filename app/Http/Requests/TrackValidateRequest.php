<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrackValidateRequest extends FormRequest
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
            'product_name' => 'required',
            'quantity_produced'=> 'required',
            'quantity_sold' => 'required',
            'quantity_unit'=> 'required',
            'reporting_period'=> 'required',
            'start_date'=> 'required',
            'end_date'=> 'required',
        ];
    }
}
