<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Player extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'ageRangeId', 'status'];
    protected $hidden = ['password'];
}
