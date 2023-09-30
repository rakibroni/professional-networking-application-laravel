<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->string('profile_picture')->default('');
            $table->string('cover_photo')->default('');
            $table->string('name')->default('');
            $table->text('short_desc')->default('');
            $table->string('location_city')->default('');
            $table->string('location_state')->default(''); 
            $table->integer('total_employees')->default(0);
            $table->integer('establishment')->default(0);
            $table->string('text_title_0')->default('');
            $table->string('text_title_1')->default('');
            $table->text('text_0')->default('');
            $table->text('text_1')->default('');
            $table->string('curaworks_profile_link')->default('');
            $table->string('website_link')->default('');
            $table->string('facebook_link')->default('');
            $table->string('instagram_link')->default(''); 
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
        Schema::dropIfExists('companies');
    }
}
