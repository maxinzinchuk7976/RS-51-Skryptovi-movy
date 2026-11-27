@extends('layouts.app')
@section('title', 'Редагування товару')
@section('content')
<h1>Редагування товару</h1>
<form enctype="multipart/form-data"  method="POST" action="{{ route('product.update', $product) }}" >
    @csrf
    @method('PUT')
    @include('product._form')
    <button type="submit">
        Зберегти зміни
    </button>
</form>
<h1>Переклад товару</h1>
<form method="POST" action="{{ route('product.translate', $product) }}">
    @csrf
    <div>
        <label for="language">Мова</label>
        <input
            id="language"
            name="language"
            type="text"
            value="{{ old('language') }}"
        >
        @error('lang')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="name">Назва</label>
        <input
            id="name"
            name="name"
            type="text"
            value="{{ old('name') }}"
        >
        @error('name')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="material">Матеріал</label>
        <input
            id="material"
            name="material"
            type="text"
            value="{{ old('material') }}"
        >
        @error('material')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit">
        Додати переклад
    </button>
</form>
@endsection
