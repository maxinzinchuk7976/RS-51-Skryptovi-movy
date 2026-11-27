@extends('layouts.app')
@section('title', 'Редагування фільтру')
@section('content')
<h1>Редагування фільтру</h1>
<form
    method="POST"
    action="{{ route('filter.update', $filter) }}"
>
    @csrf
    @method('PUT')
    @include('filter._form')
    <button type="submit">
        Зберегти зміни
    </button>
</form>
@endsection
