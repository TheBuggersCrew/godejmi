<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Draw;
use Illuminate\Http\Request;

class DrawController extends Controller
{
    public function index()
    {
        $nickname = Draw::getOneNickname();
        return json_encode([
            'nickname' => $nickname
        ]);
    }
}
