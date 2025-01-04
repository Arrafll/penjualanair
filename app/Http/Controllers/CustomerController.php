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
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;

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
        $user = Auth::user();
        $queryAttachment = DB::table('attachments')
                            ->select(DB::raw('MIN(attachments.name) as product_pic'), 'product_id')
                            ->groupBy('attachments.product_id');

        $cart = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->joinSub($queryAttachment, 'attachments', function (JoinClause $join) {
                $join->on('products.id', '=', 'attachments.product_id');
            })
            ->select('carts.*', 'products.name as product_name', 'products.price', DB::raw('(products.price * carts.amount) as amountPrice'), 'attachments.*')
            ->where('carts.user_id', '=', $user->id)
            ->get();
            
        $data = [
            'title' => 'Keranjang',
            'cart' => $cart
        ];
        return view('customer.cart_list', $data);
    }

    public function cart_add($id, $amount){
        $user = Auth::user();
        $data = [
            'product_id' => $id,
            'amount' => $amount,
            'user_id' => $user->id
        ];
        Cart::create($data);
        return redirect()->back()->with('cartAdded', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function cart_delete($id){
        $cart = Cart::find($id);
        $cart->delete($id);
        return redirect()->back()->with('cartDeleted', 'Produk berhasil dihapus dari keranjang.');
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
    
    public function order_cart(){
        $user = Auth::user();
        $userData = UserData::where('user_id', '=', $user->id)->first();
        
        $queryAttachment = DB::table('attachments')
                            ->select(DB::raw('MIN(attachments.name) as product_pic'), 'product_id')
                            ->groupBy('attachments.product_id');

        $cart = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->joinSub($queryAttachment, 'attachments', function (JoinClause $join) {
                $join->on('products.id', '=', 'attachments.product_id');
            })
            ->select('carts.*', 'products.name as product_name', 'products.price', DB::raw('(products.price * carts.amount) as amountPrice'), 'attachments.*')
            ->where('carts.user_id', '=', $user->id)
            ->get();
    
        $data = [
            'title' => 'Order',
            'cart' => $cart,
            'user' => $user,
            'userData' => $userData
        ];

        return view('customer.order_cart', $data);
    }

    public function checkout(Request $request){

        $user = Auth::user();
        $userDataId = $request->userdata_id;

        $rules = [
            'telepon' => 'required|min:10|numeric',
            'handphone' => 'required|min:10|numeric',
            'alamat' => 'required|min:5',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
        ];

        $validMsg = [
              'kode_pos.required' => 'Kolom kode pos tidak boleh kosong.',
              'required' => 'Kolom :attribute tidak boleh kosong.',
              'unique' => 'Data :attribute sudah terdaftar.',
              'min' => 'Data :attribute minimal :min karakter.',
              'max' => 'Data :attribute maksimal :max karakter.',
              'numeric' => 'Karakter :attribute harus berupa angka.'
        ];

        if($request->billingOptions == "Bank")  {
            
        $rules['nama_rek'] = 'required';
        $validMsg['nama_rek.required'] = 'Kolom nama rekening tidak boleh kosong.';
        $rules['file_transfer'] = 'required';
        }

        $this->validate($request, $rules, $validMsg);

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
            'nama_rek' => $request->nama_rek
        ];
        
        if($request->hasFile('file_transfer')){
            
            $file = $request->file('file_transfer');
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
        $totalPrice = (int) $request->total_payment;
        
        foreach ($productIds as $productId) {            
            $product = Product::find($productId);
            $product->stock = ($product->stock - $amounts[$num]);
            $product->save();

            $orderItem = ['order_id' => $order->id, 'product_id' => $productId, 'amount' => $amounts[$num]];
            OrderItem::create($orderItem);
            $num++;
        }

        $order->total_payment = $totalPrice;
        $order->save();

        if($request->order_type == "cart") {
            Cart::where('user_id', $user->id)->delete();
        }
        
        return redirect()->back()->with('success', 'Checkout berhasil.'); 
        
    }

}
    
