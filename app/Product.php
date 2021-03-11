<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $tables = 'products';
    protected $hidden = ['create_at', 'updated_at'];

    public function getKits()
    {
        return $this->belongsToMany(Kit::class,'kit_id', 'id');
    }

    public function getFamily()
    {
        return $this->hasOne(Family::class,'family_id', 'id');
    }



}
