<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'password' => 'required|min:6|different:current_password',
            'confirm_password' => 'required|min:6|same:password',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Vui lòng nhập mật khẩu mới.',
            'password.min' => 'Mật khẩu mới phải chứa ít nhất :min ký tự.',
            'password.different' => 'Mật khẩu mới phải khác với mật khẩu hiện tại.',
            'confirm_password.required' => 'Vui lòng nhập xác nhận mật khẩu.',
            'confirm_password.min' => 'Xác nhận mật khẩu phải chứa ít nhất :min ký tự.',
            'confirm_password.same' => 'Xác nhận mật khẩu phải giống với mật khẩu mới.',
        ];
    }
}
