<?php

namespace App\Models;

use App\Models\QuestionCategories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'question_for',
        'user_id'
    ];
    public function category()
    {
        return $this->hasMany(QuestionCategories::class);
    }

    

    public function categories()
    {
        return $this->hasMany(QuestionCategories::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function canBeAnsweredByEveryone()
    {
        $canBeAnsweredByEveryone = false;
        if ($this->question_for == "COM") {
            $canBeAnsweredByEveryone = true;
        }
        return $canBeAnsweredByEveryone;
    }

    public function post() {
        return Post::where('question_id', $this->id)->get()->first();
    }

    public function experts()
    {
        $comments = $this->comments();
        $experts = new Collection(new User);
        $questionCategories = $this->categories()->get();
        foreach ($comments as $comment) {
            
            $user = User::where('id', $comment->user_id)->get()->first();
            if ($user->isExpertForQuestion($questionCategories)) {
                if (!$experts->contains($user)) {
                    $experts->push($user);
                }
            }
        }
        return $experts;
    }

    public function comments()
    {
        return $this->hasMany(QuestionComment::class)->get();
    }

    public function answeredByUser() {
        $answeredByUser = false;
        $comments = $this->comments();
        $userId = auth()->user()->id;
        foreach($comments as $comment) {
            if ($comment->user_id == $userId) {
                $answeredByUser = true;
            }
        }
        return $answeredByUser;
    }
}
