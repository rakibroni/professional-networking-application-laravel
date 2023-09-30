<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentAnswerAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_answer_answers', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->default('');

            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            
            $table->string('comment_answer_id');

            $table->foreign('parent_comment_id')->references('id')->on('comments')->constrained()->onDelete('cascade');         
            $table->unsignedBigInteger('parent_comment_id');

            $table->foreign('post_id')->references('id')->on('posts')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('post_id');

            $table->string('text')->default('');
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
        Schema::dropIfExists('comment_answer_answers');
    }
}
