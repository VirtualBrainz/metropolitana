<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyKit extends Model
{
    protected $fillable = [
        'id', 'family_id', 'kit_id'
    ];
    protected $tables = 'family_kits';
}
