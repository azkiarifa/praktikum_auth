<h2>Edit Produk (Admin)</h2>

<form method="POST" action="/admin/product/{{ $product->id }}/update">
    @csrf

    <label>Nama Produk</label><br>
    <input type="text" name="nama_produk" value="{{ $product->nama_produk }}"><br><br>

    <label>Harga</label><br>
    <input type="number" name="harga" value="{{ $product->harga }}"><br><br>

    <label>Stok</label><br>
    <input type="number" name="stok" value="{{ $product->stok }}"><br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi">{{ $product->deskripsi }}</textarea><br><br>

    <button type="submit">Update Produk</button>
</form>

<br>

<a href="/admin/products">← Kembali</a>
