<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePicture extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'path',
        'zoom',
        'pos_x',
        'pos_y',
        'rot',
    ];
}
