<?php

namespace App\Services;
use App\Models\Catproduct;
use App\Models\Product;

class ProductService
{
    public function getPizza(){
        $pizza = Catproduct::join('products', 'catproducts.id', '=', 'products.category_id')
                ->where('catproducts.category', 'Pizza')
                ->get();
        return $pizza;
    }

    public function getSalade(){
        $salade = Catproduct::join('products', 'catproducts.id', '=', 'products.category_id')
                ->where('catproducts.category', 'Salade')
                ->get();
        return $salade;
    }

    public function getBoisson(){
        $boisson = Catproduct::join('products', 'catproducts.id', '=', 'products.category_id')
                ->where('catproducts.category', 'Boisson')
                ->get();
        return $boisson;
    }

    public function getProductByName($name){
        $product = Product::where('nom', $name)->firstOrFail();
        return $product;
    }
}

