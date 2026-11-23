@extends('layouts.app')
@section('title', 'Дані прийнято')
@section('content')
<h1>Ми отримали ваше замовдення</h1>
<p>Очікуйте на дзвінок з підтвердженням</p>
<p>Подробиці:</p>
<ul>
    <li>
        <strong>Назва:</strong>
        {{ $product_name }}
    </li>
    <li>
        <strong>Вартість:</strong>
        {{ $product_cost }}
    </li>
    <li>
        <strong>Фото:</strong>
        <img src="{{ asset($product_photo) }}">
    </li>
    <li>
        <strong>Ім'я:</strong>
        {{ $name }}
    </li>
    <li>
        <strong>email:</strong>
        {{ $email }}
    </li>
    <li>
        <strong>Номер телефону:</strong>
        {{ $phone }}
    </li>
    <li>
        <strong>Адреса доставки:</strong>
        {{ $address }}
    </li>
</ul>
@endsection
