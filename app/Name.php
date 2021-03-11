<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    public function products()
    {
        return $this->hasOne(Name::class, 'product_id', 'product_id');
    }
}
