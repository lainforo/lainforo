<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Error - {{ env('LF_SITENAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
    </head>
    <body>
        <div align="center">
            <h1>{{ $error }}</h1>
        </div>
        <div class="footer">
            @include('board.nav')
        </div>
    </body>
</html>
