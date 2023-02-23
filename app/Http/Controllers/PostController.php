<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;

class PostController extends Controller
{
    public function putThread(Request $request, $uri)
    {
        $thread = new Thread;

        $thread->author = $request->author;
        $thread->board = $uri;
        $thread->ip = $request->ip();
        $thread->subject = $request->subject;
        $thread->body = $request->body;

        // Check if a tripcode was supplied
        if ($request->tripcode ?? '') {
            $thread->tripcode = hash('sha256', $request->tripcode);
        }

        $thread->save();

        return redirect()->back();
    }

    public function getThread($uri, $thread)
    {
        $thread = Thread::where('id', $thread)->first();

        return view('thread.view', ['thread' => $thread, 'uri' => $uri]);
    }
}
