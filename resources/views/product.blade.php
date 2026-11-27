@extends('layouts.app')
@section('title', $name)
@section('content')

<ul>
    <li>
        <strong>Назва:</strong>
        {{ $name }}
    </li>
    <li>
        <strong>Ціна:</strong>
        {{ $cost }}
    </li>
    <li>
        <strong>Фото:</strong>
        <img src="{{ asset($photo) }}">
    </li>
</ul>

<form method="POST" action="{{ route('product.order') }}">
    @csrf
    <input type="hidden" id="id" name="id" value="{{ $id }}" >
    <div>
        <label for="name">Ім'я</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" >
        @error('name')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="{{ old('email') }}" >
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="phone">Номер телефону</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" >
        @error('phone')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="address">Адреса доставки</label>
        <input type="text" id="address" name="address" value="{{ old('address') }}" >
        @error('address')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit">Замовити</button>
</form>

@endsection
