<h2>Dashboard Seller</h2>

<p>Login sebagai: {{ auth('seller')->user()->name }}</p>

<a href="/seller/product/create">Tambah Produk</a>

<hr>

<h3>Daftar Produk</h3>

@foreach ($products as $p)
    <div style="border:1px solid #ccc; padding:10px; margin:10px 0;">
        <b>{{ $p->nama_produk }}</b><br>
        Harga: {{ $p->harga }} <br>
        Stok: {{ $p->stok }} <br>
        <a href="/seller/product/{{ $p->id }}/edit">Edit</a>
    </div>
@endforeach
