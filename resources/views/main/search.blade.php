<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Search - {{ env('LF_SITENAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
    </head>
    <body>
        <div align="center">
            <h1>Search {{ env('LF_SITENAME') }}</h1>
            @include('main.form.search')

        </div>
        <div class="footer">
            @include('board.nav')
        </div>
    </body>
</html>
