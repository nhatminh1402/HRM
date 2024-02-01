<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagesTrainRequest extends FormRequest
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

    public function rules()
    {
        return [
            'image.*' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'image.*.required' => 'Vui lòng chọn một hình ảnh.',
            'image.*.image' => 'Tệp tải lên phải là hình ảnh.',
            'image.*.mimes' => 'Hình ảnh chỉ được chấp nhận với định dạng: jpeg, jpg, png, gif, svg.',
            'image.*.max' => 'Kích thước hình ảnh không được vượt quá 5MB.',
        ];
    }
}
