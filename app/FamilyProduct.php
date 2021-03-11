<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyProduct extends Model
{
    protected $fillable = [
        'id', 'family_id', 'product_id', 'type', 'orden'
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
