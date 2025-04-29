<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class EmailVerificationPromptController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        return redirect()->route("home");
    }
}
