<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegistrasiController extends Controller
{
    public function registrasi(): View
    {
        return view('registrasi.regis', ['title' => 'Registrasi']);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();
        $user = new User;
        $user->name = $data['name'];
        $user->password = Hash::make($data['password']);
        $user->save();
        return redirect('/login');
    }
}
