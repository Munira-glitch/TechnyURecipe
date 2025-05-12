<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <script src="//unpkg.com/alpinejs" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title", "TechnyURecipe")</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(["resources/css/app.css", "resources/js/app.js"])
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    
</head>

<body>
<div class="container-fluid mt-4">

        @if(session("success"))
            <div class="alert alert-success">{{ session("success") }}</div>
        @endif
        @yield("content")
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
