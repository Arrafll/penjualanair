<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
}
