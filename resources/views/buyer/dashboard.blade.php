<h2>Dashboard Pembeli</h2>

<p>Halo {{ auth('buyer')->user()->name }}</p>

<a href="/products">Lihat Produk</a> <br><br>
<a href="/buyer/cart">Lihat Keranjang</a>
