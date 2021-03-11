<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $tables = 'families';
    protected $hidden = ['create_at', 'updated_at'];

    public function classification()
    {
        return $this->hasOne(Classification::class, 'id', 'classification_id');
    }

    public function subclassification()
    {
        return $this->hasOne(Subclassification::class, 'id', 'subclassification_id');
    }

    public function subarea()
    {
        return $this->hasOne(Subarea::class, 'id', 'subarea_id');
    }

    public function kits()
    {
        return $this->belongsToMany(Kit::class,'kit_id', 'id');
    }



}
