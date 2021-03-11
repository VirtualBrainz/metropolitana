<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KitProduct extends Model
{
    protected $fillable = [
        'id', 'kit_id', 'product_id', 'quantity', 'type', 'orden', 'status'
    ];
    
    public function getProducts()
    {
        return $this->hasOne(Product::class,  'id', 'product_id');
    }
    public function nombres()
    {
        return $this->hasOne(Name::class, 'product_id', 'product_id');
    }
}
