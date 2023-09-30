<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEmployee extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'name',  
        'photo',  
        'position',  
        'company_id',  
    ];
}
