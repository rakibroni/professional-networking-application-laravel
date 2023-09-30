<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'image_0',
        'uuid',
        'question_id',
        'user_id'
    ];

    public function isNormalPost() {
        $isNormalPost = false;
        if ($this->question_id == null) {
            $isNormalPost = true;
        }
        return $isNormalPost;
    }

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id); // contains: Laravel collection method
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question() {
        return Question::where('id', $this->question_id)->get()->first();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function totalComments() {
        $comments = $this->comments->count();
        $answers = CommentAnswer::where('post_id', $this->id)->get()->count();
        $answersAnswers = CommentAnswerAnswer::where('post_id', $this->id)->get()->count();
        return $comments+$answers+$answersAnswers;
    }

    public function firstFewComments()
    {
        $count = $this->comments()->count();
        if ($count > 0) {
            if ($count > 1) {
                $count = 2;
            }      
        }
        $result = $this->hasMany(Comment::class)->limit($count)->orderBy('created_at', 'DESC')->get();

        return $result;
    }


    public function lastAnswer() {
        $lastAnswer = $this->hasMany(Comment::class)->orderBy('created_at', 'DESC')->get()->last();
        if ($lastAnswer) {
            return $lastAnswer;
        } else {
            return null;
        }        
    }

    public function isApproved() {
        $isApproved = false;

        if (PostStatus::where('post_id', $this->id)->where('object_status_id', 2)->get()->first()) {
            $isApproved = true;
        }

        return $isApproved;
    }
}
