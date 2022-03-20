<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    protected $table = "user";

    protected $hidden = [
        "created_at",
        "updated_at",
        "password"
    ];
}
