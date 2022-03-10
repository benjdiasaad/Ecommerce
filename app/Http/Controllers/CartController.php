<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\App\CartApp;

class CartController extends Controller
{

    public function __construct(CartApp $cartApp)
    {
        $this->cartApp = $cartApp;
    }

    public function index()
    {
        return view('cart.index');
    }
    
    public function store(Request $request){
        $result = $this->cartApp->store($request);
        return $result;
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return back()->with('success', 'Le produit a été supprimé.');
    }
}

