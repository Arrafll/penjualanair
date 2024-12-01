<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    //
    public function __construct() {
     
    }

    public function dashboard(){
        $data = [
            'title' => 'Dashboard Admin'
        ];
        return view('admin.dashboard', $data);
    }

    public function admin_product(){
        $data = [
            'title' => 'Product',
            'product' => Product::all()
        ];
        return view('admin.product_list', $data);
    }

    public function admin_add_product(){
        $data = [
            'title' => 'Add Product',
        ];
        return view('admin.product_add', $data);
    }

}
