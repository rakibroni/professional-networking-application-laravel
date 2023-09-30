<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemoTalentLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'talent_id',
        'language_id',
        'language_level_id'
    ];
}
