<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFollowers extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'follower_id',
        'request'
    ];

    public function user($id) {
        return User::where('id', $id)->get()->first();
    }
    
}
