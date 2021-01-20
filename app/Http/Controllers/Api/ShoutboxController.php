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
        return Message::orderBy('created_at', 'desc')->get();
    }

    public function sendMessage(Request $request)
    {
        $content = htmlspecialchars(json_decode($request->getContent())->content ?? null, ENT_QUOTES);
        $success = true;

        if(strlen($content) === 0)
        {
            $success = false;
            $msg = 'Wiadomość musi mieć treść.';
        }

        if(!session()->get('is_authorized'))
        {
            $success = false;
            $msg = 'Nie jesteś autoryzowany do wysyłania wiadomości';
        }

        if(empty(session()->get('nickname')))
        {
            $success = false;
            $msg = 'Nie wiem nawet jak ty nazywasz';
        }

        if($success)
        {
            $message = new Message();
            $message->nickname = session()->get('nickname') ?? 'Bezimienny';
            $message->content = $content;
            $message->save();
            $msg = 'Wiadomość została zapisana!';
        }

        return response()->json([
            'success' => $success,
            'msg' => $msg
        ], $code = 200);
    }

    public function setNickname(Request $request)
    {
        $nickname = htmlspecialchars(json_decode($request->getContent())->nickname ?? null);
        $success = true;

        if(strlen($nickname) < 3)
        {
            $success = false;
            $msg = 'Nick musi mieć co najmniej 3 znaki.';
        }

        if(!session()->get('is_authorized'))
        {
            $success = false;
            $msg = 'Nie jesteś autoryzowany do ustawiania nicku';
        }

        if($success)
        {
            session()->put('nickname', $nickname);
            $msg = 'Nick został ustawiony! (' . $nickname . ')';
        }

        return response()->json([
            'success' => $success,
            'msg' => $msg
        ], $success ? 200 : 403);
    }
}
