<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $table = 'shopping_carts';
    protected $fillable = [
        'quantity',
        'customer_id',
        'product_id',
        'discount',
        'totalcost',
        'receivedpayment',
    ];

    public function products()
    {
       return $this->belongsTo(Product::class,'product_id', 'id');
    }

    public function customer()
    {
       return $this->belongsTo(Customer::class,'customer_id', 'id');
    }
}
