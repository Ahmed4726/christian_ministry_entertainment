<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    // use HasFactory;
    protected $table = 'groups';
    protected $fillable = ['group_title','group_image','description'];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function getImageUrlAttribute()
    {
        // Assuming you have an 'image' column in your table
        return asset('storage/images/' . $this->group_image); // Assuming the images are stored in the storage/app/public directory
    }
}
