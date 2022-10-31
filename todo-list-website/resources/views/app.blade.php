@extends('layouts.app')
    
@section('content')
        <div class="col d-flex justify-content-center">
                <div class="card m-4" style="width:500px;">
                    <div class="container-md mt-5 mb-5 mr-3 ml-3">
                        <h1>Todos LIST</h1>
                        <hr>
                            <h2>Add new task</h2>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('users.save-task') }}" method="POST">
                                @csrf
                                <input type="text" class="form-control" id="name" name="name" placeholder="Add new task">
                                <button class="btn mt-4 btn-primary" type="submit">Store</button>
                            </form>
                        <hr>

                        <h2>Pending tasks</h2>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if ($todo_lists)
                                
                            @endif
                            @foreach($todo_lists as $todo)
                                <li class="list-group-item">
                                    {{ $todo->name }}
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false">
                                        Edit
                                    </button>

                                    <form action="{{ route('users.delete-task',['id' => $todo->id]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('POST')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>

                                    <form action="{{ route('users.done-task',['id' => $todo->id]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('POST')
                                        <button class="btn btn-success" type="submit">Done</button>
                                    </form>

                                    <form action="{{ route('users.detail-task',['id' => $todo->id]) }}" method="GET" style="display: inline-block;">
                                        @csrf
                                        @method('GET')
                                        <button class="btn btn-warning" type="submit">Detail</button>
                                    </form>

                                    <div class="collapse mt-2" id="collapse-{{ $loop->index }}">
                                        <div class="card card-body">
                                            <form action="{{ route('users.update-task',['id' => $todo->id]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" id="name" name="name" value="{{ $todo->name }}">
                                                <button class="btn btn-secondary" type="submit">Update</button>
                                            </form>

                                        </div>
                                    </div>
                                </li>

                            @endforeach
                        <hr>

                        <h2>Completed Tasks</h2>
                            @foreach ($completed as $complete )
                                <li class="list-group-item">
                                    {{ $complete->name }}
                                </li>
                            @endforeach
                        <hr>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
                </div>
            </div>
        </div>
@endsection