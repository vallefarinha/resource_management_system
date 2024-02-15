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

    public function user()
    {
        return $this->hasOne(User::class, 'id_user');  
    }
}
