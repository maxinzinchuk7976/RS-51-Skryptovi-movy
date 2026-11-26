@extends('layouts.app')
@section('title', 'Інформація про пристрої')
@section('content')
<table>
    <thead>
        <tr>
            <th>IP</th>
            <th>Agent</th>
            <th>Дата і час</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($devices as $row)
        <tr>
            <td>{{ $row->ip }}</td>
            <td>{{ $row->agent }}</td>
            <td>
            {{ $row->visited_at->format('d.m.Y H:i:s') }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $devices->links() }}
@endsection
