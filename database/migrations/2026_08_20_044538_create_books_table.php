<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // pk
            $table->string('cover');
            $table->string('title'); // 255
            $table->integer('price'); // big 11 digit ++
            $table->text('description'); // no batas
            $table->string('language');
            $table->string('publisher');
            $table->string('writer');
            $table->date('release_date');
            $table->integer('page_of_book');
            $table->foreignId('book_category_id')->constrained('book_categories')->onDelete('cascade');

            $table->timestamps(); // lebih rinci + menit waktu //
        });
    }
// rollback
// add_to_nametable_table
// change_in_nametable_table
// drop_to_nametable_table
// create_to_nametable_table    


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
