<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalReport extends Model
{
    use HasFactory;

    public function customer()
    {
       return $this->belongsTo(Customer::class,'customer_id', 'id');
    }

    public function products()
    {
       return $this->belongsTo(Product::class,'product_id', 'id');
    }
}
