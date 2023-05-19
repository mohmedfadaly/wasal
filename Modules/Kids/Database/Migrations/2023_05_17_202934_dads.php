<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('num')->nullable();
            $table->date('date')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('phone')->nullable();
            $table->string('learning')->nullable();
            $table->string('work')->nullable();
            $table->unsignedBigInteger('kid_id');
            $table->foreign('kid_id')->references('id')->on('kids')->onDelete('cascade');
            $table->enum('smoking',['0','1'])->nullable();    // مدخن
            $table->longText('smoking_com')->nullable();
            $table->enum('obstruction',['0','1'])->nullable();  // اعاقة
            $table->longText('obstruction_com')->nullable();
            $table->enum('chronic_diseases',['0','1'])->nullable();  // امراض مزمنة
            $table->longText('chronic_diseases_com')->nullable();
            $table->enum('genetic_diseases',['0','1'])->nullable();  // امراض وراثية
            $table->longText('genetic_diseases_com')->nullable();
            $table->enum('health_problems',['0','1'])->nullable(); // مشاكل صحية
            $table->longText('health_problems_com')->nullable();
            $table->enum('mental_state',['0','1'])->nullable();  //  الحالة النفسية
            $table->longText('mental_state_com')->nullable();
            $table->enum('communication',['0','1','2'])->nullable();  //  التواصل
            $table->longText('communication_com')->nullable();
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
        Schema::dropIfExists('dads');
    }
}
