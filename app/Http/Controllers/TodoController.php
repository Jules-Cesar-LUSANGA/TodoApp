<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function getTodos()
    {
        return Todo::all();
    }

    public function index()
    {
        // Get all tasks
        $todos = $this->getTodos();
        return view('welcome',compact('todos'));
    }
    public function create(Request $request)
    {
        // Validate data
        $request->validate(['content' => 'required']);

        // Create a new task
        $todo = new Todo();
        $todo->content = $request->content;
        $todo->save();

        return redirect()->back();
    }

    public function update(Todo $todo)
    {
        // Get all tasks
        $todos = $this->getTodos();
        return view('welcome',compact('todo','todos'));
    }
    public function store_update(Todo $todo, Request $request)
    {
        // Validate data
        $request->validate(['content' => 'required']);
        
        // Update this task
        $todo->content = $request->content;
        $todo->save();

        return to_route('todo.index');
    }
    public function delete(Todo $todo)
    {
        // Delete this task
        $todo->delete();

        return redirect('/',302);
    }
}
