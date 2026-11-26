@extends('layouts.app')
@section('title', 'Інформація зі зовнішніх джерел')
@section('content')
<table>
    <thead>
        <tr>
            <th>IP</th>
            <th>Токен</th>
            <th>Сторінка</th>
            <th>Дата і час</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($redirects as $row)
        <tr>
            <td>{{ $row->ip }}</td>
            <td>{{ $row->token }}</td>
            <td>{{ $row->page }}</td>
            <td>
            {{ $row->visited_at->format('d.m.Y H:i:s') }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $redirects->links() }}
@endsection
