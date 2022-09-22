<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Drink;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('home',[
            'drinks' => Drink::latest()->filter(request(['search','category']))->paginate(6)->withQueryString()
        ]);
    }

    public function store(Request $request, Drink $drink){
        $stock =$drink->stock;

        $validated=$request->validate([
            'quantity' => 'required|gte:1|lte:'.$stock
        ]);
        
        $validated['user_id'] = Auth::user()->id;
        $validated['drink_id'] = $drink->id;
        $validated['date'] = Carbon::now()->toDateTimeString();

        Cart::create($validated);
        return redirect('/')->with('alert','Item added to cart');
    }


}
