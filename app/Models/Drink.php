<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query,array $filters){
        
        $query->when($filters['search'] ?? false,function($query,$search){
            return $query->where('name','like','%'.$search.'%');
        });

        // $query->when($filters['category'] ?? false, function($query,$category){
        //     return $query->whereHas('category',function($query) use ($category){
        //         $query->where('category',$category);
        //     });
        // });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    


    public function transactiondetail(){
        return $this->hasMany(TransactionDetail::class);
    }
}
