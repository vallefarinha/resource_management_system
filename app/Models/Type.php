<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Type extends Model
{
    protected $fillable = [
        'type_name',
    ];

    // su clave primaria esta realcionada con la clave id_type  en tabla resources
    public function resource()
    {
        return $this->hasOne(Resource::class, 'id_type');
    }
}