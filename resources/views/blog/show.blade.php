@extends('layouts.app')
@section('title', $blog->title)
@section('content')
<h1>{{ $blog->title }}</h1>
<p>
    <strong>Опис</strong>
    {{ $blog->description }}
</p>
<p>
    <strong>Категорія:</strong>
    {{ $blog->category?->category_name }}
</p>
<p>
    {{ $blog->text }}
</p>
<p>
    <a href="{{ route('blog.edit', $blog) }}">
        Редагувати
    </a>
</p>
<p>
    <a href="{{ route('blog.index') }}">
        Повернутися до каталогу
    </a>
</p>
<p>
    <form
        method="POST"
        action="{{ route('blog.destroy', $blog) }}"
    >
        @csrf
        @method('DELETE')
        <button type="submit">
        Видалити
    </button>
    </form>
</p>
@endsection
