<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use HasFactory;
    protected $fillable = ['title','price','sold_by','SKU','image_name','category_id','user_id'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
