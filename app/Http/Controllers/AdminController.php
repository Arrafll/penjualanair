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
        
        // $productId = Product::create($data)->id;
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

    public function product_edit($id){
        
        $product = Product::findOrFail($id);
        $attachments = Attachment::where('typeId', '=', $id)->get();

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
        
        // Kondisi ketika update file baru
        if(!empty($files)) {    
            $attachments = Attachment::where('typeId', '=', $productId);
            $attachmentData = $attachments->get();

            // Jika ada file lama ada yang diubah maka file lama dihapus
            foreach ($attachmentData as $att) {
                if(!in_array($att->name, $existFiles)) {
                    //delete file image
                    $path = public_path() . "/uploads/$att->name";
                    File::delete($path);
                    $att->delete();
                }
            }
           
            foreach($files as $file) {

                $imageName = $productName.$fileNumber.time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('/uploads'), $imageName);
    
                $data = [
                    'name' => $imageName,
                    'type' => 'product',
                    'typeId' => $productId
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

