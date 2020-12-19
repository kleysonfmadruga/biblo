<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->uuid('copy_id');
            $table->uuid('user_id');
            $table->dateTime('borrowing_datetime');
            $table->dateTime('return_datetime');
            $table->boolean('is_return_delayed');

            $table->timestamps();
            $table->primary(array('copy_id', 'user_id'));
            
            $table->foreign('copy_id')
                    ->references('id')
                    ->on('copies')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
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
        Schema::dropIfExists('borrowings');
    }
}
