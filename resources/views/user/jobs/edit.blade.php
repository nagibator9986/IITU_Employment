@extends('layouts.app')

@section('content')
    <div>
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
                 id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="text-white font-weight-bold">Edit Job:</h1>
                    </div>
                </div>
            </div>
        </section>
        {!! Form::model($job, ['method'=>'PATCH', 'action'=>['UserJobsController@update', $job->id]]) !!}
        <div class="form-group">
            {!! Form::label ('name', 'Name:') !!}
            {!! Form::text ('name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label ('schedule', 'Schedule:') !!}
            {!! Form::select('schedule', array('full-time' => 'full-time', 'freelancer' => 'freelancer', 'part-time' => 'part-time'), null, ['class'=>'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::label ('salary1', 'Salary from:') !!}
            {!! Form::number('salary1', null, ['min'=>10000,'max'=>5000000],  ['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label ('salary2', 'Salary to:') !!}
            {!! Form::number('salary2', null,['min'=>10000,'max'=>5000000],  ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label ('description', 'Description:') !!}
            {!! Form::text ('description', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label ('responsibilities', 'Responsibilities:') !!}
            {!! Form::text ('responsibilities', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label ('country', 'Country:') !!}
            {!! Form::select('country', array('Kazakhstan' => 'Kazakhstan', 'USA' => 'USA', 'China' => 'China'), null, ['class'=>'form-control']); !!}
        </div>
        <div class="form-group">
            {!! Form::label ('city', 'City:') !!}
            {!! Form::select('city', array('Almaty' => 'Almaty', 'New York' => 'New York', 'Peking' => 'Peking'), null, ['class'=>'form-control']); !!}
        </div>
        <div class="form-group">
            {{Form::label('specialty', 'Specialty')}}
            {{Form::select('specialty',$specialties,null,array('multiple'=>'multiple','name'=>'specialty[]'))}}
        </div>
        <div class="form-group">
            {!! Form::submit ('Edit job', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action'=>['UserJobsController@destroy', $job->id]]) !!}
        <div class="form-group">
            {!! Form::submit ('Delete job', ['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
        @include('includes.formError')
    </div>
@stop