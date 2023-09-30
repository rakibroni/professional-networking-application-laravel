<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationStation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'degree',
        'degree_type',
        'school',
        'start_date',
        'end_date',
        'is_current_school',
        'is_custom_degree_type'
    ];
}
