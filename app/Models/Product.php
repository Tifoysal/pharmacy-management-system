<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'purchase_id','price',
        'discount','description',
    ];

    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }

    public function searchPurchase(){
        return $this->belongsTo(Purchase::class,'product_id','id')->where('product','LIKE','%'.request()->search['value'].'%');
    }
}
