<h2>Edit Produk</h2>

<form method="POST" action="/seller/product/{{ $product->id }}/update">
    @csrf

    <input type="text" name="nama_produk" value="{{ $product->nama_produk }}"><br><br>
    <input type="number" name="harga" value="{{ $product->harga }}"><br><br>
    <input type="number" name="stok" value="{{ $product->stok }}"><br><br>
    <textarea name="deskripsi">{{ $product->deskripsi }}</textarea><br><br>

    <button type="submit">Update</button>
</form>

