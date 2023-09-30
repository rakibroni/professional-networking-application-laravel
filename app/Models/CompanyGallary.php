<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyGallary extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'photo',  
        'company_id',  
    ];
}
