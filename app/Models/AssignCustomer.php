<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignCustomer extends Model
{
    use HasFactory;

    protected $table = 'assign_customers';
    protected $fillable = [
        'customer_id',
        'manager_id',
    ];

    public function customer()
    {
       return $this->belongsTo(Customer::class,'customer_id', 'id');
    }

    public function manager()
    {
       return $this->belongsTo(Manager::class,'manager_id', 'id');
    }
}
