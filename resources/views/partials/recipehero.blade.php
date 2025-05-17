<div class="bg-gray-50 min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Dashboard</h1>

        <!-- Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white shadow-md rounded-2xl p-6">
                <h2 class="text-lg font-semibold text-gray-700">Total Recipes</h2>
                <p class="text-2xl font-bold text-indigo-600 mt-2">{{ $totalRecipes }}</p>
            </div>
            <div class="bg-white shadow-md rounded-2xl p-6">
                <h2 class="text-lg font-semibold text-gray-700">Total Likes</h2>
                <p class="text-2xl font-bold text-pink-600 mt-2">{{ $totalLikes }}</p>
            </div>
            <div class="bg-white shadow-md rounded-2xl p-6">
                <h2 class="text-lg font-semibold text-gray-700">Total Comments</h2>
                <p class="text-2xl font-bold text-green-600 mt-2">{{ $totalComments }}</p>
            </div>
            <div class="bg-white shadow-md rounded-2xl p-6">
                <h2 class="text-lg font-semibold text-gray-700">Your Followers</h2>
                <p class="text-2xl font-bold text-yellow-500 mt-2">Coming Soon</p>
            </div>
        </div>

        <!-- Recent Recipes -->
        <div class="bg-white shadow-md rounded-2xl p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Your Recent Recipes</h2>
            @forelse($recentRecipes as $recipe)
                <div class="flex items-center justify-between border-b border-gray-200 py-3">
                    <div>
                        <h3 class="text-md font-medium text-gray-700">{{ $recipe->title }}</h3>
                        <p class="text-sm text-gray-500">{{ \Illuminate\Support\Str::limit($recipe->description, 60) }}</p>
                    </div>
                    <a href="{{ route('recipes.show', $recipe) }}" class="text-indigo-500 hover:underline">View</a>
                </div>
            @empty
                <p class="text-gray-500">You haven't added any recipes yet.</p>
            @endforelse
        </div>
    </div>
</div>
