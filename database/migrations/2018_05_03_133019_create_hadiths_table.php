<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHadithsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hadiths', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hadith_title');
            $table->string('hadith_matan');
            $table->string('hadith_meaning');
            $table->string('hadith_narrator');
            $table->string('hadith_sanad');
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
        Schema::dropIfExists('hadiths');
    }
}
