<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Extra extends Model
{
  
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
>>>>>>> b84038d0e2e9234063eccb25fbd346cdde3a7e96
    use HasFactory;
    protected $fillable = [
        'extra_name', 
        'extra_link', 
        'id_tag', 
        'id_resource'
    ];
<<<<<<< HEAD

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

    
=======
// son claves foraneas de la tablas tag y resources
    public function tag()
        {
            return $this->belongsTo(Tag::class, 'id_tag');
        }
    
    public function resource()
        {
            return $this->belongsTo(Resource::class, 'id_resource');
        }
>>>>>>> b84038d0e2e9234063eccb25fbd346cdde3a7e96
}
