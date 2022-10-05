<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name_book');
            $table->string('book_category');
            $table->string('author');
            $table->Integer('ISBN');
            $table->Integer('number_of_pages');
            $table->date('publishing_year');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
