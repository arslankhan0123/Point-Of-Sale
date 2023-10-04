<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    protected $table = 'managers';
    protected $fillable = [
        'name',
        'phone',
        'address',
    ];

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'assign_customers');
    }
}
