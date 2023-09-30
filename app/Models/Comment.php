<?php

namespace App\Models;

use App\Models\Post;
use App\Models\CommentAnswer;
use App\Models\CommentAnswerAnswer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id',
        'uuid',
        'question_comment_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questionComment() {
        return QuestionComment::where('id', $this->question_comment_id)->get()->first();
    }

    public function post()
    {
        return Post::where('id', $this->post_id)->get()->first();
    }

    public function totalAnswersCount()
    {
        $answers = CommentAnswer::where('comment_id', $this->id)->get()->count();
        $answersAnswers = CommentAnswerAnswer::where('parent_comment_id', $this->id)->get()->count();
        return $answers + $answersAnswers;
    }


    public function answers()
    {
        return $this->hasMany(CommentAnswer::class);
    }


    public function firstFewAnswers()
    {
        $count = $this->answers()->count();
        if ($count > 0) {
            if ($count > 1) {
                $count = 2;
            }
        }
        $result = $this->hasMany(CommentAnswer::class)->limit($count)->orderBy('created_at', 'DESC')->get();

        return $result;
    }

    public function isLastAnswer()
    {
        $isLastAnswer = false;

        $parent = Post::where('id', $this->post_id)->get()->first();
        if ($parent->lastAnswer()) {
            if ($parent->lastAnswer()->uuid == $this->uuid) {
                $isLastAnswer = true;
            }
        }

        return $isLastAnswer;
    }
}
