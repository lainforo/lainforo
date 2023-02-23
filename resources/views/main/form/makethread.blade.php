<form method="post" action="{{ route('putthread', ['uri' => session()->pull('board_uri')] ) }}">
    @csrf
    <input type="text" name="author" value="Anonymous"><br />
    <input type="text" name="subject" placeholder="Subject"><br />
    <input type="text" name="tripcode" placeholder="Tripcode (optional"><br />
    <textarea name="body" placeholder="Message"></textarea><br />
    <input type="submit" value="New Thread">
</form>
