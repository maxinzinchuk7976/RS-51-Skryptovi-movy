@extends('layouts.app')
@section('title', 'Додати товар')
@section('content')
<h1>Додати товар</h1>
<form method="POST" enctype="multipart/form-data" action="{{ route('product.store') }}">
    @csrf
    @include('product._form')
    <button type="submit">
        Зберегти
    </button>
</form>
@endsection
