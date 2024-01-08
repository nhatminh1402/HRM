<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class CapChaFormRequest extends FormRequest
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
            'captcha' => 'required|captcha',
        ];
    }

    public function messages(): array
    {
        return [
            'captcha.required' => 'Vui lòng xác minnh để tiếp tục đăng nhập',
            'captcha.captcha' => 'Xác minh thất bại!',
        ];
    }
}
