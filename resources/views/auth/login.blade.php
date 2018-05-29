@extends('layouts.app')

@section('title', 'login')

@section('content')
<div class="row">
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> ログイン</h3>
            </div>
            <div class="panel-body">
                {!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group">
                        {!! Form::label('email', 'メールアドレス') !!}
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'ryo-yamamoto@test.co.jp']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'パスワード') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '6文字以上の半角英数字']) !!}
                    </div>
                    <div class="text-right">
                        {!! Form::button('<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> ログイン', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection