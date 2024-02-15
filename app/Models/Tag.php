<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    public function tag()
    {
        return $this->hasOne(Resource::class, 'id_tag');
    }

    public function extra()
    {
        return $this->hasOne(Extra::class, 'id_extra'); 
    }
    
}