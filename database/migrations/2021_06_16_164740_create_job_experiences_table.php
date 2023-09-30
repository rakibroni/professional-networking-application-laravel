<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->string('position')->default('');
            $table->string('employment_type')->default('');
            $table->string('company')->default('');
            $table->string('company_type')->default('');
            $table->string('location_city')->default('');
            $table->string('location_state')->default('');
            $table->text('description', 500);
            $table->date('start_date')->default(Carbon::now()->toDateString());
            $table->date('end_date')->default(Carbon::now()->toDateString());
            $table->string('is_current_position')->default('false');
            $table->string('is_custom_employment_type')->default('false');
            $table->string('is_custom_company_type')->default('false');
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
        Schema::dropIfExists('job_experiences');
    }
}
    