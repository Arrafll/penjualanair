<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    //
    public function dashboard(){
        $product = Product::with('attachment')->get();
        $data = [
            'title' => 'Dashboard Agent',
            'product' => $product
        ];
        return view('agent.dashboard', $data);
    }

    public function profile(){
        $auth = Auth::user();
        $data = [
            'title' => 'Profile',
            'profile' => $auth
        ];
        return view('profile_page', $data);
    }
}
