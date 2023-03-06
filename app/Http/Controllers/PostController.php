<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Thread;
use App\Models\Reply;

class PostController extends Controller
{
    public function putThread(Request $request, $uri)
    {
        $thread = new Thread;

        $thread->author = $request->author;
        $thread->board = $uri;
        $thread->ip = $request->ip();
        $thread->subject = $request->subject;
        $thread->is_indexed = Board::where('uri', $uri)->value('is_indexed');
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
        
        $replies = Reply::where('replyto', $thread)->get();
        $thread = Thread::where('id', $thread)->first();
        session()->put('thread_id', $thread);

        return view('thread.view', ['thread' => $thread, 'uri' => $uri, 'replies' => $replies]);
    }

    public function putReply(Request $request, $thread)
    {
        $reply = new Reply;

        $reply->author = $request->author;
        $reply->replyto = $thread;
        $reply->ip = $request->ip();
        $reply->body = $request->body;
        $reply->is_indexed = Thread::where('id', $thread)->value('is_indexed');

        if ($request->tripcode ?? '') {
            $reply->tripcode = hash('sha256', $request->tripcode);
        }        

        $reply->save();

        return redirect()->back();
    }
}
