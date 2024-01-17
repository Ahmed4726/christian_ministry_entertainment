<?php

namespace App\Http\Controllers;
// use Darryldecode\Cart\Facades\Cart;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
   public function addProduct(){
        return view('layouts.admin.Products.addProduct',["categories"=>Category::all()], ["products"=>Product::all()]);
    }
    public function createProduct(Request $request)
    {
        $request->validate([
            'image_name' => 'required|file|max:2048', // Example validation rules
        ]);
        if($request->hasFile('image_name')){
        $filename = $request->file('image_name')->getClientOriginalName();
        }
        $request->file('image_name')->move(public_path('/dist/img'),$filename);
                $product= new Product();
                $product->title=$request->input("title");
                $product->price=$request->input("price");
                $product->sold_by=$request->input("sold_by");
                $product->SKU=$request->input("SKU");
                $product->user_id=auth()->user()->id;
                $product->image_name = $filename;
                $category=Category::where('title', $request->input("category"))->get()->first();
                $category->products()->save($product);
                return redirect()->route('admin.product.addProduct')->with('success','Product added successfully');
    }
    public function editProduct($id){
        $product = Product::findorfail($id);
      return view("layouts.admin.Products.editProduct", ['categories'=>Category::all()], ['product'=>$product],['products'=>Product::all()]);
    }
    public function updateProduct(Request $request,$id)
    {
        {
            if($request->hasFile('image_name')){
                $filename = $request->file('image_name')->getClientOriginalName();
                }
            $request->file('image_name')->move(public_path('/dist/img'),$filename);    
            $title=$request->input("title");
            $price=$request->input("price");
            $sold_by=$request->input("sold_by");
            $SKU=$request->input("SKU");
            $message="";

            $product=Product::findorfail($id);
            if( 
                $product->title == $title && 
                $product->price==$price && 
                $product->sold_by==$sold_by && 
                $product->SKU==$SKU )
            {
                $message="No changes occur";
                return redirect()->route('admin.product.addProduct')->with('success','No changes occur');
            }
            else{
                $product->title = $title;
                $product->price=$price;
                $product->sold_by=$sold_by;
                $product->SKU=$SKU ;
                $product->save();
                return redirect()->route('admin.product.addProduct')->with('success','Product updated successfully');
            }
        }
    }  
    public function all_products(int $id = null) {
        if ($id == null) {
            // return redirect()->route('allfurnitureproduct');
        }
        $product = Product::find($id);
        
        return view('gift-card', ['products'=>Product::all()],['product'=>$product]);
    }
    public function show_product(int $id = null) {
        if ($id == null) {
            // return redirect()->route('allfurnitureproduct');
        }
        $product = Product::findorfail($id);
        return view('product', ['product'=>$product]);
        

    }
    public function deleteProduct($id)
    {
        $product=Product::find($id);
        $product->delete();
        $message='product deleted successfully';
        return redirect()->route('admin.product.addProduct')->with('success','Product deleted suucessfully');
    } 
    public function showCart()
    {
        $cartItems = Cart::where('user_id', auth()->user()->id)->where('status','Unpaid')->get();
        // dd($cartItems);
        $user = Auth::user();
        $cart = $user->cart;
        $carts = $user->carts()->where('status', 'Unpaid')->get();
        // dd($carts);
        return view('cart',compact('cartItems','carts'));
    }
   
    public function addToCart(Request $request ,$id)
    {
        if (Auth::id()) {
            $product= Product::findorfail($id);
            $cart=new Cart();
            $cart->product_id= $product->id;
            $cart->product_image= $product->image;
            $cart->product_title= $product->title;
            $cart->price= $product->price;
            $cart->quantity= $request->quantity;
            $cart->user_id= auth()->user()->id;
            $cart->save();
            return redirect()->route('gift-card')->with('success', 'Product added to cart successfully.');
        }
        else{
            return redirect()->route('login');
        }
            
        
    }
    public function updateCart($id, Request $request)
    {
        if (Auth::id()) {
            // $product= Product::findorfail($id);
            $cart= Cart::findorfail($id);
            $cart->quantity= $request->quantity;
            $cart->save();
            return redirect()->route('show.cart')->with('success', 'Cart updated successfully.');
        }
    }
    public function deleteCart($id)
    {
       $cart= Cart::findorfail($id);
       $cart->delete();

        return redirect()->route('show.cart')->with('success', 'Product removed from cart.');
    }
    public function Checkout(Request $request)
    {
        if(Auth::id()){
            
            // $orders = Order::where('status', 0)->get();
            $order = new Order();
            $order->bill = $request->input('bill');
            $order->user_id = auth()->user()->id;
            if($order->save())
            {
                $carts = Cart::where('user_id', auth()->user()->id)->with('product')->get();
                foreach ($carts as $cart) {
                    $order_item = new OrderItem();
                    $order_item->product_image= $cart->product_image;
                    $order_item->product_title= $cart->product_title;
                    $order_item->price= $cart->price;
                    $order_item->quantity= $cart->quantity;
                    $order_item->order_id= $order->id;
                    $order_item->save();
                    $user = Auth::user()->id;
                }
            return redirect()->route('checkout');
            }
            
        }

    
    }
    function showCheckout(Request $request ) {
        $user = auth()->user()->id;
        $cart = Order::selectRaw('SUM(bill) as subtotal')->where('user_id', $user)->where('status', 'Unpaid')->get();
        // dd($user , $cart->bill);
        // dd($cart);
        // $bill = $request->input('bill');
        return view('checkout',compact('cart'));
    }
    
    public function payment_methods()
    {
        return view('payment_methods');
    }
   
    public function show_all_orders()
    {
        return view('layouts.admin.orders.all_orders',['orders'=>Order::all()]);
    }
} 

