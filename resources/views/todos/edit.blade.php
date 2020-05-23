@extends('layouts.app')

@section('title')
Edit Todos
@endsection

@section('content')

<h1 class="text-center my-5">Edit Todos</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Edit todo</div>
            <div class="card-body">
                @if($errors->any())
                    <div class="div alert alert-danger">
                        <ul class="li list-group">
                            @foreach($errors->all() as $error)
                        <li class="list-group-item">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/todos/{{ $todo->id }}/update-todos" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $todo->name }}"/>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description" placeholder="Description" cols="5" rows="5">{{ $todo->description }}</textarea>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="completed" {{ $todo->completed ? 'checked':'' }} id="completed">
                        <label class="form-check-label" for="completed">
                            Completed
                        </label>
                        </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Update Todo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection