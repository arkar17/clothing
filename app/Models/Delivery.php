<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->hasOne(Order::class,'id','order_id');
    }

    public function deliplace()
    {
        return $this->hasOne(DeliPlace::class,'id','deliplace_id');
    }

}
