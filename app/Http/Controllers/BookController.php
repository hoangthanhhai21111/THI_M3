<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    function index(Request $request)
    {
        $key = $request->key ?? '';
        $query = Book::query(true);
        if($key){
            $query->orWhere('id',$key)
           ->orWhere('name_book','LIKE','%'.$key.'%')
           ->orWhere('author','LIKE','%'.$key.'%')
           ->orWhere('book_category','LIKE','%'.$key.'%');
        }
        $books = $query->paginate(5);
        $params = [

                    'f_key' => $key,
                    'books' => $books,
                ];
        return view('books.index',$params);
    }
    function edit($id){
        $book= Book::find($id);
        return view('books.edit',compact('book'));

    }
    function update($id,UpdateBookRequest $request){
        $book= Book::find($id);
        $book ->name_book= $request->name_book;
        $book ->book_category= $request->book_category;
        $book ->author= $request->author;
        $book ->number_of_pages= $request->number_of_pages;
        $book ->publishing_year= $request->publishing_year;
        $book ->ISBN =  $request->ISBN;
        try {
            $book->save();
            return redirect()->route('books.index')->with('success', 'cập nhật' . ' ' . $request->name_book . ' ' .  ' thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('books.index')->with('error', 'cập nhật' . ' ' . $request->name_book . ' ' .  ' không thành công');
        }
        dd($request->all());
    }
    function store(StoreBookRequest $request){
        $book = new Book();
        $book ->name_book= $request->name_book;
        $book ->book_category= $request->book_category;
        $book ->author= $request->author;
        $book ->number_of_pages= $request->number_of_pages;
        $book ->publishing_year= $request->publishing_year;
        $book ->ISBN =  $request->ISBN;
        try {
            $book->save();
            return redirect()->route('books.index')->with('success', 'Thêm' . ' ' . $request->name_book . ' ' .  ' thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('books.index')->with('error', 'Thêm' . ' ' . $request->name_book . ' ' .  ' không thành công');
        }

    }
    function destroy($id){
        try {
            $books = Book::findOrFail($id)->delete();
            return response()->json('ok', 200);
        } catch (Exception $e) {
            Log::error(' loi' . $e->getMessage() . ' ở file ' . $e->getFile() . ' dòng ' . $e->getLine());
            return response()->json('errors', 500);
        }

    }
}
