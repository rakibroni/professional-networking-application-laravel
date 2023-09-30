<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LanguageLevel extends Model
{
    use HasFactory;

    protected $table = 'language_levels';

    protected $fillable = [
        'id', 
        'name', 
    ];

}
