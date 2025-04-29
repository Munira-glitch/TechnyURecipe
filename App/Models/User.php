<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Attributes that are mass-assignable (for form data)
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Hide sensitive fields from JSON responses
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Automatically cast fields
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relationship: One user can have many recipes
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    // Relationship: One user can like many recipes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Relationship: One user can comment on many recipes
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
