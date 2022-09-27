<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function clothes()
    {
        return $this->hasMany(Cloth::class,'order_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class,'delivery_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
