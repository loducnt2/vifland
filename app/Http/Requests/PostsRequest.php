<?php
// viết validate cho cập nhật tin tức trong publish posts
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            // dùng unique để hạn chế việc post bài trùng với bài đã có trong bảng news
            'title' => 'unique:news',
            'category_name' =>'unique:news_category'
        ];

    }
    public function messages()
    {
    return [
        'title.unique' => 'Bài viết đã có, vui lòng sử dụng tiêu đề khác',
        'category_unique'=> 'Bài viết đã có',
    ];
    }

}
