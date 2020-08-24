<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authentification extends Model
{
    protected $fillable = ['nom', 'prenom', 'phone', 'email', 'password', 'photo'];
}
