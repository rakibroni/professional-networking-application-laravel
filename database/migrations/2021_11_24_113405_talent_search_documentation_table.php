<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TalentSearchDocumentationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talent_search_documentation', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('talent_search_id')->references('id')->on('talent_search')->constrained()->onDelete('cascade');
            $table->foreignId('documentation_id');
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
    }
}
