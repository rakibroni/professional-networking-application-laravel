<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentationSystem extends Model
{
    use HasFactory;

    protected $table = 'documentation_systems';

    protected $fillable = [
        'id', 
        'name', 
    ];

    
}
