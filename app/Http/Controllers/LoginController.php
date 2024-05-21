<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Env\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('login.index', ['title' => 'Login']);
    }

    public function auth(\Illuminate\Http\Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|string'
        ]);

        $data = $request->except(['_token']);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended();
        }
        return redirect('');
    }
}
