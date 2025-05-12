<div class="p-4 p-md-5 mb-4 rounded text-white bg-dark" style="background-image: url('{{ asset('images/recipe-banner.jpg') }}'); background-size: cover; background-position: center; min-height: 300px;">
    <div class="col-lg-6 px-0 bg-dark bg-opacity-75 p-4 rounded">
        <h1 class="display-4 fst-italic">Welcome to Your Recipe Dashboard</h1>
        <p class="lead my-3">Create, edit, and manage your favorite dishes in one place. Track likes, comments, and share your culinary creativity with the world.</p>
        <p class="lead mb-0">
            <a href="{{ route('recipes.create') }}" class="text-warning fw-bold">Start a new recipe →</a>
        </p>
    </div>
</div>
