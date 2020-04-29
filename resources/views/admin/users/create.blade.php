@extends('layouts.admin')

@section('content')
    <h1>Create User:</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store']) !!}
    <div class="form-group">
        {!! Form::label ('name', 'Name:') !!}
        {!! Form::text ('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('email', 'Email:') !!}
        {!! Form::email ('email', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('password', 'Password:') !!}
        {!! Form::password ('password', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('role_id', 'Role:') !!}
        {!! Form::select ('role_id', [''=>'Choose role'] + $roles, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('is_active', 'Status:') !!}
        {!! Form::select ('is_active', array(1=>'Active', 0=>'Not Active'), 0, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {{Form::label('specialty', 'Specialty')}}
        {{Form::select('specialty',$specialties,null,array('multiple'=>'multiple','name'=>'specialty[]'))}}
    </div>

    <div class="form-group">
        {!! Form::submit ('Create user', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    @include('includes.formError')

@stop