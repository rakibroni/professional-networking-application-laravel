<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentSearch extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'location_city',
        'location_state',
        'institution_type',
        'position',
        'years_of_experience',
        'contract_type',
        'contract_start_date',
        'drivers_license_necessary',
        'location_city',
        'location_state',  
    ];

}
