<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{ public function run(): void
    {
        $this->call([
            CategorySeeder::class,
        ]);
    }
}