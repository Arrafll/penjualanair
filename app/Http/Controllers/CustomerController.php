<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderReview;
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
        $user = Auth::user();
        $queryAttachment = DB::table('attachments')
        ->select(DB::raw('MIN(attachments.name) as product_pic'), 'product_id')
        ->groupBy('attachments.product_id');


        $product = DB::table('products')
        ->limit(5)
        ->joinSub($queryAttachment, 'attachments', function (JoinClause $join) {
            $join->on('products.id', '=', 'attachments.product_id');
        })
        ->select('products.*', 'attachments.*')
        ->orderBy('products.id', 'DESC')
        ->get();

        $order = Order::where('user_id', '=', $user->id)->orderBy('id', 'DESC')->limit(5)->get();
        $data = [
            'title' => 'Home',
            'product' => $product,
            'order' => $order
        ];

        return view('customer.dashboard', $data);
    }

    public function shop(){
        $product = Product::with('attachment');

        $request = Request::capture();
        if($request->hasAny('search_product') && $request->search_product != "")
        {
            $product = $product->where('name', 'like' , '%' . $request->search_product . '%');
        }

        if($request->hasAny('price') && $request->price != "")
        {
            $product = $product->orderBy('price', $request->price);
        }
        $product = $product->paginate(12);

        $data = [
            'title' => 'Toko',
            'product' => $product
        ];

        return view('customer.shop', $data);
    }

    public function profile(){
        $auth = Auth::user();
        $order = Order::where('user_id', '=', $auth->id)->limit(5)->get();

        $queryAttachment = DB::table('attachments')
        ->select(DB::raw('MIN(attachments.name) as product_pic'), 'product_id')
        ->groupBy('attachments.product_id');

        $orderReviews = DB::table('order_reviews')
        ->join('order_items', 'order_items.id', '=', 'order_reviews.item_id')
        ->join('orders', 'order_items.order_id', '=', 'orders.id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->joinSub($queryAttachment, 'attachments', function (JoinClause $join) {
            $join->on('products.id', '=', 'attachments.product_id');
        })
        ->select('order_reviews.*', 'products.name as product_name', 'products.price', 'products.unit',
        'orders.*',
         DB::raw('(products.price * order_items.amount) as amountPrice'), 'attachments.*')
        ->where('orders.user_id', '=', $auth->id)
        ->limit(5)
        ->get();

        $data = [
            'title' => 'Profile',
            'profile' => $auth,
            'order' => $order,
            'orderReviews' => $orderReviews
        ];
        return view('customer.profile_page', $data);
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
            ->select('carts.*', 'products.name as product_name', 'products.price', 'products.unit', DB::raw('(products.price * carts.amount) as amountPrice'), 'attachments.*')
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

    public function order_list(){
        $user = Auth::user();
        $order = Order::where('user_id', '=', $user->id)->orderBy('id', 'DESC')->get();
        $data = [
            'title' => 'Pesanan',
            'order' => $order,
            'user' => $user
        ];
        return view('customer.order_list', $data);
    }

    public function order_detail($id){
        $user = Auth::user();
        $userData = UserData::where('user_id', '=', $user->id)->first();
        $order = Order::find($id);

        $orderItems = DB::table('order_items')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->select('order_items.*', 'products.name as product_name', 'products.price', 'products.unit', DB::raw('(products.price * order_items.amount) as amountPrice'))
        ->where('order_items.order_id', '=', $order->id)
        ->get();
        
        $data = [
            'title' => 'Pesanan',
            'order' => $order,
            'orderItems' => $orderItems,
            'user' => $user,
            'userData' => $userData
        ];
        return view('customer.order_detail', $data);
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

    
        $this->validate($request, $rules, $validMsg);

        // Update user data when checkout to renew user profile

        $userData = UserData::find($userDataId);
        
        $userData->telepon = $request->telepon;
        $userData->no_hp = $request->handphone;
        $userData->alamat = $request->alamat;
        $userData->kota = $request->kota;
        $userData->provinsi = $request->provinsi;
        $userData->kode_pos = $request->kode_pos;

        $totalPayment = $request->total_payment;
        $userData->save();
        $paymentStatus = 'Waiting';
        $orderCode = 'AR' . strtoupper(bin2hex(random_bytes(10 / 2)));
        $dataOrder = [
            'user_id' => $user->id,
            'code' => $orderCode,
            'payment_status' => $paymentStatus,
            'total_payment' => $totalPayment,
            'status' => 'Ordering',
            'method' => $request->billingOptions,
            'note' =>  $request->catatan,
            'delivery' =>  $request->shippingOptions,
            'nama_rek' => $request->nama_rek
        ];

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
        
        return redirect()->route('customer_order_detail', ['id' => $order->id])->with('successCheckout', 'Checkout berhasil.');    
    }
    
    public function order_cancel($id){

        $order = Order::find($id);
        $order->status = "Cancel";
        $order->payment_status = "Cancel";
        $order->save(); 

        return redirect()->route('admin_order_list')->with('orderCancel', 'Pesanan dibatalkan.');    
    }

    public function order_payment(Request $request){
        $user = Auth::user();
            
        $norek = $request->nomor_rekening;         
        $code = $request->order_code;
        $orderId = $request->order_id;

        $file = $request->file('bukti_transfer');
        $imageName = $code.'_'.time().'.'.$file->getClientOriginalExtension();
        $image_resize = Image::read($file->getRealPath());              
        $image_resize->save(public_path('uploads/payment/' .$imageName));

        $order = Order::find($orderId);
        $order->pay_cred = $norek;
        $order->pay_attachment = $imageName;
        $order->payed_at = date('Y-m-d h:i:s');
        $order->payment_status = 'Checking';
        $order->save();
       
        return redirect()->route('customer_order_detail', ['id' => $orderId])->with('paySucces', 'Mohon tunggu pemeriksaan pembayaran anda.');    

    }

    public function order_rating($id){
        $user = Auth::user();
        $userData = UserData::where('user_id', '=', $user->id)->first();
        $order = Order::find($id);

        $queryAttachment = DB::table('attachments')
        ->select(DB::raw('MIN(attachments.name) as product_pic'), 'product_id')
        ->groupBy('attachments.product_id');


        $orderItems = DB::table('order_items')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->joinSub($queryAttachment, 'attachments', function (JoinClause $join) {
            $join->on('products.id', '=', 'attachments.product_id');
        })
        ->select('order_items.*', 'products.id as product_id', 'products.name as product_name', 'products.price', 'products.unit', DB::raw('(products.price * order_items.amount) as amountPrice'), 'attachments.*')
        ->where('order_items.order_id', '=', $order->id)
        ->get();
        
        $data = [
            'title' => 'Pesanan',
            'order' => $order,
            'orderItems' => $orderItems,
            'user' => $user,
            'userData' => $userData
        ];
        return view('customer.order_rating', $data);
    }

    public function order_review(Request $request){
        $user = Auth::user();
            
        $orderId = $request->order_id;
        $ratings = $request->items_rating;
        $reviews = $request->items_review;
        $productIds = $request->product_id;

        $number = 0;

        $order = Order::find($orderId);
        $order->is_reviewed = 1;
        $order->save();

        foreach($request->items_id as $rid) {
            
            $product = Product::find($productIds[$number]);
            $rating = $product->rating;
            $product->rating = ((float) $rating + (float) $ratings[$number]) / 2;
            $product->save();

            $data = [
                'item_id' => $rid,
                'score' => $ratings[$number],
                'review' => $reviews[$number],
            ];
            
            OrderReview::create($data);
            $number++;

        }
       
        return redirect()->route('customer_order_detail', ['id' => $orderId])->with('paySucces', 'Penilaian berhasil.');    

    }

    

}
    
