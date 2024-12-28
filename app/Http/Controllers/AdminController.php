<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attachment;
use Illuminate\Support\Facades\File; 
use Intervention\Image\Laravel\Facades\Image;

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
            $image_resize = Image::read($file->getRealPath());              
            $image_resize->cover(800,800);
            $image_resize->save(public_path('uploads/product/' .$imageName));
            // $file->move(public_path('/uploads/product/'), $imageName);

            $data = [
                'name' => $imageName,
                'product_id' => $productId
            ];

            Attachment::create($data);
            
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
                $image_resize->cover(800,800);
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
}

