<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\App\ProductApp;
use Illuminate\Support\Facades\Auth;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(ProductApp $productApp)
    {
        $this->productApp = $productApp;
    }

    public function index(){
        $pizzaProducts = $this->productApp->getPizza();
        $saladesProducts = $this->productApp->getSalade();
        $boissonsProducts = $this->productApp->getBoisson();
        return view('template.menu', ['pizzas' => $pizzaProducts, 'salades' => $saladesProducts, 'boissons' => $boissonsProducts]);
    }

    public function show($nom){
        $product = $this->productApp->getProductByName($nom);
        return view('template.show')->with('product', $product);
    }
}
