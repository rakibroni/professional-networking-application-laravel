<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentSearchLanguage extends Model
{
    use HasFactory;
    protected $fillable = [  
        'talent_search_id',
        'language_id',
        'language_skill_id',
    ];
}
