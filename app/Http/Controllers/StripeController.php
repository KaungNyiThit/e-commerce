<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class StripeController extends Controller
{
    public function checkout()
    {
        $cart = session('cart', []) ;

        if(!$cart){
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd', 
                    'product_data' => [
                        'name' => $item['product_name'],
                    ],
                    'unit_amount' => intval($item['price'] * 100), 
                ],
                'quantity' => $item['quantity'],
            ];
        }

         \Stripe\Stripe::setApiKey(config('stripe.sk'));

         $session =  \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('success'), 
            'cancel_url' => route('cancel'),  
        ]);

         return redirect()->away($session->url);
    }


    public function buyNow($id, Request $request)
    {


        $productId = Product::find($id);
        $quantity = $request->query('quantity');

        if ($quantity < 1) {
            return redirect()->back()->with('error', 'Invalid quantity');
        }

         \Stripe\Stripe::setApiKey(config('stripe.sk'));


         $session = \Stripe\Checkout\Session::create([

            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'USD' ,
                        'product_data' => [
                            "name" => $productId->product_name
                        ],
                        'unit_amount' => intval($productId->price * 100),
                    ],
                    'quantity' => $quantity,
                ],
            ],
        
            'mode' => 'payment',
            'metadata' => [
                'user_id' => "0001"
            ],
            'customer_email' => "kthit236@gmail.com",
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
         ]);
        
         return redirect()->away($session->url);

    }

    public function success()
    {
        return redirect('/products')->with('suces', 'Your Payment success! Your products will arrive on next 2 day.');
    }

    public function cancel()
    {
        return redirect('/products');
    }
}
