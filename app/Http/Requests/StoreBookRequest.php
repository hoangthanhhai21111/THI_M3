<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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

    public function rules()
    {
        return [

            'name_book'         => 'required|unique:books',
            'author'            => 'required',
            'book_category'     => 'required',
            'author'            => 'required',
            'number_of_pages'   => 'required',
            'publishing_year'   => 'required',
            'ISBN'              => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name_book.required'        => 'Vui lòng nhập tên sách',
            'name_book.unique'          => 'Tên đã tồn tại ',
            'author.required'           => 'Vui lòng nhập tên tác giã',
            'book_category.required'    => 'Vui lòng chọn thể loại',
            'number_of_pages.required'  => 'Vui lòng nhập số trang',
            'publishing_year.required'  => 'Vui lòng nhập năm xuất bản',
            'ISBN.required'             => 'Vui lòng nhập năm mã sách',
        ];
    }
}
