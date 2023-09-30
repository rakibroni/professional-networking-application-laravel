<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentSearchDocumentation extends Model
{
    use HasFactory;
    protected $fillable = [  
        'talent_search_id',
        'documentation_id',
    ];
}
