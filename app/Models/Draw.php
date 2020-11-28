<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draw extends Model
{
    use HasFactory;

    public static function getNicknames(int $amount)
    {
        return Draw::all()->random($amount)->pluck('nickname');
    }

    public static function getOneNickname()
    {
        return Draw::getNicknames(1)[0];
    }
}
