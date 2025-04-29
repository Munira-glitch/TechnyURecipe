<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Attributes that are mass-assignable
    protected $fillable = [
        'name',
    ];

    // Relationship: Each category can have many recipes
    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
