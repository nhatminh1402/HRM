<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateDepartmentRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',    
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên phòng ban .',
            'name.string' => 'Tên chức vụ phải là một chuỗi.',
            'name.max' => 'Tên chức vụ không được vượt quá :max ký tự.',
            'description.string' => 'Mô tả phải là một chuỗi.',
            'description.required' => 'Vui lòng nhập mô tả phòng ban .',
        ];
    }
}
