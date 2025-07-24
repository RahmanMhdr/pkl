<h2>Halo, {{ auth()->user()->name }}</h2>
<form method="POST" action="/logout">
    @csrf
    <button type="submit">Logout</button>
</form>
