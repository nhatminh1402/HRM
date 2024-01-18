<?php

namespace App\Http\Requests\Auth;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'current_password' => 'required',
            'new_password' => 'required|min:6|different:current_password',
            'confirm_password' => 'required|min:6|same:new_password',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'current_password.min' => 'Mật khẩu hiện tại phải chứa ít nhất :min ký tự.',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới.',
            'new_password.min' => 'Mật khẩu mới phải chứa ít nhất :min ký tự.',
            'new_password.different' => 'Mật khẩu mới phải khác với mật khẩu hiện tại.',
            'confirm_password.required' => 'Vui lòng nhập xác nhận mật khẩu.',
            'confirm_password.min' => 'Xác nhận mật khẩu phải chứa ít nhất :min ký tự.',
            'confirm_password.same' => 'Xác nhận mật khẩu phải giống với mật khẩu mới.',
        ];
    }
}