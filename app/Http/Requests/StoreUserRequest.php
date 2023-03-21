<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:users|max:200',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required'
        ];
    }
        public function messages()
        {
            return [
                'name.required' => ':attribute không được để trống',
                'name.unique' => ':attribute không được trùng lặp dữ liệu',
                'name.max' => 'Trường :attribute bắt buộc bé hơn :max',
                'email.required' => ':attribute không được để trống',
                'password.required' => ':attribute không được để trống',
                'phone.required' => ':attribute không được để trống'
            ];
        }
        public function attributes()
        {
            return [
                'name' => 'Tên khách hàng',
                'email' => 'Email',
                'password' => 'Mật khẩu',
                'phone' => 'Số điện thoại'
            ];
        }
}
