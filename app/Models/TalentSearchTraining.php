<?php

namespace App\Models;

use App\Models\FurtherEducation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TalentSearchTraining extends Model
{
    use HasFactory;
    protected $fillable = [  
        'talent_search_id',
        'training_id',
    ];

    public  function training() {
        return $this->belongsTo(FurtherEducation::class, 'training_id', 'id');
    } 
}
