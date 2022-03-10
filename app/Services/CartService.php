<?php

namespace App\Services;
use App\Models\Catproduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartService
{
    public function store(Request $request){

        $duplicata = Cart::search(function ($cartItem, $rowId) use($request){
            return $cartItem->id == $request->product_id;
        });

        if($duplicata->isNotEmpty()){
            return redirect('/')->with('error', 'Le produit a déjà été ajouté');
        }

        $product = Product::find($request->product_id);

        Cart::add($product->id, $product->nom, 1,$product->prix)
              ->associate('App\Models\Product');
              
        return redirect('/')->with('success', 'Le produit a bien été ajouté.');
    }
}