<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'link',
        'id_user',
        'id_type',
        'id_tag',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;

    // tiene campos que son foraneas relacionados con claves primarias de tabla tag, extra y user
    public function type()
    {
        return $this->belongsTo(Type::class, 'id_type');
    }

   public function tag()
    {
        return $this->belongsTo(Tag::class, 'id_tag');  
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');  
        
    }
// el PK de nuestra tabla es FK de extra
    public function extra()
    {
        return $this->hasMany(Extra::class, 'id_extra'); 

    }
<<<<<<< HEAD

    public function tag()
    {
        return $this->hasOne(Tag::class, 'id_tag');
    }
}
=======
}
>>>>>>> 18ddcd93a6622ae35a19fffa754f5cb694871734
