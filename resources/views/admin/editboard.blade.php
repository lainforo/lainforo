<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit /{{ $uri }}/ - {{ env('LF_SITENAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
    </head>
    <body>
        <h1 align="center">Edit /{{ $uri }}/ - Mastermind</h1>

        <div class="content">        
            <h1>Board settings</h1>
            <form method="post" action="{{ route('board.edit', ['uri' => $uri]) }}">
                @csrf

                <input name="uri" placeholder="/{{ $uri }}/" disabled><br />
                <input name="title" placeholder="Board title" value="{{ $board->title }}"><br />
                <input name="description" placeholder="Board description" value="{{ $board->description }}"><br />
                <input name="board_icon" placeholder="(Optional) board icon" value="{{ $board->board_icon }}"><br />
                <input name="board_banner" placeholder="(Optional board banner" value="{{ $board->board_banner }}"><br />
                NSFW: <input name="is_nsfw" type="checkbox"
                @if ($board->is_nsfw ?? '')
                    checked
                @endif
                ><br />
                Public (indexed): <input name="is_indexed" type="checkbox"
                @if ($board->is_indexed ?? '')
                    checked
                @endif
                ><br />
                <input type="submit" value="Save board settings">
            </form>
        </div>

        <div class="footer">
            @include('board.nav', ['boards' => $allboards])
        </div>
    </body>
</html>
