<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleRecord extends Model
{
    use HasFactory;

    protected $table = 'sale_records';
    protected $fillable = [
        'quantity',
        'customer_id',
        'product_id',
    ];


    public function customer()
    {
       return $this->belongsTo(Customer::class,'customer_id', 'id');
    }

    public function products()
    {
       return $this->belongsTo(Product::class,'product_id', 'id');
    }
}
