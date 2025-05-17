<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "recipe_id",
        "comment", // keep this only if your DB uses this column name
    ];

    // Each comment belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Each comment belongs to a recipe
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
