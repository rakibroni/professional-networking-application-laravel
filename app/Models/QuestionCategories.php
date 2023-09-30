<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionCategories extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'question_id',
        'category_id' 
    ];
    public function category(){
        return $this->belongsTo(Categories::class);
    }

    public function name() {
        return Categories::where('id', $this->category_id)->get()->first()->name;
    }


    
}
//QuestionCategories::with('category')->where('question_id', $new_question->id)->get();