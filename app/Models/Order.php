<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['OrderID','CustomerID','EmployeeID','OrderDate','RequireDate','ShippedDate','ShipVia','Freight','ShipName','ShipAddress','ShipCity','ShipRegion','ShipPostalCode','ShipCountry'];
    protected $primaryKey = 'OrderID';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustomerID');
    }

    public function details()
    {
        //return $this->hasMany(Orderdetail::class);
        return $this->hasMany(OrderDetail::class, 'OrderID');
    }

}
