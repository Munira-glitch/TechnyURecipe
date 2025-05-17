<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("recipes", function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->string("title");
            $table->text("description");
            $table->json("ingredients"); // Stored as array
            $table->text("instructions");
            $table->foreignId("category_id")->constrained()->onDelete("cascade");
            $table->string("image")->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("recipes");
    }
};
