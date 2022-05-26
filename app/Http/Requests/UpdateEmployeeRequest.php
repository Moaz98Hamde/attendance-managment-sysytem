<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|unique:employees,email,' . $this->employee->id,
            'password' => 'nullable|min:6',
            'PIN' => 'required|numeric|digits:6|unique:employees,PIN,' . $this->employee->id
        ];
    }
}