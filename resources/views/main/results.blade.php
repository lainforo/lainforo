<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Search results for '{{ $searchstring }}' - {{ env('LF_SITENAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
    </head>
    <body>
        <div align="center">
            <h1>Search results for '{{ $searchstring }}'</h1>
            <i>Showing all threads where the subject contains '{{ $searchstring }}'</i>
            <hr>
            @foreach ($results as $thread)
            <div class="reply">
                <b class="subject">{{ $thread->subject }}</b> <span class="authorname">{{ $thread->author }}</span>
                @if ($thread->tripcode ?? '')
                    <span class="authortrip">!{{ substr($thread->tripcode, 0, 8) }}</span>
                @endif
                created at {{ $thread->created_at }} <a href="{{ route('thread', ['thread' => $thread->id, 'uri' => $thread->board ]) }}">No.{{ $thread->id }}</a>
                <br />
                <pre>{{ $thread->body }}</pre>
                <br />
                <br />
            </div>
            <br />
            @endforeach
        </div>
        <div class="footer">
            @include('board.nav')
        </div>
    </body>
</html>
