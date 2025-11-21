<h2>Tambah Produk (Penjual)</h2>

<form action="/seller/product/store" method="POST">
    @csrf

    <input type="text" name="nama_produk" placeholder="Nama Produk"><br><br>
    <input type="number" name="harga" placeholder="Harga"><br><br>
    <input type="number" name="stok" placeholder="Stok"><br><br>
    <textarea name="deskripsi" placeholder="Deskripsi"></textarea><br><br>

    <button type="submit">Simpan</button>
</form>
