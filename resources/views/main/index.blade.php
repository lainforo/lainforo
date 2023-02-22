<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Index - {{ env('LF_SITENAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
    </head>
    <body>
        <h1 align="center">{{ env('LF_SITENAME') }}</h1>

        <div class="footer">
            @include('board.nav')
        </div>
    </body>
</html>
