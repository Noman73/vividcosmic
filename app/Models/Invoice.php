<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function fuser()
    {
        return $this->belongsTo(Fuser::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
