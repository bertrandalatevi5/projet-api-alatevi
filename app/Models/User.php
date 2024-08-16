<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = [
        'nom', 'prenom', 'entreprise', 'email', 'ville', 'adresse', 'api_token'
    ];

    protected $hidden = [
        'api_token',
    ];

   
}
