<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "recipe_id",
    ];

    // Each like belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Each like belongs to a recipe
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
