<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Support\Facades\Session;
use App\Repositories\Eloquent\TodoRepository;
use App\Http\Requests\Todo\TodoStoreRequest;
use App\Http\Requests\Todo\TodoUpdateRequest;

class TodosController extends Controller
{
    private $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function index()
    {
        return view('todos.index')->with('todos', Todo::all());
    }

    public function show($todoId)
    {
        return view('todos.show')->with('todo', $this->todoRepository->find($todoId));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoStoreRequest $request)
    {
        $data = $request->validated();

        Todo::create($data);

        Session::flash('success', 'Todo created successfully');

        return redirect()->route('todos');
    }

    public function edit($todoId)
    {
        return view('todos.edit')->with('todo', $this->todoRepository->find($todoId));
    }

    public function update(TodoUpdateRequest $request, $todoId)
    {
        $data = $request->validated();

        $todo = $this->todoRepository->find($todoId);
        $todo->fill($data)->save();

        Session::flash('success', 'Todo updated successfully');

        return redirect()->route('todos');
    }

    public function destroy($todoId)
    {
        $this->todoRepository->find($todoId)->delete();

        Session::flash('success', 'Todo deleted successfully');

        return redirect()->route('todos');
    }  
    
    public function markAsCompleted($todoId)
    {
        $todo = $this->todoRepository->find($todoId);
        $todo->completed = true;
        $todo->save();

        Session::flash('success', 'Todo completed successfully');

        return redirect()->route('todos');
    }   
}
