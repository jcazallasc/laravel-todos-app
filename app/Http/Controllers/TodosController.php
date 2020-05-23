<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TodoStoreUpdateRequest;


class TodosController extends Controller
{
    public function index()
    {
        return view('todos.index')->with('todos', Todo::all());
    }

    public function show(Todo $todo)
    {
        return view('todos.show')->with('todo', $todo);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoStoreUpdateRequest $request)
    {
        $data = $request->validated();

        Todo::create($data);

        Session::flash('success', 'Todo created successfully');

        return redirect()->route('todos');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(TodoStoreUpdateRequest $request, Todo $todo)
    {
        $data = $request->validated();

        $todo->fill($data)->save();

        Session::flash('success', 'Todo updated successfully');

        return redirect()->route('todos');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        Session::flash('success', 'Todo deleted successfully');

        return redirect()->route('todos');
    }  
    
    public function markAsCompleted(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();

        Session::flash('success', 'Todo completed successfully');

        return redirect()->route('todos');
    }   
}
