@foreach ($replies as $reply)
    <div class="reply">
        <span class="authorname">{{ $reply->author }}</span>
        @if ($reply->tripcode ?? '')
            <span class="authortrip">!{{ substr($reply->tripcode, 0, 8) }}</span>
        @endif
        {{ $reply->created_at }} No.{{ $reply->id }}
        <br />
        <pre>{{ $reply->body }}</pre>
    </div>
    <br />
@endforeach