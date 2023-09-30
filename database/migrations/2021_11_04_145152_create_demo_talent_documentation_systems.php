
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemoTalentDocumentationSystems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_talent_documentation_systems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('talent_id');
            $table->foreign('talent_id')->references('id')->on('talents')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('documentation_system_id');
            $table->foreign('documentation_system_id', 'ds_id')->references('id')->on('documentation_systems')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('demo_talent_documentation_systems');
    }
}
