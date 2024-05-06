<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['CustomerID','CompanyName','ContactName','ContactTitle','Address','City','Region','PostalCode','Country','Phone','Fax'];
    protected $primaryKey = 'CustomerID';
    protected $keyType = 'string';


    public function orders()
    {
        return $this->hasMany(Order::class, 'CustomerID');
    }
}
