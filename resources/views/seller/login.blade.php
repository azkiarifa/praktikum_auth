<form action="{{ route('seller.login.submit') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <button type="submit">Login Seller</button>
</form>