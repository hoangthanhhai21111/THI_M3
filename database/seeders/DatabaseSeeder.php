<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('books')->insert(
        [
            [
                "name_book"=>"doraemon truyện dài",
                "book_category"=>"truyện Tranh",
                "author"=> "Fujiko Fujio",
                "ISBN"=>rand(100,1000),
                "number_of_pages"=> 200,
                "publishing_year"=>'1969-12-02'

            ],
            [
                "name_book"=>"doraemon truyện ngắn",
                "book_category"=>"truyện Tranh",
                "author"=> "Fujiko Fujio",
                "ISBN"=>rand(100,1000),
                "number_of_pages"=> 200,
                "publishing_year"=>'1969-12-02'

            ],
        ]
    );
    }
}
