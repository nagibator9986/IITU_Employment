@extends('layouts.app')

@section('content')
    <div>
        <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');"
                 id="home-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1 class="text-white font-weight-bold">My Jobs:</h1>
                    </div>
                </div>
            </div>
        </section>

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


@endsection
