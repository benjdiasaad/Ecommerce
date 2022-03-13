<?php

namespace App\App;
use Throwable;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Support\Facades\Log;

class ProductApp {
    
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService=$productService;
    }

    public function getPizza(){
        $result=null;
        try {
            $result = $this->productService->getPizza();
            // $rep = ['status' => "success", 'data' => $result];
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), $th->getLine(), $th->getFile());
            $result = ['response' => 'erreur: unknown error occured !'];
        }
        return $result;
    }

    public function getSalade(){
        $result=null;
        try {
            $result = $this->productService->getSalade();
            // $rep = ['status' => "success", 'data' => $result];
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), $th->getLine(), $th->getFile());
            $result = ['response' => 'erreur: unknown error occured !'];
        }
        return $result;
    }

    public function getBoisson(){
        $result=null;
        try {
            $result = $this->productService->getBoisson();
            // $rep = ['status' => "success", 'data' => $result];
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), $th->getLine(), $th->getFile());
            $result = ['response' => 'erreur: unknown error occured !'];
        }
        return $result;
    }

    public function getProductByName($name){

        $result=null;
        try {
            $result = $this->productService->getProductByName($name);
            // $rep = ['status' => "success", 'data' => $result];
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), $th->getLine(), $th->getFile());
            $result = ['response' => 'erreur: unknown error occured !'];
            dd($result);
        }
        return $result;

    }

}