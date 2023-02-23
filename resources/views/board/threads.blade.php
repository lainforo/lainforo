@foreach ($threads as $thread)
<div>
    <b class="subject">{{ $thread->subject }}</b> <span class="authorname">{{ $thread->author }}</span>
    @if ($thread->tripcode ?? '')
        <span class="authortrip">!{{ substr($thread->tripcode, 0, 8) }}</span>
    @endif
    created at {{ $thread->created_at }} <a href="{{ route('thread', ['thread' => $thread->id, 'uri' => $board->uri ]) }}">No.{{ $thread->id }}</a>
    <br />
    <pre>{{ $thread->body }}</pre>
    <br />
    <br />
</div>
@endforeach