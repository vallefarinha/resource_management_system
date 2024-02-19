<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
<<<<<<< HEAD
=======
        'password',
>>>>>>> b84038d0e2e9234063eccb25fbd346cdde3a7e96
        'login',
        'privilege',
        'github',
        'linkedin',
<<<<<<< HEAD
=======
        'remember_token',
>>>>>>> b84038d0e2e9234063eccb25fbd346cdde3a7e96
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function resource()
    {
        return $this->hasMany(Resource::class, 'id_user');
    }

}