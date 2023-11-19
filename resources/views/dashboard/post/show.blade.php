@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <article>
                    <h2>{{ $post->tittle }}</h2>

                    <a href="/dashboard/post" class="btn btn-success"> <i class="bi bi-arrow-left"></i> back to my post</a>
                    <a href="/dashboard/post/{{ $post->slug }}/edit" class="btn btn-warning"> <i
                            class="bi bi-pencil-square"></i> edit</a>
                    <form action="/dashboard/post/{{ $post->slug }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger"onclick="return confirm('yakin')"><i class="bi bi-x-circle-fill"></i>
                            Hapus</button>
                    </form>
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mt-3"
                        alt="{{ $post->category->name }}">

                    <article class="my-3 fs-5">
                        {!! $post->body !!}
                    </article>
                </article>

            </div>
        </div>
    </div>
@endsection
