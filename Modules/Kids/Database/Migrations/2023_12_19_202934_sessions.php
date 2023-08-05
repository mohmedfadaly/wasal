<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

<<<<<<<< HEAD:Modules/Kids/Database/Migrations/2023_12_19_202934_sessions.php
class Sessions extends Migration
========
class CreateCountriesTable extends Migration
>>>>>>>> 3c3a9ff3dc9f924796fc9b89f76c4890e7093452:database/migrations/2021_05_04_234350_create_countries_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<<< HEAD:Modules/Kids/Database/Migrations/2023_12_19_202934_sessions.php
        Schema::create('sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hex')->nullable();
========
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('name_fr');
            $table->string('code')->unique();
>>>>>>>> 3c3a9ff3dc9f924796fc9b89f76c4890e7093452:database/migrations/2021_05_04_234350_create_countries_table.php
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
        Schema::dropIfExists('sessions');
    }
}
