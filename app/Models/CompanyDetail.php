<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    use HasFactory;

    protected $table = 'company_details';
    protected $fillable = [
        'company_id',
        'name',
        'details',
    ];

    public function company()
    {
       return $this->belongsTo(Company::class,'company_id', 'id');
    }
}
