<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Job;
use App\Specialty;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $jobsArray = Job::all();
        $jobs =[];

        foreach($jobsArray as $job) {
            if($job->user_id==$user->id)
                array_push($jobs, $job);
        }
        return view('user.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $specialties = Specialty::lists('name', 'id')->all();
        return view('user.jobs.create', compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();


        $user = Auth::user();

        $user->jobs()->create($input)->specialty()->attach($input['specialty']);

        return redirect('/user/jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $job = Job::findOrFail($id);
        $specialties = Specialty::lists('name', 'id')->all();
        return view('user.jobs.edit', compact('job', 'specialties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $job = Job::findOrFail($id);

        $input = $request->except('specialty');
        if($request['specialty'] != null){
            $job->specialty()->detach();
            $job->specialty()->attach($request['specialty']);
        }


        $job->update($input);




        return redirect('user/jobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $job = Job::findOrFail($id);
        $job->specialty()->detach();
        $job->delete();
        return redirect('/user/jobs');
    }


}
