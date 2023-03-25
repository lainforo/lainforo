<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $thread->subject }} - {{ env('LF_SITENAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
        @if ($board->board_icon ?? '')
            <link rel="icon" type="image/x-icon" href="{{ $board->board_icon }}" />
        @endif
    </head>
    <body>
    <div align="center">
            @if ($board->board_banner ?? '')
                <img src="{{ $board->board_banner }}" height=150>
            @else
                <img src="{{ URL::asset('assets/img/board/banner-default.png') }}" height=150>
            @endif
            <h1><a href="{{ route('board', ['uri' => $uri]) }}">/{{ $board->uri}}/ - {{ $board->title }}</a></h1>
            <i>{{ $board->description }}</i>
            @include('main.form.makereply')
            <hr>
    </div>
        <h1 align="center">{{ $thread->subject }}</h1>
        <div align="center">
            by <span class="authorname">{{ $thread->author }}</span>
            @if ($thread->tripcode ?? '')
            <span class="authortrip">!{{ substr($thread->tripcode, 0, 8) }}</span>
            @endif

            @if (request()->hasCookie('adminlogin'))
                <a href="{{ route('user.ban', ['ip' => $thread->ip]) }}" title="Click IP to ban"><i>[{{ $thread->ip  }}]</i></a>
            @endif
            at {{ $thread->created_at }}
        </div>
        <pre>{{ $thread->body }}</pre>
        @include('thread.replies')
        <hr>
        <div class="footer">
            @include('board.nav')
        </div>
    </body>
</html>
