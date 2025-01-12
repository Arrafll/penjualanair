<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attachment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;

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

    // Product Section

    public function product(){
        $data = [
            'title' => 'Product',
            'product' => Product::all()
        ];
        return view('admin.product_list', $data);
    }

    public function add_product(){
        $data = [
            'title' => 'Add Product',
        ];
        return view('admin.product_add', $data);
    }

    public function product_insert(Request $request) {
        
        $productName = $request->productName;
        $brandName = $request->brandName;
        $price = $request->price;
        $stock = $request->stock;
        $unit = $request->unit;
        $productDesc = $request->productDesc;

        $data = [
            'name' => $productName,
            'brand' => $brandName,
            'price' => $price,
            'stock' => $stock,
            'unit' => $unit,
            'description' => $productDesc,
            'rating' => 0
        ];
        
        $productId = Product::create($data)->id;
        $files = $request->file('files');
        $fileNumber = 0;
        foreach($files as $file) {

            $imageName = $productName.$fileNumber.'_'.time().'.'.$file->getClientOriginalExtension();
            $image_resize = Image::read($file->getRealPath());    
            $image_resize->save(public_path('uploads/product/' .$imageName));
            // $file->move(public_path('/uploads/product/'), $imageName);

            $data = [
                'name' => $imageName,
                'product_id' => $productId
            ];

            Attachment::create($data);
            $fileNumber++;
        }
        
        return redirect('admin_product')->with('success', 'Data produk berhasil ditambahkan.'); 
    }

    public function product_edit($id){
        
        $product = Product::findOrFail($id);
        $attachments = Attachment::where('product_id', '=', $id)->get();

        $data = [
            'title' => 'Edit Product',
            'product' => $product,
            'attachments' => $attachments
        ];
        
        return view('admin.product_edit', $data);
    }

    public function product_update(Request $request) {
        
        $productId = $request->productId;
        $productName = $request->productName;
        $brandName = $request->brandName;
        $price = $request->price;
        $productDesc = $request->productDesc;
        $existFiles = $request->existFiles;
        
        $product = Product::find($productId);
        $product->name = $productName;
        $product->brand = $brandName;
        $product->price = $price;
        $product->description = $productDesc;
        $product->save(); 
        $files = $request->file('files');
        $fileNumber = 0;

        // Jika ada file lama ada yang diubah atau dihapus, maka file lama dihapus
        $attachments = Attachment::where('product_id', '=', $productId);
        $attachmentData = $attachments->get();
        foreach ($attachmentData as $att) {
            if(!in_array($att->name, $existFiles)) {
                //delete file image
             
                $path = public_path() . "/uploads/product/$att->name";
                File::delete($path);
                $att->delete();
            }
        }

        // Kondisi ketika update file baru
        if(!empty($files)) {    

            foreach($files as $file) {

                $imageName = $productName.$fileNumber.'_'.time().'.'.$file->getClientOriginalExtension();
                $image_resize = Image::read($file->getRealPath()); 
                $image_resize->save(public_path('uploads/product/' .$imageName));
    
                $data = [
                    'name' => $imageName,
                    'product_id' => $productId
                ];
    
                Attachment::create($data);
                $fileNumber++;
            }
        }
      
        return redirect('admin_product')->with('success', "Data produk $productName berhasil diubah."); 
    }

    public function product_delete($id){
      
       //get product by ID
       $product = Product::findOrFail($id);

       $attachments = Attachment::where('product_id', '=', $id);
       $attachmentData = $attachments->get();
       foreach ($attachmentData as $att) {
            //delete image
            $path = public_path() . "/uploads/product/$att->name";
            File::delete($path);

       }
       $attachments->delete();
       //delete product
       $product->delete();

       //redirect to index
       return redirect('admin_product')->with('deleteSuccess', 'Data produk berhasil dihapus.'); 
    }

    public function order_list(){
        $user = Auth::user();
        $order = Order::where('status', '!=', 'Selesai')->orderBy('id', 'DESC')->get();
        $data = [
            'title' => 'Pesanan',
            'order' => $order,
            'user' => $user
        ];
        return view('admin.order_list', $data);
    }

    
    public function order_detail($id){
        $order = Order::find($id);
        $user = User::find($order->user_id);
        $userData = UserData::where('user_id', '=', $order->user_id)->first();

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

        return view('admin.order_detail', $data);
    }

    public function order_cancel($id){

        $order = Order::find($id);
        $order->status = "Cancel";
        $order->payment_status = "Cancel";
        $order->save(); 

        return redirect()->route('admin_order_list')->with('orderCancel', 'Pesanan dibatalkan.');    
    }

    public function order_process($id){
        $order = Order::find($id);
        $order->status = "Processing";
        $order->payment_status = "Paid";
        $order->processed_at = date('Y-m-d h:i:s');
        $order->save(); 
        return redirect()->route('admin_order_detail', ['id' => $id])->with('orderProcess', 'Pesanan diproses.');    
    }

    public function order_ship($id){
        $order = Order::find($id);
        $order->status = "Shipping";
        $order->shiped_at = date('Y-m-d h:i:s');
        $order->save(); 
        return redirect()->route('admin_order_detail', ['id' => $id])->with('orderProcess', 'Pesanan dikirim.');    
    }

    public function order_finish($id){
        $order = Order::find($id);
        $order->status = "Done";
        $order->finished_at = date('Y-m-d h:i:s');
        $order->save(); 
        return redirect()->route('admin_order_detail', ['id' => $id])->with('orderProcess', 'Pesanan selesai.');    
    }

}

