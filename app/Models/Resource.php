<?php

namespace App\Models;
<<<<<<< HEAD

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
>>>>>>> b84038d0e2e9234063eccb25fbd346cdde3a7e96

class Resource extends Model
{
    use HasFactory;
<<<<<<< HEAD

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
        
=======
    protected $fillable = [
        'title',
        'link',
        'id_user',
        'id_type',
        'id_tag',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($resource) {
            // Eliminar todos los extras relacionados
            $resource->extra()->delete();
        });
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'id_type');
>>>>>>> b84038d0e2e9234063eccb25fbd346cdde3a7e96
    }

    public function tag()
    {
<<<<<<< HEAD
        return $this->hasOne(Tag::class, 'id_tag');  
    }

}
=======
        return $this->belongsTo(Tag::class, 'id_tag');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

   public function tag()
    {
        return $this->hasMany(Extra::class, 'id_resource');
    }

    public function countTotalExtras()
    {
        $total = 1;
        $extras = $this->extra()->get();
        $total += $this->extra()->count();
        return $total;
    }

    public function isFile()
    {
        $filePath = $this->getFilePath($this->link);
        return Storage::exists($filePath);
    }

    protected function getFilePath($link): string
    {
        $link = trim($link);
        $link = strip_tags($link);
        $link = htmlspecialchars($link, ENT_QUOTES);
        return $link;
    }

    public function getLinkAttribute($value)
    {
        if (!preg_match('/^(http|https):\/\//', $value)) {
            $value = 'http://' . $value;
        }
        $value = trim($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value, ENT_QUOTES);
        return $value;
    }
}
>>>>>>> b84038d0e2e9234063eccb25fbd346cdde3a7e96
