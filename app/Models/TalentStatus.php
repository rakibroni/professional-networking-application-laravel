<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentStatus extends Model
{
    use HasFactory;

    protected $table = 'talent_status';

    protected $fillable = [
        'talent_id',
        'object_status_id'
    ];
}
