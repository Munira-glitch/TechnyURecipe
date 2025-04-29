<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    // Attributes that are mass-assignable
    protected $fillable = [
        'user_id',
        'recipe_id',
    ];

    // Relationship: Each like belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship: Each like is for a specific recipe
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
