<x-navbar />

<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Search Recipes</h2>
    <div class="flex gap-2 mb-4">
        <input type="text" id="searchInput" class="border p-2 w-full" placeholder="Search for a recipe...">
        <button onclick="searchRecipe()" class="bg-blue-500 text-white px-4 py-2">Search</button>
    </div>

    <div id="results" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"></div>
</div>

<script>
    function searchRecipe() {
        const query = document.getElementById('searchInput').value;

        fetch(`/recipes/search/${query}`)
            .then(res => res.json())
            .then(data => {
                const container = document.getElementById('results');
                container.innerHTML = "";

                if (data.meals) {
                    data.meals.forEach(meal => {
                        container.innerHTML += `
                            <div class="border p-4 rounded shadow">
                                <img src="${meal.strMealThumb}" alt="${meal.strMeal}" class="w-full rounded mb-2">
                                <h3 class="text-lg font-semibold">${meal.strMeal}</h3>
                                <p><strong>Category:</strong> ${meal.strCategory}</p>
                                <a href="${meal.strSource || '#'}" target="_blank" class="text-blue-600 underline mt-2 block">View Recipe</a>
                            </div>
                        `;
                    });
                } else {
                    container.innerHTML = "<p>No recipes found.</p>";
                }
            });
    }
</script>
