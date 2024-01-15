<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class FormLoginRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Vui lòng nhập địa chỉ email đăng nhập',
            'email.email' => 'Địa chỉ email không hợp lệ',
            'email.exists' => 'Email chưa được đăng ký trong hệ thống!',
            'password.required' => 'Vui lòng nhập mật khẩu đăng nhập',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $numberLoginFailed = session('numberLoginFailed');

        if ($numberLoginFailed == null) {
            Session::put('numberLoginFailed', 1);
        } else {
            Session::put('numberLoginFailed', $numberLoginFailed + 1);
        }

        throw (new ValidationException($validator))->errorBag($this->errorBag)->redirectTo($this->getRedirectUrl());
    }
}
