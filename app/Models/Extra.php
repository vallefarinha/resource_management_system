<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    use HasFactory;
    protected $fillable = [
        'extra_name', 
        'extra_link', 
        'id_tag', 
        'id_resource'
    ];
// son claves foraneas de la tablas tag y resources
    public function tag()
        {
            return $this->belongsTo(Tag::class, 'id_tag');
        }
    
    public function resource()
        {
            return $this->belongsTo(Resource::class, 'id_resource');
        }
}
