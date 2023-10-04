<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnProduct extends Model
{
    use HasFactory;

    protected $table = 'return_products';
    protected $fillable = [
        'quantity',
        'product_id',
    ];

    public function product()
    {
       return $this->belongsTo(Product::class,'product_id', 'id');
    }
}
