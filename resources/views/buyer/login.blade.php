<!DOCTYPE html>
<html>
<head>
    <title>Buyer Login</title>
</head>
<body>

<h2>Login Pembeli</h2>

<form action="{{ route('buyer.login.submit') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <button type="submit">Login</button>
</form>

</body>
</html>
