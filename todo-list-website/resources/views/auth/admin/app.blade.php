@extends('layout.app')

@section('title', 'Data Hewan')

@section('header')
    <h1 class="container" style="text-align: center; margin-top: 1em; margin-bottom: 1em">Daftar Data Hewan</h1>
@endsection

@section('body')
    <div class="container">
        {{-- untuk memberikan status yang sudah dituliskan --}}
        @if (session('status'))
            <h6 class="alert alert-success alert-dismissible fade show">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </h6>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <caption>Daftar Task Dari Database</caption>
                <thead>
                    <tr>
                        <th scope="col">NOMOR</th>
                        <th scope="col">Task</th>
                        <th scope="col">User</th>
                        <th scope="col">Tombol Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todo_lists as $todos )
                        <tr>
                            <th scope="row">{{ $loop->index + 1 + ($animals->currentPage() - 1) * 5 }}</th>
                            <td>{{ $todos->name }}</td>
                            <td>{{ $todos->id_user->name }}</td>
                            <!-- <td>{{ Str::limit($animal->description, 50) }}</td> -->
                            <td>
                                <form action="{{ route('delete-task', ['id' => $todos->id]) }}" method="POST"
                                    onsubmit="return confirm('Apakah Data ini ingin dihapus?')">
                                    <div class="btn-group" role="group" aria-label="Basic mixed style example">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        {{ $todo_lists->links() }}
    </div>
@endsection

