<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use http\Env\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TodoController extends Controller
{
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('todo.create');
    }

    public function index(): View
    {
        //fetch all data
        $todo = Todo::all();
        return view('todo', ['title' => 'Welcome'])->with('todos', $todo);
    }

    public function store(\Illuminate\Http\Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|RedirectResponse|\Illuminate\Routing\Redirector
    {
        $data = $request->all();
        $todo = new Todo;
        $todo->todo_name = $data['name'];
        $todo->save();
        return redirect('/');
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
