<section class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8 flex flex-col-reverse lg:flex-row items-center">
       
        <div class="lg:w-1/2 text-center lg:text-left">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl leading-tight">
                Discover Delicious Recipes Every Day
            </h1>
            <p class="mt-4 text-lg text-gray-600">
                Explore a world of homemade meals, international dishes, and mouthwatering desserts crafted by our community.
            </p>
            <div class="mt-6 flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                <a href="{{ route('recipes.index') }}" class="inline-block px-6 py-3 bg-primary text-white font-semibold rounded-xl shadow hover:bg-primary/90 transition">
                    Browse Recipes
                </a>
                <a href="{{ route('register') }}" class="inline-block px-6 py-3 border border-primary text-primary font-semibold rounded-xl hover:bg-primary hover:text-white transition">
                    Join Our Community
                </a>
            </div>
        </div>

        <div class="lg:w-1/2 mb-8 lg:mb-0 relative h-[400px] sm:h-[480px] md:h-[520px]">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 lg:left-0 lg:-translate-x-0 lg:-translate-y-1/2 flex gap-4">
                <img src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=800&q=80"
                     alt="Healthy Bowl"
                     class="rounded-2xl w-32 h-48 sm:w-40 sm:h-60 object-cover shadow-2xl hidden sm:block">
                
                <img src="https://images.unsplash.com/photo-1551218808-94e220e084d2?auto=format&fit=crop&w=800&q=80"
                     alt="Pasta Dish"
                     class="rounded-2xl w-40 h-64 sm:w-48 sm:h-72 object-cover shadow-2xl z-10">
                
                <img src="https://plus.unsplash.com/premium_photo-1683707120873-ffd925615871?q=80&w=1374&auto=format&fit=crop"
                     alt="Dessert"
                     class="rounded-2xl w-32 h-48 sm:w-40 sm:h-60 object-cover shadow-2xl hidden sm:block">
            </div>
        </div>
    </div>
</section>
