<?php

namespace App\Http\Requests\Admin;

use App\Enums\DegreesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Validator;

class CreateEmployeeRequest extends FormRequest
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
            'image_file' => 'required|image|mimes:jpeg,png,jpg',
            'full_name' => 'bail|required',
            'phone_number' => 'bail|required|numeric|digits:10',
            'email' => 'bail|required|email|unique:employees,email',
            'identify_number' => 'bail|required|numeric|digits:12',
            'dob' => 'bail|required|date',
            'gender' => 'bail|required|in:0,1',
            'degree' => 'bail|required|in:' . DegreesEnum::THPT . ',' . DegreesEnum::CAO_DANG . ',' . DegreesEnum::DAI_HOC . ',' . DegreesEnum::CAO_HOC,
            'major' => 'bail|required|string|max:255',
            'department_id' => 'bail|required|exists:departments,id',
            'position_id' => 'bail|required|exists:positions,id',
            'province_id' => 'bail|required|exists:provinces,id',
            'district_id' => 'bail|required|exists:districts,id',
            'ward_id' => 'bail|required|exists:wards,id',
            'password' => 'bail|required|min:6',
            're_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Vui lòng nhập họ tên.',
            'phone_number.required' => 'Vui lòng nhập số điện thoại.',
            'phone_number.integer' => 'Số điện thoại không hợp lệ',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'identify_number.required' => 'Vui lòng nhập số CCCD.',
            'identify_number.numeric' => 'Số CCCD không hợp lệ.',
            'identify_number.digits' => 'Số CCCD phải có độ dài là 12 chữ số.',
            'dob.required' => 'Vui lòng nhập ngày sinh.',
            'dob.date' => 'Ngày sinh không hợp lệ.',
            'gender.required' => 'Vui lòng chọn giới tính.',
            'gender.in' => 'Giới tính không hợp lệ.',
            'degree.required' => 'Vui lòng chọn bằng cấp.',
            'degree.in' => 'Bằng cấp không hợp lệ.',
            'major.required' => 'Vui lòng nhập chuyên môn.',
            'department_id.required' => 'Vui lòng chọn phòng ban.',
            'department_id.exists' => 'Phòng ban không tồn tại.',
            'position_id.required' => 'Vui lòng chọn chức vụ.',
            'position_id.exists' => 'Chức vụ không tồn tại.',
            'province_id.required' => 'Vui lòng chọn tỉnh/thành phố.',
            'province_id.exists' => 'Tỉnh/thành phố không tồn tại.',
            'district_id.required' => 'Vui lòng chọn quận/huyện.',
            'district_id.exists' => 'Quận/huyện không tồn tại.',
            'ward_id.required' => 'Vui lòng chọn phường/xã.',
            'ward_id.exists' => 'Phường/xã không tồn tại.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự.',
            're_password.required' => 'Vui lòng nhập lại mật khẩu.',
            're_password.same' => 'Mật khẩu xác nhận không khớp với mật khẩu.',
            'email.unique' => 'Email đã tồn tại trong hệ thống.'
        ];
    }
}
