<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add($id)
    {
        Cart::create([
            'buyer_id' => Auth::guard('buyer')->id(),
            'product_id' => $id,
            'qty' => 1
        ]);

        return redirect()->back()->with('success','Ditambahkan ke keranjang');
    }
}
