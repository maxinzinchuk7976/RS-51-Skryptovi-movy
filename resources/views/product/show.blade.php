<?php if(empty($lang)){$lang = 'uk';}; $product_translates = $product->translation($lang); ?>

@extends('layouts.app')
@section('title', $product_translates->name)
@section('content')
<h1>{{ $product_translates->name }}</h1>
<p>
    <img src="{{ asset($product->photo_path) }}" class="product-photo">
</p>
<p>
    <strong>Назва:</strong>
    {{ $product_translates->name }}
</p>
<p>
    <strong>Виробник:</strong>
    {{ $product->brand }}
</p>
<p>
    <strong>Матеріал:</strong>
    {{ $product_translates->material }}
</p>
<p>
    <strong>Ціна:</strong>
    {{ number_format($product->cost, 0, ',', ' ') }} грн
</p>
<p>
    <a href="{{ route('product.edit', $product) }}">
        Редагувати
    </a>
</p>
<p>
    <a href="{{ route('product.index') }}">
        Повернутися до каталогу
    </a>
</p>
<p>
    <form
        method="POST"
        action="{{ route('product.destroy', $product) }}"
    >
        @csrf
        @method('DELETE')
        <button type="submit">
        Видалити
    </button>
    </form>
</p>
@endsection
