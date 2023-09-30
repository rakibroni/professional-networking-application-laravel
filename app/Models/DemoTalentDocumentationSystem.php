<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemoTalentDocumentationSystem extends Model
{
    use HasFactory;

    protected $fillable = [
        'talent_id',
        'documentation_system_id',
    ];
}
