<div class="container">
    <header class="border-bottom lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">

            <div class="col-4 pt-1">
                <button id="sidebarToggle" class="btn btn-outline-secondary">☰ Menu</button>
            </div>

            <div class="col-4 text-center">
                <a class="blog-header-logo  text-decoration-none" href="{{ route('welcome') }}">
                    TechnyURecipe
                </a>
            </div>

            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="link-secondary hover-effect" href="#" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24">
                        <title>Search</title>
                        <circle cx="10.5" cy="10.5" r="7.5"></circle>
                        <path d="M21 21l-5.2-5.2"></path>
                    </svg>
                </a>

                @guest
                <div class="dropdown">
                    <button class="btn btn-outline-secondary sign-up-hover dropdown-toggle" type="button" id="joinUsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Join Us
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="joinUsDropdown">
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                    </ul>
                </div>
                @endguest

                @auth
                <a href="{{ route('dashboard') }}" class="btn btn-info mx-2">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger mx-2">Logout</button>
                </form>
                @endauth
            </div>
        </div>
    </header>

    <div id="sidebar" class="sidebar">
        <button id="closeSidebar" class="close-btn">&times;</button>
        <a href="{{ route('welcome') }}">About</a>
        <a href="{{ route('categories.index') }}">Categories</a>
        <a href="#">Contact</a>
    </div>
    

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap');
        @font-face {
    font-family: 'Andine';
    src: url('./fonts/Andine.otf') format('truetype');
    font-weight: bold;
}



.blog-header-logo {
    font-family: 'Andine', serif;
    font-size: 3rem;
    font-weight: bold;
    color: #D98324;
}


        .hover-effect {
            transition: color 0.3s ease-in-out;
        }

        .hover-effect:hover {
            color: #007bff !important;
        }

        .sign-up-hover {
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .sign-up-hover:hover {
            background-color: #007bff !important;
            color: #fff !important;
            border-color: #007bff !important;
        }
        .sidebar {
         height: 100vh; 
        width: 150px;  
        position: fixed;
        top: 0;
        left: 0;
        background-color: #343a40;
        /* overflow-x: hidden; */
        transition: width 0.3s ease-in-out;
        padding-top: 60px;
        z-index: 1060;
}

.sidebar a {
    padding: 10px 15px;
    text-decoration: none;
    font-size: 18px;
    color: white;
    display: block;
    transition: 0.3s;
}

.sidebar a:hover {
    color: #007bff;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 30px;
    color: white;
    background: none;
    border: none;
    cursor: pointer;
}

    </style>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <script>
        const sidebar = document.getElementById("sidebar");
        const openBtn = document.getElementById("sidebarToggle");
        const closeBtn = document.getElementById("closeSidebar");

        openBtn.addEventListener("click", () => {
            sidebar.style.width = "150px";
        });

        closeBtn.addEventListener("click", () => {
            sidebar.style.width = "0";
        });

    </script>
</div>
