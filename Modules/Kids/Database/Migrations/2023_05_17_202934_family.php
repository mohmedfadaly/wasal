<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Family extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('num_of')->nullable();
            $table->string('num_of_pro')->nullable();
            $table->string('num_of_sis')->nullable();
            $table->string('sort_of')->nullable();
            $table->string('bro_autism')->nullable();
            $table->string('has_twins')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('with_live')->nullable();
            $table->string('income')->nullable();
            $table->unsignedBigInteger('kid_id');
            $table->foreign('kid_id')->references('id')->on('kids')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('family');
    }
}
