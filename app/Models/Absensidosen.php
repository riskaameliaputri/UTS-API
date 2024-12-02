<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dosen extends Authenticatable
{
    use HasFactory;

    protected $table = 'dosen';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'nip',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
