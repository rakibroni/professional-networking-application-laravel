<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionCommentReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_comment_id',
        'reply_comment',
        'user_id'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
