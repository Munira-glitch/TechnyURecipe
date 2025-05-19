<div class="container text-center my-5">
    <h2 class="mb-4" style="font-family: 'Poppins', sans-serif; font-size: 2.5rem; font-weight: 700;">Explore by Category</h2>
    <p class="mt-4 text-lg text-gray-600">
            Whether you're in the mood for breakfast, a quick snack, or a decadent dessert — we've got you covered.
        </p>
        <br>

    <div class="d-flex justify-content-center flex-wrap gap-3">
        @php
            $categories = [
                ['name' => 'Breakfast', 'image' => 'https://images.unsplash.com/photo-1525351484163-7529414344d8?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8YnJlYWtmYXN0fGVufDB8fDB8fHww'],
                ['name' => 'Lunch', 'image' => 'https://images.unsplash.com/photo-1546793665-c74683f339c1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8bHVuY2h8ZW58MHx8MHx8fDA%3D'],
                ['name' => 'Dinner', 'image' => 'https://images.unsplash.com/photo-1603073163308-9654c3fb70b5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGRpbm5lcnxlbnwwfHwwfHx8MA%3D%3D'],
                ['name' => 'Snacks', 'image' => 'https://images.unsplash.com/photo-1517093602195-b40af9688b46?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c25hY2tzfGVufDB8fDB8fHww'],
                ['name' => 'Desserts', 'image' => 'https://images.unsplash.com/photo-1563805042-7684c019e1cb'],
                ['name' => 'Appetizers', 'image' => 'https://media.istockphoto.com/id/613115478/photo/foie-gras-and-cranberry-chutney.webp?a=1&b=1&s=612x612&w=0&k=20&c=E6LDI4xXveZSL8UKClAJnY-CiBrZPy2b9AQabxFhz-o='],
                ['name' => 'Beverages', 'image' => 'https://plus.unsplash.com/premium_photo-1721227932255-175db3ae7f88?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8YmV2ZXJhZ2VzfGVufDB8fDB8fHww'],
            ];
        @endphp

        @foreach ($categories as $category)
            <a href="{{ route('categories.show', ['category' => strtolower($category['name'])]) }}" class="text-decoration-none text-center">
                <div class="category-circle">
                    <img src="{{ $category['image'] }}" alt="{{ $category['name'] }}">
                </div>
                <h5 class="mt-2 fw-bold">{{ $category['name'] }}</h5>
            </a>
        @endforeach
    </div>
</div>

<style>
     @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');
    .category-circle {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .category-circle img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .category-circle:hover {
        transform: scale(1.1);
    }
</style>
