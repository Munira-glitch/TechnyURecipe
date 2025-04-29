<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'ingredients',
        'instructions',
        'category_id',
        'image',
    ];

    protected $casts = [
        'ingredients' => 'array', 
    ];

    // Relationship: Each recipe belongs to one user (author)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship: Each recipe may belong to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship: A recipe can have many likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Relationship: A recipe can have many comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Check if a user has liked a recipe
    public function isLikedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }
}
