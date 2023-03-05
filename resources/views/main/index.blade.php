<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Index - {{ env('LF_SITENAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
    </head>
    <body>
        <div align="center">
            <h1>{{ env('LF_SITENAME') }}</h1>
            <h2>{{ env('LF_TAGLINE') }}</h2>
        </div>
        <div class="footer">
            @include('board.nav')
        </div>
    </body>
</html>
