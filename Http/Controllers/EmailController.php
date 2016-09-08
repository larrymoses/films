<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
class EmailController extends Controller
{
    public function send(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
        {

            $message->from('larrykiprop@gmail.com', 'Christian Nwamba');

            $message->to('lkiprop@flag42.com');

        });

        return response()->json(['message' => 'Request completed']);
    }
}
