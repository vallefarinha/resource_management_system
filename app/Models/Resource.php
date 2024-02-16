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
    $fileExtensions = [
        'jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'tiff', 'webp', 'ico',
        'mp4', 'avi', 'wmv', 'mov', 'flv', 'mkv', 'webm', 'mpg', 'mpeg', '3gp', 'rm',
        'mp3', 'wav', 'wma', 'ogg', 'flac', 'aac', 'aiff', 'alac', 'm4a',
        'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'odt', 'ods', 'odp', 'rtf', 'csv', 'txt',
        'pdf',
        'zip', 'rar', '7z', 'tar', 'gz', 'bz2', 'xz',
        'iso', 'img', 'cue',
        'csv', 'tsv',
        'html', 'htm', 'php', 'js', 'css', 'scss', 'less', 'jsx', 'tsx', 'vue',
        'xml', 'json', 'log',
    ];

    $linkExtension = pathinfo($this->link, PATHINFO_EXTENSION);

    return in_array(strtolower($linkExtension), $fileExtensions);
}
}
