<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $stocks = Stock::Paginate(6);
        return view('shop',compact('stocks'));
    }
    public function myCart(Cart $cart)
    {
        $data = $cart->showCart();
        return view('mycart',$data);
    }
    public function addMycart(Request $request,Cart $cart)
    {
        $stock_id=$request->stock_id;
        $message = $cart->addCart($stock_id);

        $data = $cart->showCart();

        return view('mycart',$data)->with('message',$message);
    }
    public function deleteCart(Request $request,Cart $cart)
    {
       $stock_id=$request->stock_id;
       $message = $cart->deleteCart($stock_id);

       $data = $cart->showCart();

       return view('mycart',$data)->with('message',$message);
    }
    public function checkout(Cart $cart)
    {
       $checkout_items = $cart->checkoutCart();
       return view('checkout');
    }
}
