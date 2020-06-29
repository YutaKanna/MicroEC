<?php

namespace App\Http\Controllers\Order;

use Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

class OrderController extends Controller
{
    public function index()
    {
        // TASK: redirect if cart was empty <- move to middleware and that middleware uses in Router.
        if (!count(Cart::getContent())) {
            return redirect()->route('cart.index')->withErrors('カートに商品がありません。');
        }

        return view('order.index');
    }

    public function store(CheckoutRequest $request)
    {
        try {
            $charge = Stripe::charges()->create([
                'amount' => 1000,
                'source' => $request->input('stripeToken'),
                'currency' => 'jpy',
                'description' => 'Order',
                'receipt_email' => $request->email,
            ]);

            // SUCCESSFUL
            foreach (Cart::getContent() as $item) {
                Cart::remove($item->id);
            }
            return redirect()->route('confirmation.index')->with('success_message', '注文が完了しました');
        } catch (CardErrorException $e) {
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }
}
