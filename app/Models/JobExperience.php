<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'position',
        'employment_type',
        'company',
        'company_type',
        'location_city',
        'location_state',
        'description',
        'start_date',
        'end_date',
        'is_current_position',
        'is_custom_employment_type',
        'is_custom_company_type'
    ];
}
