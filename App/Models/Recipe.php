<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "title",
        "description",
        "ingredients",
        "instructions",
        "category_id",
        "image",
    ];

    protected $casts = [
        "ingredients" => "array",
    ];

    // Relationship: Recipe belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship: Recipe belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship: Recipe has many likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Relationship: Recipe has many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Helper: Check if a recipe is liked by a user
    public function isLikedBy(?User $user): bool
    {
        return $user ? $this->likes()->where("user_id", $user->id)->exists() : false;
    }
}
