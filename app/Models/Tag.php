<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Tag extends Model
{
    protected $fillable = [
        'tag_name',
    ];

// su clave primaria esta realcionada con la clave id tag  en tabla resources y extra
    public function resource()
    {
        return $this->hasOne(Resource::class, 'id_tag');
    }

    public function extra()
    {
        return $this->hasOne(Extra::class, 'id_tag'); 
    }
}