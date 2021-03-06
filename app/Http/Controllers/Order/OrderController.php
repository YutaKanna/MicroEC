<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Cart;

class OrderController extends Controller
{
    public function index()
    {
        // TASK: redirect if cart was empty <- move to middleware and that middleware uses in Router.
        if (!count(Cart::getContent())) {
            return redirect()->route('store.cart.index', ['subDomain' => $store->slug])->withErrors('カートに商品がありません。');
        }

        return view('order.index');
    }
}
