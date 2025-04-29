<main>
  <div id="myCarousel" class="carousel slide mb-6 pointer-event" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" aria-label="Slide 1" class="active" aria-current="true"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">

      <div class="carousel-item active">
        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836" class="d-block w-100 carousel-img" alt="Explore New Recipes">
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Explore a World of Flavors.</h1>
            <p>Discover new and exciting recipes from chefs and home cooks around the world.</p>
            <p><a class="btn btn-lg btn-primary" href="{{ route('recipes.index') }}">Explore Recipes</a></p>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <img src="https://images.pexels.com/photos/7964688/pexels-photo-7964688.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100 carousel-img" alt="Share Your Creations">
        <div class="container">
          <div class="carousel-caption">
            <h1>Share Your Culinary Creations.</h1>
            <p>Upload your favorite recipes and inspire a community of food lovers.</p>
            <p><a class="btn btn-lg btn-primary" href="{{ route('recipes.create') }}">Share a Recipe</a></p>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4" class="d-block w-100 carousel-img" alt="Connect with Food Lovers">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Join the Food Lover's Community.</h1>
            <p>Connect with other food enthusiasts—comment, like, and share your favorites!</p>
            <p><a class="btn btn-lg btn-primary" href="{{ route('dashboard') }}">Join the Community</a></p>
          </div>
        </div>
      </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <style>
    .carousel-img {
      height: 300px;
      object-fit: cover;
    }

    .carousel-caption h1 {
      font-size: 2.5rem;
      font-weight: bold;
      text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.8);
    }

    .carousel-caption p {
      font-size: 1.2rem;
      font-weight: 500;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
    }

    .carousel-caption a.btn {
      font-size: 1.1rem;
      font-weight: bold;
      padding: 12px 24px;
    }

    @media (max-width: 768px) {
      .carousel-img {
        height: 250px;
      }

      .carousel-caption h1 {
        font-size: 2rem;
      }

      .carousel-caption p {
        font-size: 1rem;
      }
    }

    @media (max-width: 480px) {
      .carousel-img {
        height: 200px;
      }

      .carousel-caption h1 {
        font-size: 1.8rem;
      }

      .carousel-caption p {
        font-size: 0.9rem;
      }
    }
  </style>
</main>
