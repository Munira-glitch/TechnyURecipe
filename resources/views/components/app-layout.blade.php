<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    
</head>

<body class="bg-gray-100 min-h-screen">
    <nav class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between">
            <a href="{{ route('dashboard') }}" class="text-xl font-semibold">Dashboard</a>
        </div>
    </nav>



    <main class="p-6">
        {{ $slot }}
    </main>

</body>

</html>
