<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Index - {{ env('LF_SITENAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
    </head>
    <body>
        <h1 align="center">Welcome, {{ env('LF_ADMIN') }}!</h1>

        <div class="content">
            This is the <i>Mastermind Page</i>. In LainForo, this functions as an overview and admin panel for your site. By being able to view this page, you're also able to delete threads and replies by visiting them as you would normally, but now you'll have [delete] and [ban] next to them.
        </div>







        <div class="footer">
            @include('board.nav')
        </div>
    </body>
</html>
