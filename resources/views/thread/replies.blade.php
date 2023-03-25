@foreach ($replies as $reply)
    <div class="reply">
        <span class="authorname">{{ $reply->author }}</span>
        @if ($reply->tripcode ?? '')
            <span class="authortrip">!{{ substr($reply->tripcode, 0, 8) }}</span>
        @endif

        @if (request()->hasCookie('adminlogin'))
        <a href="{{ route('user.ban', ['ip' => $reply->ip]) }}" title="Click IP to ban"><i>[{{ $reply->ip  }}]</i></a>
        @endif

        {{ $reply->created_at }} No.{{ $reply->id }}
        <br />
        <pre>{{ $reply->body }}</pre>
    </div>
    <br />
@endforeach