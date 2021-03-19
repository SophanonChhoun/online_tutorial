<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $updates = Telegram::getUpdates();
        Telegram::sendMessage([
            'chat_id' => '-252677896',
            'text' => $request->test
        ]);
        return (json_encode($updates));
    }
}
