<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\UserData;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Laravel\Facades\Image;

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

    public function order_now($id, $amount){
        $user = Auth::user();
        $userData = UserData::where('user_id', '=', $user->id)->first();
        
        $product = Product::with('attachment')->get()->find($id);
        
        $product->amount = $amount;
        $product->subtotal = ($amount * $product->price);
        $data = [
            'title' => 'Order',
            'product' => $product,
            'user' => $user,
            'userData' => $userData
        ];
        return view('customer.order_now', $data);
    }
    
    public function order_cart($id){
        $user = Auth::user();
        $product = Product::where('id', '=', $id)->with('attachment')->get();
        $data = [
            'product_id' => $id,
            'user_id' => $user->id
        ];
        Cart::create($data);
        return redirect()->back()->with('cartAdded', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function checkout(Request $request){

        $user = Auth::user();
        $userDataId = $request->userdata_id;

        // Update user data when checkout to renew user profile

        $userData = UserData::find($userDataId);

        $userData->telepon = $request->telepon;
        $userData->no_hp = $request->handphone;
        $userData->alamat = $request->alamat;
        $userData->kota = $request->kota;
        $userData->provinsi = $request->provinsi;
        $userData->kode_pos = $request->kode_pos;
        $userData->save();

        $orderCode = 'AR' . strtoupper(bin2hex(random_bytes(10 / 2)));


        $dataOrder = [
            'user_id' => $user->id,
            'code' => $orderCode,
            'status' => 'Dipesan',
            'method' => $request->billingOptions,
            'note' =>  $request->catatan,

        ];
        
        if($request->hasFile('file-transfer')){
            
            $file = $request->file('file-transfer');
            $imageName = $orderCode.'_'.time().'.'.$file->getClientOriginalExtension();
            $image_resize = Image::read($file->getRealPath());              
            $image_resize->cover(800,800);
            $image_resize->save(public_path('uploads/payment/' .$imageName));

            $dataOrder['pay_atttachment'] = $imageName;
        }

        $order = Order::create($dataOrder);

        
        $productIds = $request->product_ids;
        $amounts = $request->amounts;
        $prices = $request->prices;
        $num = 0;
        $totalPrice = 0;
        
        foreach ($productIds as $productId) {
            $totalPrice += ($amounts[$num] * $prices[$num]);
            
            $product = Product::find($productId);
            $product->stock = ($product->stock - $amounts[$num]);
            $product->save();

            $orderItem = ['order_id' => $order->id, 'product_id' => $productId, 'amount' => $amounts[$num]];
            OrderItem::create($orderItem);
            $num++;
        }

        $order->total_payment = $totalPrice;
        $order->save();
        
        return redirect()->back()->with('success', 'Checkout berhasil.'); 
        
    }

}
    
