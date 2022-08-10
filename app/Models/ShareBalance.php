<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShareBalance extends Model
{
    protected $fillable = [
        'fuser_id',
        'invest_amount',
        'share',
        'profit_amount',
        'status',
    ];

    public function user(){
        return $this->hasOne(Fuser::class , 'id','fuser_id');
    }
}


