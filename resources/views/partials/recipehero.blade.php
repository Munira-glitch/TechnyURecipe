<div class="relative bg-white rounded-lg shadow-lg overflow-hidden mb-10">
 
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1706262220689-db429fbec365?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Cooking background" class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-to-r from-white/90 to-white/70"></div> <!-- Subtle overlay -->
    </div>

    <div class="relative z-10 p-10">
        <h1 class="text-4xl font-extrabold text-blue-800 mb-3">Welcome back, {{ Auth::user()->name }}!</h1>
        <p class="text-lg text-blue-900 max-w-xl">
            Ready to cook up something amazing? Manage your recipes, explore new ideas, and share your culinary creations with the world.
        </p>
        <a href="{{ route('recipes.create') }}" 
           class="inline-block mt-6 bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg shadow hover:bg-blue-700 transition">
           Add New Recipe
        </a>
    </div>
</div>
