<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Subarea;
use App\Classification;

class Subclassification extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $tables = 'subclassifications';
    protected $hidden = ['create_at', 'updated_at'];

    public function classification()
    {
        return $this->hasOne(Classification::class, 'id', 'classification_id');
    }

    public function Subareas()
    {
        return $this->hasMany(Subarea::class, 'subclassification_id', 'id');
    }

    public function getkits()
    {
        return $this->hasMany(Kit::class, 'subclassification_id', 'id');
    }

}
