@extends('layouts.main')
@section('container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <article>
                    <h2>{{ $post->tittle }}</h2>

                    <p>By <a href="/blog?author={{ $post->author->username }}"
                            class="text-decoration-none">{{ $post->author->name }} </a>in <a
                            href="/blog?category={{ $post->category->slug }}"
                            class="text-decoration-none">{{ $post->category->name }}</a></p>

                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid"
                        alt="{{ $post->category->name }}">

                    <article class="my-3 fs-5">
                        {!! $post->body !!}
                    </article>
                </article>

                <a href="/blog">back to blog</a>
            </div>
        </div>
    </div>
@endsection
