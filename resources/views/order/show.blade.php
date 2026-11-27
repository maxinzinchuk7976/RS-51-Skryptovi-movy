@extends('layouts.app')
@section('title', $order->name)
@section('content')
<h1>{{ $order->name }}</h1>
<p>
    <strong>Ім'я:</strong>
    {{ $order->name }}
</p>
<p>
    <strong>email:</strong>
    {{ $order->email }}
</p>
<p>
    <strong>Тел:</strong>
    {{ $order->phone }}
</p>
<p>
    <strong>Адреса:</strong>
    {{ $order->address }}
</p>
<p>
    <a href="{{ route('order.edit', $order) }}">
    Редагувати
    </a>
</p>
<p>
    <div>
    <strong>Замовлено:</strong>
        @forelse ($order->products as $product)
        <a href={{ route('product.show', $product) }}><span>
        {{ $product->name }}
        </span></a>
        @empty
        <span>Замовлення пусте</span>
        @endforelse
    </div>
</p>
<p>
    <a href="{{ route('order.index') }}">
    Повернутися до списку
    </a>
</p>
<p>
    <form
        method="POST"
        action="{{ route('order.destroy', $order) }}"
    >
        @csrf
        @method('DELETE')
        <button type="submit">
        Видалити
    </button>
    </form>
</p>
@endsection
