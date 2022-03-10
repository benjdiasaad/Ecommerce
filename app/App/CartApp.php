<?php

namespace App\App;
use App\Services\CartService;
use App\Models\Product;
use Illuminate\Http\Request;
use Log;

class CartApp{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService=$cartService;
    }

    public function store(Request $request){
        $result=null;
        try {
            $result = $this->cartService->store($request);
            // $rep = ['status' => "success", 'data' => $result];
        } catch (\Throwable $th) {
            Log::error($th->getMessage(), $th->getLine(), $th->getFile());
            $result = ['response' => 'erreur: unknown error occured !'];
        }
        return $result;
    }

}