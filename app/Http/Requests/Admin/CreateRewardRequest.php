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
            'code_reward' => 'required',
            'name' => 'required|max:255',
            'description' => 'nullable|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'code_reward.required' => 'Vui lòng không để trống!',
            'name.required' => 'Vui lòng nhập tên khen thưởng!',
            'name.uniqle' => 'Tên khen thưởng đã tồn tại!',
            'name.max' => 'Độ dài tối đa không được vượt quá 255 ký tự!',
            'description.max' => 'Độ dài tối đa không được vượt quá 255 ký tự!',
        ];
    }
}
