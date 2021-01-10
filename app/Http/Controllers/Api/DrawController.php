<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Draw;
use Illuminate\Http\Request;

class DrawController extends Controller
{
    public function index()
    {
        $drawsCount = session()->get('draws_count', 0);

        if($drawsCount < 5) {
            $success = true;
            $nickname = Draw::getOneNickname();
            $msg = 'ok wariacie';
            session()->put('draws_count', $drawsCount + 1);
        } else {
            $success = false;
            $nickname = 'bożydar pazerny';
            $msg = 'Limit wyczerpany';
        }

        return response()
            ->json([
            'success' => $success,
            'msg' => $msg,
            'nickname' => $nickname
        ], $success ? 200 : 403);
    }
}
