@extends('layouts.app')

@section('content')
    <style type="text/css">
        #centerLayer {


            padding: 130px;
        }

    </style>
    <section class="home-section section-hero overlay bg-image" style="" id="centerLayer">

        <div class="container" >
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="text-white font-weight-bold">My Jobs:</h1>

                        </div>
                        <div class="panel-body">
                            <a href="{{ route('user.jobs.create') }}">Create job</a>



                            <table class="table">
                                <div>

                                </div>
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Posted by</th>
                                    <th scope="col">Schedule</th>
                                    <th scope="col">Salary</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Specialties</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Updated</th>
                                    <th scope="col">Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($jobs)
                                    @foreach($jobs as $job)
                                        <tr>
                                            <td>{{$job->id}}</td>
                                            <td><a href="{{ url('/user/apps/'. $job->id) }}">{{$job->name}}</a></td>
                                            <td>{{$job->user->name}}</td>
                                            <td>{{$job->schedule}}</td>
                                            <td>{{$job->salary1}} - {{$job->salary2}}</td>
                                            <td>{{$job->city}} - {{$job->country}}</td>
                                            <td>@foreach($job->specialty as $specialty)
                                                    {{$specialty->name}}
                                                @endforeach
                                            </td>
                                            <td>{{$job->created_at->diffForHumans()}}</td>
                                            <td>{{$job->updated_at->diffForHumans()}}</td>
                                            <td><a href="{{route('user.jobs.edit' , $job->id)}}">edit</a> </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
