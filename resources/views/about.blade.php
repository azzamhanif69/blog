@extends('layouts.main')

@section('container')
    <h1>{{ $name }}</h1>
    <h3>{{ $email }}</h3>
    <img src="img/{{ $img }}" alt="{{ $name }}">
@endsection
