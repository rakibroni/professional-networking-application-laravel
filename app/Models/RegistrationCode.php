<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationCode extends Model
{
    use HasFactory;

    protected $table = 'registration_codes';
    
    protected $fillable = [
        'email', 
        'code'
    ];
} 
