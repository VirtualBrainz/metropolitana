<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{

    public function filmographies()
    {
        return $this->hasMany(Filmography::class, 'year_id', 'id');
    }

}
