<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $request->validate([
            'image_name' => 'required|file|max:2048', // Example validation rules
        ]);
        if($request->hasFile('image_name')){
        $filename = $request->file('image_name')->getClientOriginalName();
        }
        $request->file('image_name')->storeAs('/public/images',$filename);
                $product= new Product();
                $product->title=$request->input("title");
                $product->price=$request->input("price");
                $product->sold_by=$request->input("sold_by");
                $product->SKU=$request->input("SKU");
                $product->image_name = $filename;
                $category=Category::where('title', $request->input("category"))->get()->first();
                $category->products()->save($product);
                return redirect()->route('admin.product.addProduct')->with('success','Product added successfully');

    }
}
