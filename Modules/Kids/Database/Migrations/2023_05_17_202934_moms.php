<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Moms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('num')->nullable();
            $table->date('date')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('phone')->nullable();
            $table->string('learning')->nullable();
            $table->string('work')->nullable();
            $table->unsignedBigInteger('kid_id');
            $table->foreign('kid_id')->references('id')->on('kids')->onDelete('cascade');
            $table->string('smoking')->nullable();    // مدخن
            $table->longText('smoking_com')->nullable();
            $table->string('obstruction')->nullable();  // اعاقة
            $table->longText('obstruction_com')->nullable();
            $table->string('chronic_diseases')->nullable();  // امراض مزمنة
            $table->longText('chronic_diseases_com')->nullable();
            $table->string('genetic_diseases')->nullable();  // امراض وراثية
            $table->longText('genetic_diseases_com')->nullable();
            $table->string('health_problems')->nullable(); // مشاكل صحية
            $table->longText('health_problems_com')->nullable();
            $table->string('mental_state')->nullable();  //  الحالة النفسية
            $table->longText('mental_state_com')->nullable();
            $table->string('communication')->nullable();  //  التواصل
            $table->longText('communication_com')->nullable();
            $table->string('pregnancy')->nullable();  //  الحمل
            $table->longText('pregnancy_com')->nullable();
            $table->string('pregnancy_month')->nullable();  //  الحمل
            $table->longText('pregnancy_month_com')->nullable();
            $table->string('pregnancy_problems')->nullable(); // في الحمل مشاكل صحية
            $table->longText('pregnancy_problems_com')->nullable();
            $table->string('birth_status')->nullable(); // طريقة الولادة
            $table->longText('birth_status_com')->nullable();
            $table->string('birth_problems')->nullable(); // مشاكل الولادة
            $table->longText('birth_problems_com')->nullable();
            $table->string('birth_after_problems')->nullable(); // مشاكل بعد الولادة
            $table->longText('birth_after_problems_com')->nullable();
            $table->string('lactation')->nullable(); // الرضاعة
            $table->longText('lactation_com')->nullable();
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
        Schema::dropIfExists('moms');
    }
}
