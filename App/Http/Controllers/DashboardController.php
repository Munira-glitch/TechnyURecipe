<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Get recipes that belong to the currently logged-in user
        $recipes = Recipe::where("user_id", Auth::id())->latest()->get();

        // Pass to view
        return view("dashboard", compact("recipes"));
    }
}
