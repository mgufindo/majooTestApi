<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "produk";

    protected $hidden = [
        "created_at",
        "updated_at"
    ];
}
