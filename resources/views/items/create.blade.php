@extends('layouts.app')

@section('title', 'search')

@section('content')
    <div class="search">
        <div class="row">
            <div class="text-center">
                {!! Form::open(['route' => 'items.create', 'method' => 'get', 'class' => 'form-inline']) !!}
                    <div class="form-group">
                        {!! Form::text('keyword', $keyword, ['class' => 'form-contol input-lg', 'placeholder' => 'キーワードを入力', 'size' => 40]) !!}
                    </div>
                    {!! Form::button('<span class="glyphicon glyphicon-search" aria-hidden="true"></span> 検索', ['class' => 'btn btn-success btn-lg', 'type' => 'submit']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    @include('items.items')
@endsection