<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subclassification;

class Subarea extends Model
{


    public function classification()
    {
        return $this->hasOne(Classification::class, 'id', 'classification_id');
    }

    public function subclassification()
    {
        return $this->hasOne(Subclassification::class, 'id', 'subclassification_id');
    }


}
