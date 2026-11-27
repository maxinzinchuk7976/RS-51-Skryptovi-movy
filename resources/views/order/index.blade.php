@extends('layouts.app')
@section('title', 'Список замовлеь')
@section('content')
<h1>Список замовлеь</h1>
<p>
    <a href="{{ route('order.create') }}">
        Додати замовлення
    </a>
</p>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Ім'я</th>
            <th>email</th>
            <th>Адреса</th>
            <th>Телефон</th>
            <th>Товари</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $i => $order)
        <tr>
            <td>
                {{ $orders->firstItem() + $i }}
            </td>
            <td>
                <a href="{{ route('order.show', $order) }}">
                    {{ $order->name }}
                </a>
            </td>
            <td>
                {{ $order->email }}
            </td>
            <td>
                {{ $order->address }}
            </td>
            <td>
                {{ $order->phone }}
            </td>
            <td>
                @forelse ($order->products as $product)
                <a href={{ route('product.show', $product) }}><span>
                {{ $product->name }}
                </span></a>
                @empty
                <span>Замовлення пусте</span>
                @endforelse
            </td>
            <td>
                <a href="{{ route('order.edit', $order) }}">
                    Редагувати
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $orders->links() }}
@endsection
