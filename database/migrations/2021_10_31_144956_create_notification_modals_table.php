<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationModalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_modals', function (Blueprint $table) {
            $table->id();
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->boolean('invite_friends_modal_seen')->default(false);
            $table->boolean('add_profile_picture_modal_seen')->default(false);
            $table->boolean('add_profile_info_modal_seen')->default(false);
            $table->boolean('new_feautre_modal_seen')->default(false);
            $table->boolean('stay_positive_modal_seen')->default(false);
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
        Schema::dropIfExists('notification_modals');
    }
}
