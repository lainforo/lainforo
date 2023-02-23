<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $thread->subject }} - {{ env('LF_SITENAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
    </head>
    <body>
        <h1 align="center"><a href="{{ route('board', ['uri' => $uri]) }}">{{ $thread->subject }}</a></h1>
        <div align="center">
            by <span class="authorname">{{ $thread->author }}</span>

            @if ($thread->tripcode ?? '')
            <span class="authortrip">!{{ substr($thread->tripcode, 0, 8) }}</span>
            @endif

            at {{ $thread->created_at }}
        </div>
        <hr>
        <pre>{{ $thread->body }}</pre>
        <hr>

        <div class="footer">
            @include('board.nav')
        </div>
    </body>
</html>
