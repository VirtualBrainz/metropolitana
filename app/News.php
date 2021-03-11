<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    
    protected $dates = ['deleted_at'];
    protected $tables = 'news';
    protected $hidden = ['create_at', 'updated_at'];



    public function ngalleries()
    {
        return $this->hasMany(NGallery::class, 'news_id', 'id');
    }

}
