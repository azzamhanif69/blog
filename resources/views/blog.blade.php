@extends('layouts.main')

@section('container')
    <h1 class="mb-3 text-center">{{ $tittle }}</h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/blog">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari..." name="cari"
                        value="{{ request('cari') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>



    {{ $posts->links() }}

    @if ($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top"
                alt="{{ $posts[0]->category->name }}">
            <div class="card-body text-center">
                <h3 class="card-title"><a href="/post/{{ $posts[0]->slug }}"
                        class="text-decoration-none text-dark">{{ $posts[0]->tittle }}</a></h3>
                <p>
                    <small class="text-muted">
                        By <a href="/blog?author={{ $posts[0]->author->username }}"
                            class="text-decoration-none">{{ $posts[0]->author->name }} </a> in <a
                            href="/blog?category={{ $posts[0]->category->slug }}"
                            class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForhumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
            </div>
        </div>


        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute px-3 py-2" style="background-color:rgba(0, 0, 0, 0.7)"><a
                                    href="/blog?category={{ $post->category->slug }}"
                                    class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top"
                                alt="{{ $post->category->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->tittle }}</h5>
                                <p>
                                    <small class="text-muted">
                                        By <a href="/blog?author={{ $post->author->username }}"
                                            class="text-decoration-none">{{ $post->author->name }} </a>
                                        {{ $post->created_at->diffForhumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



        {{-- @foreach ($posts->skip(1) as $post)
        <article class="mb-5 border-bottom pb-3">
            <h2><a href="/post/{{ $post->slug}}"class="text-decoration-none"> {{ $post->tittle }} </a></h2>
            <p>By <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}  </a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
            <p>{{ $post->excerpt }}</p>

            <a href="/post/{{ $post->slug}}" class="text-decoration-none">Read More..</a>
        </article>
    @endforeach --}}
    @else
        <p class="text-center fs-4">No Post Found!!</p>
    @endif
@endsection
