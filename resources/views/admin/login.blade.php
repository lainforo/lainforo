<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Administrator Login - {{ env('LF_SITENAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
    </head>
    <body>
        <h1 align="center">Administrator Login</h1>
    <div align="center">
        <form method="post" action="{{ route('admin.auth') }}">
            @csrf

            <input type="password" name="password" placeholder="Admin Password"><br />
            <input type="submit" value="Login">
        </form> 
    </div>

        <div class="footer">
            @include('board.nav')
        </div>
    </body>
</html>

