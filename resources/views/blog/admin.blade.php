@extends('layouts.app')
@section('title', 'Адміністрування блогу')
@section('content')

<form method="GET" action="{{ route('blog.admin') }}">
    <label for="title">Заголовок</label>
    <input
    type="text"
    id="title"
    name="title"
    value="{{ request('title') }}"
    placeholder="Пошук за заголовком"
    >
    <label for="categoryName">Назва категорії</label>
    <input
    type="text"
    id="categoryName"
    name="categoryName"
    value="{{ request('categoryName') }}"
    placeholder="Назва категорії"
    >
    <label for="category_id">Категорія</label>
    <select id="category_id" name="category_id">
    <option value="">Усі категорії</option>
    @foreach ($categories as $id => $name)
    <option
    value="{{ $id }}"
    @selected(request('category_id') == $id)
    >
    {{ $name }}
    </option>
    @endforeach
    </select>
    <label for="filter_id">Мітка</label>
    <select id="filter_id" name="filter_id">
    <option value="">Усі мітки</option>
    @foreach ($filters as $id => $name)
    <option
    value="{{ $id }}"
    @selected(request('filter_id') == $id)
    >
    {{ $name }}
    </option>
    @endforeach
    </select>
    <input type="hidden" name="sort" value="{{ request('sort') }}">
    <button type="submit">
    Застосувати
    </button>
    <a href="{{ route('blog.admin') }}">
    Скинути фільтри
    </a>
</form>

<h1>Адміністрування блогу</h1>
<p>
    <a href="{{ route('blog.create') }}">
        Додати запис
    </a>
</p>
<table>
    <thead>
        <tr>
            <th>№</th>
            @php
            $currentSort = request('sort');
            $nextSort = $currentSort === 'title3'
            ? '-title'
            : 'title';
            @endphp
            <th>
            <a href="{{ route('blog.admin', array_merge(
            request()->except('sort', 'page'),
            ['sort' => $nextSort]
            )) }}">
            Заголовок
            @if ($currentSort === 'title')
            ↑
            @elseif ($currentSort === '-title')
            ↓
            @endif
            </a>
            </th>
            @php
            $currentSort = request('sort');
            $nextSort = $currentSort === 'categoryName'
            ? '-categoryName'
            : 'categoryName';
            @endphp
            <th>
            <a href="{{ route('blog.admin', array_merge(
            request()->except('sort', 'page'),
            ['sort' => $nextSort]
            )) }}">
            Категорія
            @if ($currentSort === 'categoryName')
            ↑
            @elseif ($currentSort === '-categoryName')
            ↓
            @endif
            </a>
            </th>
            @php
            $currentSort = request('sort');
            $nextSort = $currentSort === 'created'
            ? '-created'
            : 'created';
            @endphp
            <th>
            <a href="{{ route('blog.admin', array_merge(
            request()->except('sort', 'page'),
            ['sort' => $nextSort]
            )) }}">
            Дата
            @if ($currentSort === 'created')
            ↑
            @elseif ($currentSort === '-created')
            ↓
            @endif
            </a>
            </th>
            <th>Дії</th>
            <th>Категорія</th>
            <th>Мітки</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($blogs as $i => $blog)
        <tr>
            <td>{{ $blogs->firstItem() + $i }}</td>
            <td>
                <a href="{{ route('blog.show', $blog) }}">
                    {{ $blog->title }}
                </a>
            </td>
            <td>
                {{ $blog->category?->category_name ?? '—' }}
            </td>
            <td>
                {{ $blog->dt_created->format('d.m.Y') }}
            </td>
            <td>
                <a href="{{ route('blog.edit', $blog) }}">
                    Редагувати
                </a>
                <form method="POST"
                    action="{{ route('blog.destroy', $blog) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Видалити</button>
                </form>
            </td>
            <td>
                {{ $blog->category?->category_name ?? '—' }}
            </td>
            <td>
            @forelse ($blog->filters as $filter)
            <span class="tag">
            {{ $filter->filter_name }}
            </span>
            @empty
            —
            @endforelse
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">Записів немає.</td>
        </tr>
        @endforelse
    </tbody>
</table>
{{ $blogs->links() }}
@endsection
