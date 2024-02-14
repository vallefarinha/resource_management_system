<?php

namespace App\Models;
		
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Type extends Model
{
    public function resource()
    {
        return $this->hasOne(Resource::class, 'id_type');
    }
}