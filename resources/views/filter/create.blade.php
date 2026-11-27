@extends('layouts.app')
@section('title', 'Додати фільтр')
@section('content')
<h1>Додати фільтр</h1>
<form method="POST" action="{{ route('filter.store') }}">
    @csrf
    @include('filter._form')
    <button type="submit">
        Зберегти
    </button>
</form>
@endsection
