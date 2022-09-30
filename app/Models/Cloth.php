<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cloth extends Model
{
    use HasFactory,SoftDeletes;

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
