<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationModal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'invite_friends_modal_seen'
    ];
}
