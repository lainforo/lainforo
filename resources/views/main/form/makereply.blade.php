<form method="post" action="{{ route('putreply', ['thread' => session()->pull('thread_id')] ) }}">
    @csrf
    <input type="text" name="author" value="Anonymous"><br />
    <input type="text" name="tripcode" placeholder="Tripcode (optional)"><br />
    <textarea name="body" placeholder="Message"></textarea><br />
    <input type="submit" value="New Reply">
</form>
