<?php

namespace App\Models;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    public function tag()
=======
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Tag extends Model
{
    protected $fillable = [
        'tag_name',
    ];

    public function resource()
>>>>>>> b84038d0e2e9234063eccb25fbd346cdde3a7e96
    {
        return $this->hasOne(Resource::class, 'id_tag');
    }

    public function extra()
    {
<<<<<<< HEAD
        return $this->hasOne(Extra::class, 'id_extra'); 
    }
    
=======
        return $this->hasOne(Extra::class, 'id_tag'); 
    }
>>>>>>> b84038d0e2e9234063eccb25fbd346cdde3a7e96
}