<?php

namespace App\Models;
<<<<<<< HEAD
		
=======

>>>>>>> b84038d0e2e9234063eccb25fbd346cdde3a7e96
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Type extends Model
{
<<<<<<< HEAD
=======
    protected $fillable = [
        'type_name',
    ];

    // su clave primaria esta realcionada con la clave id_type  en tabla resources
>>>>>>> b84038d0e2e9234063eccb25fbd346cdde3a7e96
    public function resource()
    {
        return $this->hasOne(Resource::class, 'id_type');
    }
}