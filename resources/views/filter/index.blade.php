@extends('layouts.app')
@section('title', 'Фільтри')
@section('content')
<h1>Фільтри</h1>
<p>
    <a href="{{ route('filter.create') }}">
        Додати фільтр
    </a>
</p>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Назва</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($filters as $i => $filter)
        <tr>
            <td>
                {{ $filters->firstItem() + $i }}
            </td>
            <td>
                {{ $filter->filter_name }}
            </td>
            <td>
                <a href="{{ route('filter.edit', $filter) }}">
                Редагувати
                </a>
            </td>
            <td>
                <form
                    method="POST"
                    action="{{ route('filter.destroy', $filter) }}"
                >
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                    Видалити
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $filters->links() }}
@endsection
