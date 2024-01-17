<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBlog extends Model
{
    // use HasFactory;
    protected $table = 'user_blogs';
    protected $fillable = ['title','blog_content','status','user_id'];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
