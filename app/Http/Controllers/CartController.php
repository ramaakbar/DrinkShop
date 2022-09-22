<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Drink;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    
    public function index()
    {

        return view('cart', [
            'carts' => Auth::user()->cart
        ]);
    }
    public function destroy(Cart $cart)
    {
        Cart::destroy($cart->id);
        return redirect('/cart')->with('alert', 'Cart item has been removed');
    }
    public function destroyAll()
    {

        Cart::where('user_id', Auth::user()->id)->delete();
        return redirect('/cart')->with('alert', 'All cart item has been removed');
    }


    public function checkout()
    {   
        return view('checkout', [
            'orders' => Auth::user()->cart
        ]);
    }

    
    public function buy()
    {
        $carts = Auth::user()->cart;
        $amount = 0;
        foreach ($carts as $cart) {
            $subtotal = 0;
            $drink = Drink::where('id', $cart->drink_id)->get();
            $subtotal = $drink[0]->price * $cart->quantity;
            $amount = $amount + $subtotal;
            $stock = $drink[0]->stock;
            $stock = $stock - $cart->quantity;
            Drink::where('id', $cart->drink_id)->update(['stock' => $stock]);

            $drink = Drink::where('id', $cart->drink_id)->get();
            if ($drink[0]->stock == 0) {
                Drink::where('id', $cart->drink_id)->delete();
            }
        }


        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'amount' => $amount,
            'date' => Carbon::now(),
            'status' => 0
        ]);
        foreach ($carts as $c) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'drink_id' => $c->drink_id,
                'quantity' => $c->quantity
            ]);
        }

        Cart::where('user_id', Auth::user()->id)->delete();
        return redirect('/transactions')->with('alert', 'Thank you for buying, ' . Auth()->user()->name . '!');
    }

}
