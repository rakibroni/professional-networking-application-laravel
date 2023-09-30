<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalentStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talent_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('talent_id');
            $table->foreign('talent_id')->references('id')->on('talents')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('object_status_id');
            $table->foreign('object_status_id')->references('id')->on('object_status')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('talent_status');
    }
}
