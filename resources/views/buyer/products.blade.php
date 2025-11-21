<h2>Daftar Produk</h2>

@foreach ($products as $p)
<div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
    <h3>{{ $p->nama_produk }}</h3>
    <p>Harga: {{ $p->harga }}</p>
    <p>Stok: {{ $p->stok }}</p>
    <p>{{ $p->deskripsi }}</p>

    <form action="/buyer/add-to-cart/{{ $p->id }}" method="POST">
        @csrf
        <button type="submit">Tambah ke Keranjang</button>
    </form>
</div>
@endforeach
