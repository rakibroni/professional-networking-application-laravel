<?php

namespace App\Models;

use App\Models\Post;
use App\Models\CommentAnswerAnswer;
use App\Models\QuestionCommentReply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentAnswer extends Model
{
    use HasFactory;

    protected $table = 'comment_answers';

    protected $fillable = [
        'text',
        'user_id',
        'post_id',
        'uuid',
        'comment_id',
        'question_comment_reply_id'
    ];
 
    public function parentAnswer() {
        return $this;
    }


    public function questionCommentReply() {
        return QuestionCommentReply::where('id', $this->question_comment_reply_id)->get()->first();
    }

    public function parentAtLevel($level) {
        
        return "AD";
    }

    public function parentComment() {
      
        return Comment::where('id', $this->comment_id)->get()->first();
    }

    public function parentComment1() {
        $comment = Comment::where('id', $this->comment_id)->get()->first();
        return $comment;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function totalAnswersCount() {
        $count = 0;
        $array = array();
        $answers = CommentAnswerAnswer::where('comment_answer_id', $this->uuid)->get();
        while ($answers) {
            for ($i = 0; $i < $answers->count(); $i++) {
                $count++;
                $answersArray = CommentAnswerAnswer::where('comment_answer_id', $answers[$i]->uuid)->get();
                array_push($array, $answersArray);
            }
            $answers = array_pop($array);
        }
        return $count;
    }

    public function parentAtLevel2() {
        return $this;
    }

    public function parentAtLevel3() {
        return $this;
    }

    public function isParentAnswerLastAnswer() {
        return false;
    }

    // HIer gleich weitermachen
    public function levelArray() {
        $array = array();
        $parent = Comment::where('id', $this->comment_answer_id)->get()->first();
        array_push($array, $parent);
        return $array;
    }

    public function answers()
    {
        return CommentAnswerAnswer::where('comment_answer_id', $this->uuid)->get();
    }

    public function firstFewAnswers()
    {
        $count = $this->answers()->count();
        if ($count > 0) {
            if ($count > 1) {
                $count = 2;
            }
        }
        $result = $this->hasMany(CommentAnswerAnswer::class)->limit($count)->orderBy('created_at', 'DESC')->get();

        return $result;
    }

    public function answerLevel() {
        return 0;
    }

    public function isLastAnswer() {
        $isLastAnswer = false;

        $parent = Comment::where('id', $this->comment_id)->get()->first();
        
        if ($parent->answers()->first()->uuid == $this->uuid) {
            $isLastAnswer = true;
        }
        return $isLastAnswer;
    }


    public function post() {
        return Post::where('id', $this->post_id)->get()->first();
    }
}
// MODEL ERstellenY