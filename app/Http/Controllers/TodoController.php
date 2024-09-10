<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\TodoRequest;

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
    public function store(TodoRequest $request)
    {
        // Create a new task
        $todo = new Todo();
        $todo->content = $request->content;
        $todo->save();

        return redirect()->back();
    }

    public function edit(Todo $todo)
    {
        // Get all tasks
        $todos = $this->getTodos();
        return view('welcome',compact('todo','todos'));
    }
    public function update(Todo $todo, TodoRequest $request)
    {
        // Update this task
        $todo->content = $request->content;
        $todo->save();

        return to_route('todos.index');
    }
    public function destroy(Todo $todo)
    {
        // Delete this task
        $todo->delete();

        return redirect('/',302);
    }
}
