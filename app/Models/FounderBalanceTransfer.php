<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FounderBalanceTransfer extends Model
{
    protected $fillable = [
        'fuser_id',
        'amount',
        'status',
    ];
    public function user(){
        return $this->hasOne(Fuser::class , 'id','fuser_id');
    }
}
