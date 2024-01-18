<?php

namespace App\Http\Requests;

use App\Traits\ApiTimeSheet;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;


class TimesheetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    use ApiTimeSheet;
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
            'employee_id' => 'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'employee_id.required' => 'The employee ID field is required.',
            'employee_id.integer' => 'The employee ID must be an integer.',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        $this->failedValidate($validator);
    }
}