<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'question_id',
        'user_id'
    ];
    
    public function likedBy(User $user) {
        return $this->likes->contains('user_id', $user->id); // contains: Laravel collection method
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    function likes(){
        return $this->hasMany(QuestionCommentLike::class);

    }
}
