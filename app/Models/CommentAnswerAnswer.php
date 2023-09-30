<?php

namespace App\Models;


use App\Models\Post;
use App\Models\CommentAnswer;
use App\Models\QuestionCommentReply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentAnswerAnswer extends Model
{

    protected $table = 'comment_answer_answers';

    protected $fillable = [
        'text',
        'user_id',
        'comment_answer_id',
        'post_id',
        'uuid',
        'commment_id',
        'parent_comment_id',
        'question_comment_reply_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post() {
        return Post::where('id', $this->post_id)->get()->first();
    }
    public function parentComment()
    {
        $parent = CommentAnswer::where('uuid', $this->comment_answer_id)->get()->first();
        if (!$parent) {
            $parent = CommentAnswerAnswer::where('uuid', $this->comment_answer_id)->get()->first();
        }
        return $parent;
    }

    public function answers()
    {
        return CommentAnswerAnswer::where('comment_answer_id', $this->uuid)->get();
    }

    public function totalAnswersCount()
    {
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

    public function firstFewAnswers()
    {
        $count = $this->answers()->count();
        if ($count > 0) {
            if ($count > 1) {
                $count = 2;
            }
        }
        $result = CommentAnswerAnswer::where('comment_answer_id', $this->uuid)->limit($count)->orderBy('created_at', 'DESC')->get();

        return $result;
    }

    public function answerLevel()
    {
        $level = 1;
        $parent = CommentAnswerAnswer::where('uuid', $this->comment_answer_id)->get()->first();

        while ($parent) {
            $level++;
            $parent = CommentAnswerAnswer::where('uuid', $parent->comment_answer_id)->get()->first();
        }
        return $level;
    }

    public function levelArray()
    {
        $array = array();
        $level = 1;
        $parent = CommentAnswerAnswer::where('uuid', $this->comment_answer_id)->get()->first();
        $last = $parent;
        $first = $parent;
        while ($parent) {
            array_push($array, $parent);
            $level++;
            $parent = CommentAnswerAnswer::where('uuid', $parent->comment_answer_id)->get()->first();
            if (!$parent) {
                $first = CommentAnswer::where('uuid', $last->comment_answer_id)->get()->first();
            }
            $last = $parent;
        }
        if (sizeof($array) == 0) {
            $first = CommentAnswer::where('uuid', $this->comment_answer_id)->get()->first();
        }
        array_push($array, $first);
        sort($array);
        if ($level == 3) {
            $first = $array[0];
            $second = $array[1];
            $array[0] = $second;
            $array[1] = $first;
       

        }

        if (!CommentAnswer::where('uuid', $array[0]->uuid)->get()->first()) {
            $first = $array[0];
            $second = $array[1];
            $array[0] = $second;
            $array[1] = $first;
        }




        return $array;
    }

    public function parentAtLevel($level)
    {
        $array = $this->levelArray()[$level];
        if ($array) {
            return "PARENT AT LEVEL".$level." ".$array;
        }
    }



    public function parentAtLevel2()
    {
        $level = 1;
        $parent = CommentAnswerAnswer::where('uuid', $this->comment_answer_id)->get()->first();
        if (!$parent) {
            $parent = CommentAnswer::where('uuid', $this->comment_answer_id)->get()->first();
        }
        $returnValue = $parent;
        while ($parent) {
            $level++;
            $returnValue = $parent;
            $parent = CommentAnswerAnswer::where('uuid', $parent->comment_answer_id)->get()->first();
        }
        return $returnValue;
    }

    public function parentAtLevel3()
    {
        $level = 1;
        $parent = CommentAnswerAnswer::where('uuid', $this->comment_answer_id)->get()->first();

        $returnValue = $parent;
        while ($parent) {
            $level++;
            $returnValue = $parent;

            if ($parent->answerLevel() == 2) {
                $parent = null;
            } else {
                $parent = CommentAnswerAnswer::where('uuid', $parent->comment_answer_id)->get()->first();
            }
        }
        if (!$parent) {
            $returnValue = $this;
        }
        return $returnValue;
    }

    public function isParentAnswerLastAnswer()
    {
        $parent = CommentAnswer::where('uuid', $this->comment_answer_id)->get()->first();
        if (!$parent) {
            $parent = CommentAnswerAnswer::where('uuid', $this->comment_answer_id)->get()->first();
        }
        if ($parent->answers()->first()->uuid == $this->uuid) {
        }
        return $parent->isLastAnswer();
    }

    public function isLastAnswer()
    {
        $isLastAnswer = false;

        $parent = CommentAnswer::where('uuid', $this->comment_answer_id)->get()->first();
        if (!$parent) {
            $parent = CommentAnswerAnswer::where('uuid', $this->comment_answer_id)->get()->first();
        }
        if ($parent->answers()->first()->uuid == $this->uuid) {
            $isLastAnswer = true;
        }
        return $isLastAnswer;
    }

    public function parentAnswer()
    {
        $parent = CommentAnswerAnswer::where('uuid', $this->comment_answer_id)->get()->first();
        $last = $parent;
        if (!$parent) {
            $parent = CommentAnswer::where('uuid', $this->comment_answer_id)->get()->first();
        }
        while ($parent) {
            $last = $parent;
            $parent = CommentAnswerAnswer::where('uuid', $parent->comment_answer_id)->get()->first();
            if (!$parent) {
                $parent = CommentAnswer::where('uuid', $last->comment_answer_id)->get()->first();
            }
        }
        return $last;
    }

    public function parent() {
        $parent = CommentAnswerAnswer::where('uuid', $this->comment_answer_id)->get()->first();
        return $parent;
    }

    public function parentComment1() {
        $comment = Comment::where('id', $this->parent_comment_id)->get()->first();
        return $comment;
    }

    public function questionCommentReply() {
        return QuestionCommentReply::where('id', $this->question_comment_reply_id)->get()->first();
    }
}
