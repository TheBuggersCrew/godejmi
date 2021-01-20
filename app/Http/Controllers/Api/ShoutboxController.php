<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShoutboxController extends Controller
{
    public function getMessages()
    {
        return Message::all();
    }

    public function sendMessage(Request $request)
    {
        $content = htmlspecialchars(json_decode($request->getContent())->content ?? null, ENT_QUOTES);
        $check = true;

        if(strlen($content) === 0)
        {
            $check = false;
            $msg = 'Wiadomość musi mieć treść.';
        }

        if(!session()->get('is_authorized'))
        {
            $check = false;
            $msg = 'Nie jesteś autoryzowany do wysyłania wiadomości';
        }

        if(empty(session()->get('nickname')))
        {
            $check = false;
            $msg = 'Nie wiem nawet jak ty nazywasz';
        }

        if($check)
        {
            $message = new Message();
            $message->nickname = session()->get('nickname') ?? 'Bezimienny';
            $message->content = $content;
            $message->save();
            $msg = 'Wiadomość została zapisana!';
        }

        return response()->json([
            'success' => $check,
            'msg' => $msg
        ]);
    }

    public function setNickname(Request $request)
    {
        $nickname = htmlspecialchars(json_decode($request->getContent())->nickname ?? null);
        $check = true;

        if(strlen($nickname) < 3)
        {
            $check = false;
            $msg = 'Nick musi mieć co najmniej 3 znaki.';
        }

        if(!session()->get('is_authorized'))
        {
            $check = false;
            $msg = 'Nie jesteś autoryzowany do ustawiania nicku';
        }

        if($check)
        {
            session()->put('nickname', $nickname);
            $msg = 'Nick został ustawiony! (' . $nickname . ')';
        }

        return response()->json([
            'success' => $check,
            'msg' => $msg
        ]);
    }
}
