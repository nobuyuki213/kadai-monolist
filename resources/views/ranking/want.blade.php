@extends('layouts.app')

@section('title', 'ranking')

@section('content')
    <h1>Wantランキング</h1>
    @include('items.items', ['items' => $items])
@endsection