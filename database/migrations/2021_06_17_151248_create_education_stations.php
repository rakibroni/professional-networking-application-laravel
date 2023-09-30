<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationStations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_stations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');;
            $table->string('degree')->default('');
            $table->string('degree_type')->default('');
            $table->string('school')->default('');
            $table->date('start_date')->default(Carbon::now()->toDateString());
            $table->date('end_date')->default(Carbon::now()->toDateString());
            $table->string('is_current_school')->default('false');
            $table->string('is_custom_degree_type')->default('false');
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
        Schema::dropIfExists('education_stations');
    }
}


