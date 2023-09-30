<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemoTalentLanguages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_talent_languages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('talent_id');
            $table->foreign('talent_id')->references('id')->on('talents')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('language_level_id');
            $table->foreign('language_level_id')->references('id')->on('language_levels')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('demo_talent_languages');
    }
}
