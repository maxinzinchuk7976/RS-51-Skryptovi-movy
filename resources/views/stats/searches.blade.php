@extends('layouts.app')
@section('title', 'Інформація про пошуки')
@section('content')
<table>
    <thead>
        <tr>
            <th>Назва</th>
            <th>Виробник</th>
            <th>Матеріал</th>
            <th>Дешевше за</th>
            <th>Дорожче за</th>
            <th>Дата і час</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($searches as $row)
        <tr>
            <td>{{ $row->name }}</td>
            <td>{{ $row->brand }}</td>
            <td>{{ $row->material }}</td>
            <td>{{ $row->maxcost }}</td>
            <td>{{ $row->mincost }}</td>
            <td>
            {{ $row->visited_at->format('d.m.Y H:i:s') }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $searches->links() }}
@endsection
