<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrapeSortWineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grape_sort_wine', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wine_id');
            $table->unsignedBigInteger('grape_sort_id');

            $table->foreign('wine_id')->references('id')->on('wines')->onDelete('cascade');
            $table->foreign('grape_sort_id')->references('id')->on('grape_sorts')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grape_sort_wine');
    }
}
