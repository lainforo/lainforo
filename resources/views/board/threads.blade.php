@foreach ($threads as $thread)
<div>
    @if ($board->board_icon ?? '')
    <img src="{{ $board->board_icon }}" height=16>
    @else
    <img src="{{ URL::asset('favicon.ico') }}" height=16>
    @endif

    <b class="subject">{{ $thread->subject }}</b> <span class="authorname">{{ $thread->author }}</span>
    @if ($thread->tripcode ?? '')
        <span class="authortrip">!{{ substr($thread->tripcode, 0, 8) }}</span>
    @endif
    
    @if (request()->hasCookie('adminlogin'))
                <i>[{{ $thread->ip }}]</i>
    @endif
    created at {{ $thread->created_at }} <a href="{{ route('thread', ['thread' => $thread->id, 'uri' => $board->uri ]) }}">No.{{ $thread->id }}</a>
    <br />
    <pre>{{ $thread->body }}</pre>
    <br />
    <br />
</div>
@endforeach 