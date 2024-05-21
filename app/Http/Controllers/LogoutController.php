<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(\Illuminate\Http\Request $request):RedirectResponse{
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('index');
    }
}
