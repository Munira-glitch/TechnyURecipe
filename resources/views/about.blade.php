@extends("layouts.app")

@section("title", "About Us")

@section("content")
<x-navbar />
<section class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900">About TechnyURecipe</h2>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                Connecting food lovers around the world through recipes, flavors, and culture.
            </p>
        </div>

    
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div>
                <img src="https://plus.unsplash.com/premium_photo-1683707120444-7318975c7ba6?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                     alt="Team cooking together"
                     class="rounded-2xl shadow-lg w-full h-auto object-cover">
            </div>
            <div>
                <h3 class="text-2xl font-semibold text-gray-800">Our Mission</h3>
                <p class="mt-4 text-gray-700">
                    TechnyURecipe was founded with a simple goal: to make cooking more accessible, exciting, and social.
                    We empower users to explore, create, and share their favorite recipes with a vibrant global community.
                </p>

                <p class="mt-4 text-gray-700">
                    Whether you're a seasoned chef or just starting out, our platform is here to help you discover new
                    tastes, learn from others, and keep your passion for food alive.
                </p>
            </div>
        </div>

    
        <div class="mt-16 text-center">
            <a href="{{ route('recipes.index') }}" class="inline-block px-6 py-3 bg-primary text-white font-semibold rounded-xl shadow hover:bg-primary/90 transition">
                Start Exploring Recipes
            </a>
        </div>

       
    </div>
   
</section>
<x-footer />
@endsection
