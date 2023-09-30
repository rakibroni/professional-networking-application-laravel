<?php

namespace App\Models;

use App\Models\CompanyGallary;
use App\Models\CompanyProvide;
use App\Models\CompanyEmployee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'short_desc',
    ];

    public function employees()
    {
        return $this->hasMany(CompanyEmployee::class);
    }
    public function provides()
    {
        return $this->hasMany(CompanyProvide::class);
    }
    public function galarries()
    {
        return $this->hasMany(CompanyGallary::class);
    }
}
