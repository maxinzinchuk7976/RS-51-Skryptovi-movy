@extends('layouts.app')
@section('title', 'Додати допис')
@section('content')
<h1>Додати допис</h1>
<form method="POST" action="{{ route('blog.store') }}">
    @csrf
    @include('blog._form')
    <button type="submit">
        Зберегти
    </button>
</form>
@endsection
