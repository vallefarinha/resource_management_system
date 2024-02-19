<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class Tag extends Model
{
    protected $fillable = [
        'tag_name',
    ];

    public function resource()
    {
        return $this->hasOne(Resource::class, 'id_tag');
    }

    public function extra()
    {
        return $this->hasOne(Extra::class, 'id_tag'); 
    }
}