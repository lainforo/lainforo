<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Thread;

class BoardController extends Controller
{
    public function getBoard($uri)
    {
        session()->put('board_uri', $uri);
        return view('board.view');
    }

    public function putBoard(Request $request)
    {
        $board = new Board;

        $board->uri = $request->uri;
        $board->title = $request->title;
        $board->description = $request->description;
        
        if ($request->is_nsfw ?? '') {
            $board->is_nsfw = true;
        } else {
            $board->is_nsfw = false;
        }

        if ($request->is_indexed ?? '') {
            $board->is_indexed = true;
        } else {
            $board->is_indexed = false;
        }

        if ($request->board_icon ?? '') {
            $board->board_icon = $request->board_icon;
        }

        if ($request->board_banner ?? '') {
            $board->board_banner = $request->board_banner;
        }

        $board->save();
        return redirect((route('board', ['uri' => $request->uri])));
    }

    public function editBoard(Request $request, $uri)
    {
        $board = Board::where('uri', $uri)->first();

        $board->uri = $request->uri;
        $board->title = $request->title;
        $board->description = $request->description;
        
        if ($request->is_nsfw ?? '') {
            $board->is_nsfw = true;
        } else {
            $board->is_nsfw = false;
        }

        if ($request->is_indexed ?? '') {
            $board->is_indexed = true;
        } else {
            $board->is_indexed = false;
        }

        if ($request->board_icon ?? '') {
            $board->board_icon = $request->board_icon;
        } else {
            $board->board_banner = null;
        }

        if ($request->board_banner ?? '') {
            $board->board_banner = $request->board_banner;
        } else {
            $board->board_banner = null;
        }

        $board->save();
        return redirect((route('board', ['uri' => $request->uri])));
    }

    public function search(Request $request)
    {
        $results = Thread::where('subject', 'LIKE', '%lain%')->orderBy('id', 'desc')->where('is_indexed', true)->get();

        return view('main.results', ['searchstring' => $request->string, 'results' => $results]);
    }
}
