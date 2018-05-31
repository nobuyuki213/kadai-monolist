@extends('layouts.app')

@section('title', 'ranking')

@section('content')
    <h1>{{ $type }}ランキング</h1>
    @include('items.items', ['items' => $items, 'type' => $type])
@endsection