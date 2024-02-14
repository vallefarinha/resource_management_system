<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Extra extends Model
{
  
    use HasFactory;
    protected $fillable = [
        'extra_name', 
        'extra_link', 
        'id_tag', 
        'id_resource'
    ];

    // Relación con el modelo Tag
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'id_tag');
    }

    // Relación con el modelo Resource
    public function resource()
    {
        return $this->belongsTo(Resource::class, 'id_resource');
    }

    
}
