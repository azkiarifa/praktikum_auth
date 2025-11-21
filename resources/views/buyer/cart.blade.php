<h2>Keranjang Anda</h2>

@if($cart->isEmpty())
    <p>Keranjang kosong</p>
@else
    <ul>
    @foreach($cart as $item)
        <li>
            {{ $item->product->nama_produk ?? 'Produk sudah tidak ada' }} - Qty: {{ $item->qty }}
        </li>
    @endforeach
    </ul>
@endif
