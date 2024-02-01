<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateRewardRequest extends FormRequest
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
            'name' => 'required|max:255|unique:rewards,name',
            'description' => 'nullable|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên khen thưởng!',
            'name.unique' => 'Tên khen thưởng đã tồn tại!',
            'name.max' => 'Độ dài tối đa không được vượt quá 255 ký tự!',
            'description.max' => 'Độ dài tối đa không được vượt quá 255 ký tự!',
        ];
    }
}
