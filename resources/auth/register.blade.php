<h2>Register</h2>
<form action="/register" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nama" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required><br>
    <button type="submit">Register</button>
</form>
<a href="/login">Sudah punya akun?</a>
