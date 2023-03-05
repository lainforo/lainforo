<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $board->title }} - {{ env('LF_SITENAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
    </head>
    <body>
        <div align="center">
            @if ($board->board_banner ?? '')
                <img src="{{ $board->board_banner }}" height=150>
            @else
                <img src="{{ URL::asset('assets/img/board/banner-default.png') }}" height=150>
            @endif
            <h1>/{{ $board->uri}}/ - {{ $board->title }}</h1>
            <i>{{ $board->description }}</i>
            @include('main.form.makethread')
            <hr>
        </div>

        @include('board.threads')

        <div class="footer">
            @include('board.nav')
        </div>
    </body>
</html>
