@extends('layouts.app')
@section('title', 'Додати замовлення')
@section('content')
<h1>Додати замовлення</h1>
<form method="POST" action="{{ route('order.store') }}">
    @csrf
    @include('order._form')
    <button type="submit">
        Зберегти
    </button>
</form>
@endsection
