<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RandomName extends Model
{
    use HasFactory;

    public static function firstname() {
        return RandomName::inRandomOrder()->get()->first()->firstname;
    }

    public static function name() {
        return RandomName::inRandomOrder()->get()->first()->name;
    }
}
