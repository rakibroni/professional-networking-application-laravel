<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViolationReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violation_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reporting_user_id');
            $table->foreignId('reported_user_id');
            $table->string('type')->default('');
            $table->string('type_id')->default('');
            $table->string('report_message')->default('');
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
        Schema::dropIfExists('violation_reports');
    }
}
