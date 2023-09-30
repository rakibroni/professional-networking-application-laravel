<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemoTalentFurtherEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'talent_id',
        'further_education_id',
    ];
}
