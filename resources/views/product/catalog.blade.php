@extends('layouts.app')
@section('title', 'Каталог товарів')
@section('content')
<h1>Каталог товарів</h1>
<p>
    <a href="{{ route('product.create') }}">
        Додати товар
    </a>
</p>
<div style="float: left;">
    <form method="GET" action="{{ route('product.index') }}">
        <div>
            <label for="name">Назва</label>
            <input type="text" id="name" name="name" value="{{ request('name') }}" >
            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="brand">Виробник</label>
            <input type="text" id="brand" name="brand" value="{{ request('brand') }}" >
            @error('brand')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="material">Матеріал</label>
            <input type="text" id="material" name="material" value="{{ request('material') }}" >
            @error('material')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="maxcost">Дешевше за</label>
            <input type="number" id="maxcost" name="maxcost" value="{{ request('maxcost') }}" >
            @error('maxcost')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="mincost">Дорожче за</label>
            <input type="number" id="mincost" name="mincost" value="{{ request('mincost') }}" >
            @error('mincost')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="client_name">Замовник</label>
            <input type="text" id="client_name" name="client_name" value="{{ request('client_name') }}" >
            @error('client_name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="order_id">Замовник</label>
            <select id="order_id" name="order_id">
            <option value="">Усі клієнти</option>
            @foreach ($orders as $id => $name)
            <option
            value="{{ $id }}"
            @selected(request('order_id') == $id)
            >
            {{ $name }}
            </option>
            @endforeach
            </select>
        </div>
        <input type="hidden" name="sort" value="{{ request('sort') }}">
        <button type="submit">Пошук</button>
    </form>
</div>
<div style="float: right;">
    <table>
        <thead>
            @php
            $currentSort = request('sort');
            @endphp
            <tr>
                <th> <a href="{{ route('product.index', array_merge( request()->except('sort', 'page'),['sort' => $currentSort === 'name' ? '-name' : 'name'] )) }}">
                Назва @if ($currentSort === 'name') ↑
                @elseif ($currentSort === '-name') ↓ @endif
                </a></th>
                <th><a href="{{ route('product.index', array_merge( request()->except('sort', 'page'),['sort' => $currentSort === 'brand' ? '-brand' : 'brand'] )) }}">
                Виробник @if ($currentSort === 'brand') ↑
                @elseif ($currentSort === '-brand') ↓ @endif
                </a></th>
                <th><a href="{{ route('product.index', array_merge( request()->except('sort', 'page'),['sort' => $currentSort === 'material' ? '-material' : 'material'] )) }}">
                Матеріал @if ($currentSort === 'material') ↑
                @elseif ($currentSort === '-material') ↓ @endif
                </a></th>
                <th><a href="{{ route('product.index', array_merge( request()->except('sort', 'page'),['sort' => $currentSort === 'cost' ? '-cost' : 'cost'] )) }}">
                Ціна @if ($currentSort === 'cost') ↑
                @elseif ($currentSort === '-cost') ↓ @endif
                </a></th>
                <th>Фото</th>
                <th><a href="{{ route('product.index', array_merge( request()->except('sort', 'page'),['sort' => $currentSort === 'orders' ? '-orders' : 'orders'] )) }}">
                Кількість замовлень @if ($currentSort === 'orders') ↑
                @elseif ($currentSort === '-orders') ↓ @endif
                </a></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $i => $product)
            <?php if(empty($lang)){$lang = 'uk';}; $product_translates = $product->translation($lang); ?>
            <tr>
                <td>
                    <a href="{{ route('product.show', $product) }}">
                        {{ $product_translates->name }}
                    </a>
                </td>
                <td>
                    {{ $product->brand }}
                </td>
                <td>
                    {{ $product_translates->material }}
                </td>
                <td>
                    {{
                        number_format($product->cost, 0, ',', ' ')
                    }} грн
                </td>
                <td>
                    <img src="{{ asset($product->photo_path) }}" class="product-photo">
                </td>
                <td>
                    @forelse ($product->orders as $order)
                    <a href={{ route('order.show', $order) }}><span>
                    {{ $order->name }}
                    </span></a>
                    @empty
                    <span>Замовлень немає</span>
                    @endforelse
                </td>
                <td>
                    <a href="{{ route('product.edit', $product) }}">
                        Редагувати
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $products->links() }}
@endsection
