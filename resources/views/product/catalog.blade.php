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
    <form method="GET" action="{{ route('product.search') }}">
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
        <button type="submit">Пошук</button>
    </form>
</div>
<div style="float: right;">
    <table>
        <thead>
            <tr>
                <th>Назва</th>
                <th>Виробник</th>
                <th>Матеріал</th>
                <th>Ціна</th>
                <th>Фото</th>
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
