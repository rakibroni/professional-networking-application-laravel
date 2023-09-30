<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemoTalentFurtherEducation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_talent_further_education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('talent_id');
            $table->foreign('talent_id')->references('id')->on('talents')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('further_education_id');
            $table->foreign('further_education_id')->references('id')->on('further_education')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('demo_talent_further_education');
    }
}
