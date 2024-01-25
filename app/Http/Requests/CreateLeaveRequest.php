<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLeaveRequest extends FormRequest
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
            'description' => 'required|string',
            'start_leave' => 'required|date',
            'end_leave' => 'required|date',
            'number_days' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Trường mô tả là bắt buộc.',
            'description.string' => 'Trường mô tả phải là một chuỗi.',
            'start_leave.required' => 'Trường ngày bắt đầu là bắt buộc.',
            'start_leave.date' => 'Trường ngày bắt đầu phải là một ngày hợp lệ.',
            'end_leave.required' => 'Trường ngày kết thúc là bắt buộc.',
            'end_leave.date' => 'Trường ngày kết thúc phải là một ngày hợp lệ.',
            'number_days.required' => 'Trường số ngày là bắt buộc.',
            'number_days.numeric' => 'Trường số ngày phải là một số.',
        ];
    }
}
