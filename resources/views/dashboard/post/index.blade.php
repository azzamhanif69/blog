@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My post, {{ auth()->user()->name }}</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="table-responsive small col-lg-8">
        <a href="/dashboard/post/create" class="btn btn-primary mb-3">Tambah data</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tittle</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }} </td>
                        <td>{{ $post->tittle }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td><a href="/dashboard/post/{{ $post->slug }}" class="btn btn-info"><i
                                    class="bi bi-eye-fill"></i></a>
                            <a href="/dashboard/post/{{ $post->slug }}/edit" class="btn btn-warning"><i
                                    class="bi bi-pencil-square"></i></a>

                            <form action="/dashboard/post/{{ $post->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0"onclick="return confirm('yakin')"><i
                                        class="bi bi-x-circle-fill"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
