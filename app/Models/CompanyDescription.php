<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDescription extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'title',  
        'text',  
        'company_id',  
    ];
}
