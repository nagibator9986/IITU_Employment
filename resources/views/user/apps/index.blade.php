@extends('layouts.app')

@section('content')
    <div>
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
                 id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="text-white font-weight-bold">{{$job->name}}</h1>
                        <h1 class="text-white font-weight-bold">Applications:</h1>
                    </div>
                </div>
            </div>
        </section>

        {{--        <a href="{{ route('user.jobs.create') }}">Create job</a>--}}



        <table class="table">
            <div>

            </div>
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User Name</th>
                <th scope="col">User specialties</th>
                <th scope="col">Status</th>
                <th scope="col">Added at</th>
                <th scope="col">Hire</th>
                <th scope="col">Deny</th>
            </tr>
            </thead>
            <tbody>
            @if($apps)
                @foreach($apps as $app)
                    <tr>
                        <td>{{$app->id}}</td>
                        <td>{{$app->user->name}}</td>
                        <td>@foreach($app->user->specialty as $specialty)
                                {{$specialty->name}}
                            @endforeach
                        </td>
                        <td>{{$app->status==0 ? 'Denied':'Hired'}}</td>
                        <td>{{$app->created_at->diffForHumans()}}</td>
                        <td>
                            {!! Form::model($app, ['method'=>'PATCH', 'action'=>['ApplicationController@update', $app->id]]) !!}
                            <div class="form-group">
                                {!! Form::hidden ('status', 1, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::hidden ('user_id', $app->user_id, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::hidden ('job_id', $app->job_id, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit ('Hire user', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                        <td>
                            {!! Form::model($app, ['method'=>'PATCH', 'action'=>['ApplicationController@update', $app->id]]) !!}
                            <div class="form-group">
                                {!! Form::hidden ('status', 0, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit ('Deny user', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>


@endsection


