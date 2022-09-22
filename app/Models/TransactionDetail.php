<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'transactiondetails';

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public function drink(){
        return $this->belongsTo(Drink::class);
    }
}
