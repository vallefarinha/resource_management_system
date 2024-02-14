<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    public function tags()
    {
        return $this->hasOne(Resource::class, 'id_tag');
    }

    public function extra()
    {
        return $this->hasMany(Extra::class, 'id_extra');  // muchas o no?
    }
    
}