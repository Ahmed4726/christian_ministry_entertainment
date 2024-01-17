<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['bill','status,address','fullname','phone','user_id']; 

    public function orderitem()
    {
        return $this->hasMany(OrderItem::class);
    }
}
