@extends('layouts.app')
@section('title', 'Редагування замовлення')
@section('content')
<h1>Редагування замовлення</h1>
<form
    method="POST"
    action="{{ route('order.update', $order) }}"
>
    @csrf
    @method('PUT')
    @include('order._form')
    <button type="submit">
        Зберегти зміни
    </button>
</form>
@endsection
