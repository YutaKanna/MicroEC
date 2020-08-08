<?php

namespace App\Http\Controllers\Cart;

use App\Events\AddedItemCart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartAddItemRequest;
use App\Http\Requests\Cart\CartRemoveItemRequest;
use App\Http\Requests\Cart\CartUpdateItemQuantityRequest;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function addItem(CartAddItemRequest $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;

        $product = Product::find($productId);

        Cart::add($product->id, $product->name, $product->price, $quantity);

        event(new AddedItemCart());

        return redirect()->back()->with('success_message', '追加しました');
    }

    public function removeItem(CartRemoveItemRequest $request)
    {
        $productId = $request->product_id;
        Cart::remove($productId);
        return redirect()->back()->with('success_message', '削除しました');
    }

    public function updateItemQuantity(CartUpdateItemQuantityRequest $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;
        $old = Cart::get($productId);
        $diff = $quantity - $old->quantity;

        Cart::update($productId, ['quantity' => $diff]);

        return redirect()->back()->with('success_message', '変更しました');
    }
}