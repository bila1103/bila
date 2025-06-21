{{-- navbar --}}
@extends('layouts.layout')

{{-- isi konten --}}
@section('todolist')
    <div class="container mt-4">
        <!-- Search Bar -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Type here" aria-label="Task input">
                    <a href="{{ route('todolist.create')  }}"><button class="btn btn-success" type="button">Add</button></a>
                </div>
            </div>
        </div>

        <!-- Task List -->
        @foreach ($tasks as $task)
            <div class="mt-4">



                <div class="container">
                    <div class="row">

                        <!-- Task -->
                        <div class="alert alert-light d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">{{ $task->task }}</h5>
                                <p class="mb-1">{{ $task->tanggal }}</p>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-secondary" title="Detail">View</button>
                                <a href="{{ route('todolist.edit', $task->id) }}" class="btn btn-sm btn-warning"
                                    title="Edit">Edit</a>
                                <form action="{{ route('todolist.delete', $task->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-success" title="Done" onclick="return confirm('yakin selesai?')">Done</button>
                                </form>
                            </div>
                        </div>

                        <!-- Task 2 -->
                        <!-- <div class="alert alert-light d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="mb-0"></h5>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-secondary" title="Detail">View</button>
                                        <button class="btn btn-sm btn-warning">Edit</button>
                                        <button class="btn btn-sm btn-success">Done</button>
                                    </div>
                                </div> -->
                    </div>
                </div>

            </div>
        @endforeach
    </div>


@endsection