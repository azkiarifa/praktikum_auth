<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

/*
|--------------------------------------------------------------------------
| LOGIN PAGE
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', fn () => view('admin.login'))->name('admin.login');
Route::get('/seller/login', fn () => view('seller.login'))->name('seller.login');
Route::get('/buyer/login', fn () => view('buyer.login'))->name('buyer.login');


/*
|--------------------------------------------------------------------------
| LOGIN ACTION
|--------------------------------------------------------------------------
*/

Route::post('/admin/login', function (Request $r) {
    if (Auth::guard('admin')->attempt($r->only('email','password'))) {
        return redirect('/admin/dashboard');
    }
    return back()->with('error', 'Login gagal');
})->name('admin.login.submit');

Route::post('/seller/login', function (Request $r) {
    if (Auth::guard('seller')->attempt($r->only('email','password'))) {
        return redirect('/seller/dashboard');
    }
    return back()->with('error', 'Login gagal');
})->name('seller.login.submit');

Route::post('/buyer/login', function (Request $r) {
    if (Auth::guard('buyer')->attempt($r->only('email','password'))) {
        return redirect('/buyer/dashboard');
    }
    return back()->with('error', 'Login gagal');
})->name('buyer.login.submit');



/*
|--------------------------------------------------------------------------
| ADMIN (auth:admin)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:admin')->get('/admin/dashboard', function () {
    $products = Product::all();
    return view('admin.dashboard', compact('products'));
});

Route::middleware('auth:admin')->get('/admin/products', function () {
    $products = \App\Models\Product::all();
    return view('admin.products', compact('products'));
});

Route::middleware('auth:admin')->get('/admin/product/{id}/edit', function ($id) {
    $product = Product::find($id);
    return view('admin.edit', compact('product'));
});

Route::middleware('auth:admin')->post('/admin/product/{id}/update', function (Request $r, $id) {
    $product = Product::find($id);
    $product->update($r->all());
    return redirect('/admin/dashboard')->with('success', 'Produk berhasil diupdate!');
});

Route::middleware('auth:admin')->get('/admin/product/{id}/delete', function ($id) {
    Product::destroy($id);
    return back()->with('success', 'Produk berhasil dihapus!');
});



/*
|--------------------------------------------------------------------------
| SELLER (auth:seller)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:seller')->get('/seller/dashboard', function () {
    $products = Product::all();
    return view('seller.dashboard', compact('products'));
});

// Create Form
Route::middleware('auth:seller')->get('/seller/product/create', function () {
    return view('seller.create');
});

// Store product
Route::middleware('auth:seller')->post('/seller/product/store', function (Request $r) {
    Product::create($r->all());
    return redirect('/seller/dashboard')->with('success', 'Produk berhasil ditambahkan!');
});

// Edit form
Route::middleware('auth:seller')->get('/seller/product/{id}/edit', function ($id) {
    $product = Product::find($id);
    return view('seller.edit', compact('product'));
});

// Update product
Route::middleware('auth:seller')->post('/seller/product/{id}/update', function (Request $r, $id) {
    $product = Product::find($id);
    $product->update($r->all());
    return redirect('/seller/dashboard')->with('success', 'Produk berhasil diupdate!');
});



/*
|--------------------------------------------------------------------------
| BUYER (auth:buyer)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:buyer')->get('/buyer/dashboard', function () {
    return view('buyer.dashboard');
});

Route::middleware('auth:buyer')->get('/products', function () {
    $products = Product::all();
    return view('buyer.products', compact('products'));
});

Route::middleware('auth:buyer')->post('/buyer/add-to-cart/{id}', function ($id) {
    Cart::create([
        'buyer_id' => auth('buyer')->id(),
        'product_id' => $id,
        'qty' => 1
    ]);
    return back()->with('success', 'Berhasil masuk keranjang!');
});

Route::middleware('auth:buyer')->get('/buyer/cart', function () {
    $cart = Cart::where('buyer_id', auth('buyer')->id())->get();
    return view('buyer.cart', compact('cart'));
});
