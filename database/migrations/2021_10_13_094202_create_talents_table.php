<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->string('location_city')->default('');
            $table->string('location_state')->default('');
            $table->string('institution_type')->default('');
            $table->string('position')->default('');
            $table->integer('years_of_experience')->default(0);
            $table->boolean('drivers_license_necessary')->default(0);
            $table->string('contract_type')->default('');
            $table->date('contract_start_date')->default(Carbon::now()->toDateString());
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
        Schema::dropIfExists('talents');
    }
}
