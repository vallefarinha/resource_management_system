<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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

    protected $dates = [
        'created_at',
        'updated_at',
    ];

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
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'id_tag');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function extra()
    {
        return $this->hasMany(Extra::class, 'id');
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
        // Sanitize input for security:
        $link = trim($link);
        $link = strip_tags($link);
        $link = htmlspecialchars($link, ENT_QUOTES);
        return $link;
    }

    public function getLinkAttribute($value)
    {
        // Validate and sanitize external links (optional):
        if (!preg_match('/^(http|https):\/\//', $value)) {
            $value = 'http://' . $value;
        }
        $value = trim($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value, ENT_QUOTES);
        return $value;
    }
}