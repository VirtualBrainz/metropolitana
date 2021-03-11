<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kit extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $tables = 'kits';
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

    public function family()
    {
        return $this->hasOne(Family::class,'id', 'family_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'family_id', 'id');
    }

}
