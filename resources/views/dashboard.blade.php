@extends("layouts.app")

@section("title", "Welcome to Recipe Sharing Platform")

<x-app-layout>

<!-- Beautiful Navbar -->
<nav class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white p-5 shadow-lg sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('dashboard') }}" class="text-3xl font-extrabold tracking-tight">Dashboard</a>

        <div class="space-x-6 text-lg">
            <a href="{{ route('recipes.index') }}" class="hover:underline hover:text-gray-200">Recipes</a>
            <a href="{{ route('categories.index') }}" class="hover:underline hover:text-gray-200">Categories</a>
            <a href="{{ route('profile.edit') }}" class="hover:underline hover:text-gray-200">Profile</a>

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="hover:underline hover:text-gray-200">Logout</button>
            </form>
        </div>
    </div>
</nav>

<!-- Main Layout -->
<div class="flex min-h-screen bg-gradient-to-br from-gray-100 to-gray-300 dark:from-gray-800 dark:to-gray-900">

    <!-- Sidebar -->
    <aside class="w-72 bg-white dark:bg-gray-800 p-6 hidden md:block shadow-xl">
        <h2 class="text-2xl font-bold text-indigo-700 mb-6">Account Settings</h2>
        <ul class="space-y-4 text-lg">
            <li><a href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-indigo-500">Update Profile</a></li>
            <li><a href="{{ route('password.update') }}" class="text-gray-700 hover:text-indigo-500">Update Password</a></li>
            <li><a href="#" onclick="openModal()" class="text-red-600 hover:underline">Delete Account</a></li>
        </ul>
    </aside>

    <!-- Main Dashboard -->
    <main class="flex-1 p-10">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-10">
            <h2 class="text-4xl font-extrabold text-indigo-600 mb-4">Welcome to Your Dashboard</h2>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-8">Manage your recipes, categories, and profile from one place.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card Component -->
                <div class="bg-gradient-to-r from-indigo-200 to-indigo-400 text-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                    <h3 class="text-2xl font-bold">Your Recipes</h3>
                    <p class="mt-2">View and update your recipe collections.</p>
                    <a href="{{ route('recipes.index') }}" class="mt-4 inline-block bg-white text-indigo-700 px-4 py-2 rounded hover:bg-indigo-100 font-semibold">View Recipes</a>
                </div>

                <div class="bg-gradient-to-r from-green-200 to-green-400 text-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                    <h3 class="text-2xl font-bold">Categories</h3>
                    <p class="mt-2">Sort your recipes into helpful categories.</p>
                    <a href="{{ route('categories.index') }}" class="mt-4 inline-block bg-white text-green-700 px-4 py-2 rounded hover:bg-green-100 font-semibold">View Categories</a>
                </div>

                <div class="bg-gradient-to-r from-purple-200 to-purple-400 text-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                    <h3 class="text-2xl font-bold">Your Profile</h3>
                    <p class="mt-2">Keep your profile up to date.</p>
                    <a href="{{ route('profile.edit') }}" class="mt-4 inline-block bg-white text-purple-700 px-4 py-2 rounded hover:bg-purple-100 font-semibold">Edit Profile</a>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Delete Modal -->
<div id="deleteAccountModal" class="fixed inset-0 bg-black bg-opacity-60 hidden items-center justify-center z-50">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md">
        <h2 class="text-2xl font-bold text-red-600 mb-4">Confirm Account Deletion</h2>
        <p class="text-gray-700 mb-4">Are you sure you want to delete your account? This action cannot be undone.</p>

        <form method="POST" action="{{ route('profile.destroy') }}">
            @csrf
            @method('DELETE')

            <div class="mb-4">
                <label for="password" class="block font-semibold">Enter Password</label>
                <input type="password" name="password" id="password" required class="mt-2 w-full p-3 border border-gray-300 rounded-lg">
            </div>

            <div class="flex justify-between">
                <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Script -->
<script>
    function openModal() {
        document.getElementById('deleteAccountModal').classList.remove('hidden');
        document.getElementById('deleteAccountModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('deleteAccountModal').classList.remove('flex');
        document.getElementById('deleteAccountModal').classList.add('hidden');
    }
</script>

</x-app-layout>
