<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
