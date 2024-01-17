<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function Shop()  {
        $products = Product::all();
        return view('vendor_shop', ['products'=>$products]);
    }
}
