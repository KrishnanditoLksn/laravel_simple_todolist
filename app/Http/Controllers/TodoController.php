<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use http\Env\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TodoController extends Controller
{
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('todo.create');
    }

    public function index(): View
    {
        // Fetch the authenticated user
        $user = Auth::user();

        // Fetch todos that belong to the authenticated user
        $todos = Todo::where('todo_user_id', $user->id)->get();

        return view('todo', ['title' => 'Welcome'])->with('todos', $todos);
    }

    public function store(\Illuminate\Http\Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        $user = Auth::id();
        $data = $request->all();
        $todo = new Todo;
        $todo->todo_name = $data['name'];
        $todo->user()->associate($user);
        $todo->save();
        return redirect('/');
//        $request->dd();
    }

    public function update($id): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        $todo = Todo::find($id);
        $todo->todo_status = 'Belum Selesai';
        $todo->save();
        return redirect('/');
    }

    public function delete($id): \Illuminate\Contracts\Foundation\Application|RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\Foundation\Application
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect('/');
    }
}
