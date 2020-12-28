<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartlines', function (Blueprint $table) {
            $table->integer('Quantity');
            $table->float('Amount', 8, 2);
            $table->timestamps();

            $table->foreignId('b_Id')->references('b_Id')->on('books');
            $table->foreignId('c_Id')->references('c_Id')->on('carts');
            $table->primary(['b_Id', 'c_Id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartlines');
    }
}
