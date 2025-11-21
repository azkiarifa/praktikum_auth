<h2>Daftar Produk (Admin)</h2>

@if (session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@foreach ($products as $p)
    <div style="border:1px solid #ccc; padding:10px; margin:10px 0;">
        <b>{{ $p->nama_produk }}</b><br>
        Harga: {{ $p->harga }}<br>
        Stok: {{ $p->stok }}<br>
        <p>{{ $p->deskripsi }}</p>

        <a href="/admin/product/{{ $p->id }}/edit">Edit</a> |
        <a href="/admin/product/{{ $p->id }}/delete" onclick="return confirm('Yakin hapus produk?')">Hapus</a>
    </div>
@endforeach

<br>
<a href="/admin/dashboard">← Kembali ke Dashboard</a>
