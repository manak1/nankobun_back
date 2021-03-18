<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShindansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shindans', function (Blueprint $table) {
            $table->string('id',36)-> primary();
            $table->timestamps(); 
            $table->string('name');
            $table->string('emoji');
            $table->string('author');
            $table->string('unit');
            $table->integer('height');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shindans');
    }
}
