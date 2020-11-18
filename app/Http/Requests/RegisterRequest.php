<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'username' => 'unique:user',
            'email' => 'unique:user',
        ];

    }
    public function messages()
    {
    return [
        'username.unique' => 'Tên tài khoản đã có, vui lòng sử dụng tên khác',
        'email.unique' => 'Địa chỉ email đã có ! vui lòng sử dụng địa chỉ khác',
        // 'email.ends_with'=> 'Địa chỉ email phải kết thúc với đuôi @gmail',
        // 'email.email' => 'Nhập đúng định dạng Email',
    ];
    }


}
