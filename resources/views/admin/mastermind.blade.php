<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mastermind - {{ env('LF_SITENAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
    </head>
    <body>
        <h1 align="center">{{ env('LF_SITENAME') }} Mastermind</h1>

        <div class="content">
            This is the <i>Mastermind Page</i>. In LainForo, this functions as an overview and admin panel for your site. By being able to view this page, you're also able to delete threads and replies by visiting them as you would normally, but now you'll have [delete] and [ban] next to them.
            <hr>
            <h1>Site statistics</h1>
            <b>Total boards (pub+private):</b> {{ $boardcount }}
            <br />
            <b>Total posts (threads+replies):</b> {{ $postcount }}
        
            
            <h1>Board creation</h1>
            <form method="post" action="{{ route('board.create') }}">
                @csrf

                <input name="uri" placeholder="/uri/"><br />
                <input name="title" placeholder="Board title"><br />
                <input name="description" placeholder="Board description"><br />
                <input name="board_icon" placeholder="(Optional) board icon"><br />
                <input name="board_banner" placeholder="(Optional) board banner"><br />
                NSFW: <input name="is_nsfw" type="checkbox"><br />
                Public (indexed): <input name="is_indexed" type="checkbox" checked><br />
                <input type="submit" value="New Board">
            </form>
            @if ($allboards)
            <h1>Board List</h1>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>URI</th>
                        <th>Description</th>
                        <th>Indexed?</th>
                        <th>NSFW?</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allboards as $board)
                    <tr>
                        <td>{{ $board->title }}</td>
                        <td>{{ $board->uri }}</td>
                        <td>{{ $board->description }}</td>
                        <td>{{ $board->is_indexed }}</td>
                        <td>{{ $board->is_nsfw }}</td>
                            <td><a href="{{ route('admin.editboard', ['uri' => $board->uri]) }}">Edit {{ $board->title }}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <hr>
                No boards have been added yet.
                @endif
            </div>
            
            <div class="footer">
            @include('board.nav', ['boards' => $allboards])
        </div>
    </body>
</html>
