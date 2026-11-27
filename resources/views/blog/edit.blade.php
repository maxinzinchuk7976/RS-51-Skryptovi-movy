@extends('layouts.app')
@section('title', 'Редагування допису')
@section('content')
<h1>Редагування допису</h1>
<form
    method="POST"
    action="{{ route('blog.update', $blog) }}"
>
    @csrf
    @method('PUT')
    @include('blog._form')
    <button type="submit">
        Зберегти зміни
    </button>
</form>
@endsection
