<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartAddItemRequest;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function addItem(CartAddItemRequest $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;

        $product = Product::find($productId);

        Cart::add($product->id, $product->name, $product->price, $quantity);

        return redirect()->back()->with('success_message', '追加しました');
    }
}
