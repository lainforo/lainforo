<form action="{{ route('search.results') }}" method="post">
    @csrf

    <input type="text" name="string" placeholder="Search string"><br />
    <input type="submit">
</form>
