<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Stock::query();

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        $stocks = $query->paginate(6); //ストックをページ内に表示

        return view('shop', compact('stocks', 'keyword'));
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
    public function showImage(Request $request)
    {
        // Get the requested file name from the URL
        $requestedFile = $request->input('file');
        // Construct the full path to the image file
        $imagePath = public_path('image/' . $requestedFile);
        // Check if the file exists
        if (!file_exists($imagePath)) {
            abort(404, 'File not found.');
        }
        // Return the image file
        $fileContents = file_get_contents($imagePath);
        $response = response($fileContents, 200);
        // Set the appropriate content type
        $response->header('Content-Type', mime_content_type($imagePath));

        return $response;
    }

}
