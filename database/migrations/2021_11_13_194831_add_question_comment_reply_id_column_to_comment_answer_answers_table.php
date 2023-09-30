<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuestionCommentReplyIdColumnToCommentAnswerAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comment_answer_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('question_comment_reply_id')->nullable();
            $table->foreign('question_comment_reply_id')->references('id')->on('question_comment_replies')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comment_answer_answers', function (Blueprint $table) {
            $table->dropForeign(['question_comment_reply_id']);
            $table->dropColumn('question_comment_reply_id');
        });
    }
}
