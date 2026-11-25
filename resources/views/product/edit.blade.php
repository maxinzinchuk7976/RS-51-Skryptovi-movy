@extends('layouts.app')
@section('title', 'Редагування товару')
@section('content')
<h1>Редагування товару</h1>
<form enctype="multipart/form-data"  method="POST" action="{{ route('product.update', $product) }}" >
    @csrf
    @method('PUT')
    @include('product._form')
    <button type="submit">
        Зберегти зміни
    </button>
</form>
@endsection
