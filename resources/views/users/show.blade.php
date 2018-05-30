@extends('layouts.app')

@section('title', 'user')

@section('content')
    <div class="user-profile">
        <div class="icon text-center">
            <img src="{{ Gravatar::src($user->emai, 100) . '&d=mp' }}" alt="" class="img-circle">
        </div>
        <div class="name text-center">
            <h1>{{ $user->name }}</h1>
        </div>
        <div class="status text-center">
            <ul>
                <li>
                    <div class="status-label">WANT</div>
                    <div class="status-value" id="want_count">
                        {{ $count_want }}
                    </div>
                </li>
                <!--<li>-->
                <!--    <div class="status-label">WANT</div>-->
                <!--    <div class="status-value" id="have_count">-->
                            
                <!--    </div>-->
                <!--</li>-->
            </ul>
        </div>
    </div>
    @include('items.items', ['items', $items])
    {!! $items->render() !!}
@endsection