<?php

namespace App\Models;
use Questocat\Referral\Traits\UserReferral;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // use UserReferral;
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'city',
        'state',
        'phone',
        'referral_code',
        'website',
        'balance',
        'role_id',
    ];
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        if (is_int($role)) {
            return $this->roles->contains('id', $role);
        }

        return false;
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function userblogs()
    {
        return $this->hasMany(UserBlog::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function categorys()
    {
        return $this->hasMany(Category::class);
    }
    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    

    public function shop()
    {
        return $this->hasOne(Shop::class);
    }

    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
