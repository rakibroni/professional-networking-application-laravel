<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'reported_user_id',
        'reporting_user_id',
        'type',
        'type_id',
        'report_message',
    ];

}
