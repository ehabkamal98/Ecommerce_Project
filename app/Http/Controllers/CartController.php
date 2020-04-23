<?php

namespace App\Http\Controllers;

use App\CartClass;
use App\Product;
use App\Category;
use App\Cart;
use Session;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function store_session($id,$count)
    {
            $product = Product::find($id);
            $product->quantity=$product->quantity-$count;
            $product->save();
            $old=Session::has('cart')? Session::get('cart') : null;
            $cart=new CartClass($old);
            $cart->add($product,$product->id);
            session()->put('cart',$cart);
            return back()->with('message','Product Added To Cart');
    }

    public function show_cart(){
        $carts=$this->get_my_cart();
        if(!Session::has('cart')){
            return view('cart',['sessions'=>null,'carts'=>$carts]);
        }
        $oldcart=Session::get('cart');
        $cart=new CartClass($oldcart);
        return view('cart',['sessions'=>$cart,'carts'=>$carts]);
    }

    public function empty_session(){
        session()->forget('cart');
        return back();
    }

    public function delete_session(){

    }

    public function save_my_cart(){
        if(!Session::has('cart')){
            return back();
        }
        $oldcart=Session::get('cart');
        $c=new CartClass($oldcart);
        $cart=new Cart();
        $cart->cart_info=serialize($c);
        Auth::user()->carts()->save($cart);
        $this->empty_session();
        return redirect('home');
    }
    public function get_my_cart(){
        $carts=Auth::user()->carts;
        $carts->transform(function($order,$key){
        $order->cart_info=unserialize($order->cart_info);
        return $order;
        });
        return $carts;
    }

    public function empty_cart(){
        $delete=Cart::where('user_id',Auth::user()->id);
        $delete->delete();
        return back();
    }
}
