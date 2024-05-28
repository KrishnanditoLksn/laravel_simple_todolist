<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LogoutController extends Controller
{
    public function logout(\Illuminate\Http\Request $request):View{
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('login.index' , ['title'=>'Login']);
    }
}
