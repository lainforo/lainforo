<div>
@if ($boards ?? '')
<span style="color:gray;">[</span><a href="{{ route('index') }}">Home</a> / <a href="{{ route('mastermind') }}">Mastermind</a> / Blahblahblah<span style="color:gray;">]</span>
@foreach ($boards as $board)
    <a href="/{{ $board->uri }}/"><span style="color:gray;">[</span>{{ $board->uri }}<span style="color:gray;">]</span></a>
@endforeach
@else
    <b>No boards have been added to LainForo.</b>
@endif
</div>
