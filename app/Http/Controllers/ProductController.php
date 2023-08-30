<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Catagory;

use App\Models\Product;

use Illuminate\Support\Facades\Storage;


class ProductController extends Controller

{

    public function show_product()
    {
      $product=Product::get();
    
      $product = Product::with('catagory')->get();

      return view('product.show_product', compact('product')); 

 
    }
    public function create()
    {
      $catagory=catagory::all();
      
      return view('product.create', compact('catagory')); 
       

    }
    public function store(Request $request)
    { 
      $image=$request->image;
      $imageName= time().'.'.$request->image->extension();
      $request->image->move(public_path('products'),$imageName);
      $product= new Product;
        $product->image=$imageName;
        $product->name=$request->name;
        $product->Code=$request->code;
        $product->Price=$request->price;
        $product->catagory_id=$request->catagory_id;
        $product->save();
        return redirect()->back()->with('message', 'Product Added Sucessfully');

    }
    public function edit_product($id){
        $product= Product::find($id);
        $catagory=catagory::all();

        return view('product.edit_product', compact('product', 'catagory'));


    }

    public function update_product( Request $request, $id)
    { 
      $product=Product::find($id);
      $product->name=$request->name;
      $product->Code=$request->code;
      $product->Price=$request->price;
      $product->catagory_id=$request->catagory_id;
      $image=$request->image;
      if($image)
      {
        $imageName= time().'.'.$request->image->extension();
        $request->image->move(public_path('products'),$imageName);
        $product->image=$imageName;

      }
      
        
       
        $product->save();
        return redirect()->back()->with('message', 'Product Updated Sucessfully');

    }

    public function delete_product($id)
    {
      $product=product::find($id);

      $product->delete();
      return redirect()->back()->with('message', 'Product Deleted Sucessfully');

    }


}