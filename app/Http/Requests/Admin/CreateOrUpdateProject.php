<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrUpdateProject extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên chức vụ.',
            'name.string' => 'Tên chức vụ phải là một chuỗi.',
            'name.max' => 'Tên chức vụ không được vượt quá :max ký tự.',
            'description.string' => 'Mô tả phải là một chuỗi.',
        ];
    }
}
