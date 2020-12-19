<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCopiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code', 20);
            $table->char('book_isbn', 13);

            $table->timestamps();

            $table->unique(array('book_isbn', 'code'));
            $table->foreign('book_isbn')
                    ->references('isbn')
                    ->on('books')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('copies');
    }
}
