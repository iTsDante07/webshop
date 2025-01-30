<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    // Define the relationship to the Cart model
    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
    public function products()
        {
            return $this->hasMany(Product::class);
        }
        // In User.php model
    public function isAdmin()
        {
            return $this->is_admin; // Zorg dat 'is_admin' een boolean veld is
        }
        // In User.php
    public function sales()
        {
            return $this->hasMany(Sale::class, 'seller_id'); // Replace 'seller_id' if it’s different in your database
        }




}
