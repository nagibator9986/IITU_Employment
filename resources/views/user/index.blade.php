@extends('layouts.app')

@section('content')
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
             id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Profile:</h1>
                </div>
            </div>
        </div>
    </section>

    {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id]]) !!}
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
        <td>{{$user->role->name}}</td>
        {!! Form::hidden ('role_id', $user->role->id,  ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label ('is_active', 'Status:') !!}
        <td>{{$user->is_active ==1 ? 'Active' : 'Not Active'}}</td>
        {!! Form::hidden ('is_active', $user->isActive,  ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {{Form::label('specialty', 'Specialty: ')}}
        @if($user->specialty)
            @foreach($user->specialty as $specialty)
                <td>{{$specialty->name}} </td>
            @endforeach
        @endif
    </div>
    <div class="form-group">
        {{Form::select('specialty',$specialties,null,array('multiple'=>'multiple','name'=>'specialty[]'))}}
    </div>

    <div class="form-group">
        {!! Form::submit ('Save', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    @include('includes.formError')

@stop
