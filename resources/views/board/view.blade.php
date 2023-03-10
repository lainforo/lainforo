<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $board->title }} - {{ env('LF_SITENAME') }}</title>
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
            <h1>/{{ $board->uri}}/ - {{ $board->title }}</h1>
            <i>{{ $board->description }}</i>
            @include('main.form.makethread')
            <hr>
            @if (request()->hasCookie('adminlogin'))
                <a href="{{ route('admin.editboard', ['uri' => $board->uri]) }}">Edit Board</a>
                <hr>
            @endif
        </div>

        @include('board.threads')

        <div class="footer">
            @include('board.nav')
        </div>
    </body>
</html>
