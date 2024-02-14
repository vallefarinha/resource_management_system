<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'link', 
        'id_user', 
        'id_type', 
        'id_tag'
    ];

    public function type()
    {
        return $this->hasOne(Type::class, 'id_type');
    }

    public function extra()
    {
        return $this->hasMany(Extra::class, 'id_extra');  // muchas o no?
        
    }

    public function tag()
    {
        return $this->hasOne(Tag::class, 'id_tag');  
    }

}
