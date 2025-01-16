<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //
    public function index()
    {
        return view('v_product.index', [
            'judul' => 'Data Product',
            'products' => Product::all(),
        ]);

    }
    public function create()
    {
             // Membuat kode produk otomatis
             $lastProduct = Product::orderBy('id', 'desc')->first();
             $nextNumber = $lastProduct ? intval(substr($lastProduct->product_code, 4)) + 1 : 1;
             $productcode = 'PRD-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        return view('v_product.create', [
            'judul' => 'Create Product',
            'productcode'=>$productcode
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required',
            'product_name' => 'required',
            'product_type' => 'required|in:125 CC,150 CC',
            'product_price' => 'required',
            'product_stock' => 'required',
            
            'merk' => 'required',
            'product_description'=> 'required',
            'foto' => 'image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);
    
        $massage = [
            'foto.image' => 'Image must be jpeg, jpg, png, atau gif.',
            'foto.max' => 'Maximum image file size is 2048 KB.'
        ];
    
        $lastProduct = Product::orderBy('id', 'desc')->first();
        $nextNumber = $lastProduct ? intval(substr($lastProduct->product_code, 4)) + 1 : 1;
        $productcode = 'PRD-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
 
    
        
        
    
        // Menyimpan data produk
        $product = new Product();
        $product->product_code = $productcode;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_stock = $request->product_stock;
        $product->product_type = $request->product_type;
        $product->product_description = $request->product_description;
        $product->merk = $request->merk;

        $product->foto = isset($originalFileName) ? $originalFileName : null;
        // Upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $originalFileName = date('YmdHis') . '_' . uniqid() . '.' . $extension;
        
            // Tentukan path untuk menyimpan file di public/storage/img-user
            $destinationPath = public_path('storage/img-product');
        
            // Pastikan direktori ada
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
        
            // Pindahkan file ke direktori yang diinginkan
            $file->move($destinationPath, $originalFileName);
        
            // Simpan nama file di database
            $product->foto = $originalFileName;
        }
        $product->save();
        \Log::info('Request Data: ', $request->all());

        return redirect('/product')->with('success', 'Product has been added');
    }

    

// app/Http/Controllers/ProductController.php
public function addstock(Request $request, $id)
{
    $Product = Product::findOrFail($id);
   return view('v_product.addstock', [
       'judul' => 'Add Stock',
       'Product' => $Product


   ]);
}
public function updatestock(Request $request, $id)
    {
        // Validasi input stok
        $request->validate([
            'product_stock' => 'required|numeric|min:1', // Validasi stok yang ditambahkan
        ]);

        $Product = Product::findOrFail($id);

        // Tambahkan stok yang ada dengan stok baru
        $Product->product_stock += $request->product_stock;

        $Product->save();

        return redirect('/product')->with('success', 'Product stock has been updated');
    }



    // EDIT PRODUCT
    public function edit($id)
{
    // Ambil data produk berdasarkan ID
    $product = Product::findOrFail($id);

    // Kirim data ke tampilan untuk di-edit
    return view('v_product.edit', [
        'judul' => 'Edit Product',
        'product' => $product
    ]);
}

public function update(Request $request, $id)
{
   

    $product = Product::findOrFail($id);
    // update data product
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_type = $request->product_type;
        $product->product_description = $request->product_description;
        $product->merk = $request->merk;
        $product->foto = isset($originalFileName) ? $originalFileName : null;
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $extension = $file->getClientOriginalExtension();
        $originalFileName = date('YmdHis') . '_' . uniqid() . '.' . $extension;

        $destinationPath = public_path('storage/img-product');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        $file->move($destinationPath, $originalFileName);
        $product->foto = $originalFileName;
    }

    $product->save();

    return redirect('/product')->with('success', 'Product has been updated');
}



    }


    