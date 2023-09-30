<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProfilePicturesTableColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile_pictures', function (Blueprint $table) {
            $table->string('zoom')->change();
            $table->string('pos_x')->change();
            $table->string('pos_y')->change();
            $table->string('rot')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile_pictures', function (Blueprint $table) {
            //
        });
    }
}
