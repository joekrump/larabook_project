@extends('layouts.default')

@section('content')
    @include('layouts.partials.errors')

    <h1>Sign In!</h1>
    {{ Form::open(['route'=>'login_path']) }}

        {{-- Email Form Input --}}
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email', null, ['class'=> 'form-control', 'required' => 'required']) }}
        </div>

        {{-- Password Form Field  --}}
        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', ['class'=> 'form-control', 'required' => 'required']) }}
        </div>
        <!-- form elements go here -->
        {{--  Form Submit --}}
        <div class="form-group">
            {{ Form::submit('Sign In', ['class'=>'btn btn-primary']) }}
        </div>
    {{ Form::close() }}
@stop
