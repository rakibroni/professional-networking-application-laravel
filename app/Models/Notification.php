<?php

namespace App\Models;

use App\Http\Controllers\NotificationsController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';
    
    protected $fillable = [
        'receiver_id', 
        'sender_id',
        'message_type',
        'optional',
        'optional_1',
        'status'
    ];

    public static function getNotificationsMessage ($id, $message_type, $optional, $optional_1) {
        return NotificationsController::getNotificationsMessage($id, $message_type, $optional, $optional_1);
    }
}
