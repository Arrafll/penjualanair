<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //
    public function dashboard(){
        $product = Product::with('attachment')->paginate(8);
        $data = [
            'title' => 'Dashboard Customer',
            'product' => $product
        ];
        return view('customer.dashboard', $data);
    }

    public function profile(){
        $auth = Auth::user();
        $data = [
            'title' => 'Profile',
            'profile' => $auth
        ];
        return view('profile_page', $data);
    }

    public function detail_product($id){
        $product = Product::with('attachment')->get()->find($id);
        $data = [
            'title' => 'Detail Product',
            'product' => $product
        ];
        return view('customer.product_detail', $data);
    }

    public function cart_list(){
        $product = Cart::all();
        $data = [
            'title' => 'Keranjang',
            'product' => $product
        ];
        return view('customer.cart_list', $data);
    }

    public function cart_add($id){
        $user = Auth::user();
        $data = [
            'product_id' => $id,
            'user_id' => $user->id
        ];
        Cart::create($data);
        return redirect()->back()->with('cartAdded', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function order_now($id){
        $user = Auth::user();
        $data = [
            'product_id' => $id,
            'user_id' => $user->id
        ];
        Cart::create($data);
        return redirect()->back()->with('cartAdded', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function order_cart($id){
        $user = Auth::user();
        $data = [
            'product_id' => $id,
            'user_id' => $user->id
        ];
        Cart::create($data);
        return redirect()->back()->with('cartAdded', 'Produk berhasil ditambahkan ke keranjang.');
    }
}
