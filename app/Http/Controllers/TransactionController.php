<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;

use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    public $snapToken;
    public $payment;
    public function index(){
        return view('transactions',[
            'transactions' => Auth::user()->transaction
        ]);
    }

    public function show(Transaction $transaction){
        $detail = TransactionDetail::where('transaction_id',$transaction->id)->get();

        return view('transactionsdetail',[
            'transaction' => $transaction,
            'detail' => $detail
        ]);
    }

    
}
