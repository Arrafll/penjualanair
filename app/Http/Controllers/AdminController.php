<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attachment;
use Illuminate\Support\Facades\File; 

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
        $productDesc = $request->productDesc;

        $data = [
            'name' => $productName,
            'brand' => $brandName,
            'price' => $price,
            'description' => $productDesc,
        ];
        
        $productId = Product::create($data)->id;
        
        $files = $request->file('files');
        foreach($files as $file) {

            $imageName = $productName.time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $imageName);

            $data = [
                'name' => $imageName,
                'type' => 'product',
                'typeId' => $productId
            ];

            Attachment::create($data);
            
        }
        
        return redirect('admin_product')->with('success', 'Data produk berhasil ditambahkan.'); 
    }

    public function edit_product(){
        $data = [
            'title' => 'Add Product',
        ];
        return view('admin.product_add', $data);
    }

    
    public function product_delete($id){
      
       //get product by ID
       $product = Product::findOrFail($id);

       $attachments = Attachment::where('typeId', '=', $id);
       $attachmentData = $attachments->get();
       foreach ($attachmentData as $att) {
            //delete image
            $path = public_path() . "/uploads/$att->name";
            File::delete($path);

       }
       $attachments->delete();
       //delete product
       $product->delete();

       //redirect to index
       return redirect('admin_product')->with('deleteSuccess', 'Data produk berhasil dihapus.'); 
    }
}

