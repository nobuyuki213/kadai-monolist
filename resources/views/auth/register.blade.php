@extends('layouts.app')

@section('title', 'signup')

@section('content')
<div class="row">
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 会員登録</h3>
            </div>
            <div class="panel-body">
                {!! Form::open(['route' => 'signup.post']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'お名前') !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '山本 涼']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'メールアドレス') !!}
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'ryo-yamamoto@test.co.jp']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'パスワード') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '6文字以上の半角英数字']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'パスワード（確認）') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'パスワード確認用']) !!}
                    </div>
                    <div class="text-right">
                        {!! Form::button('登録する <span class="glyphicon glyphicon-check" aria-hidden="true"></span>', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection