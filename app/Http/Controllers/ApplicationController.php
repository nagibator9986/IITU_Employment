<?php

namespace App\Http\Controllers;

use App\Application;
use App\Job;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        if(!(Auth::user())){
            return redirect('/login');
        }
        Application::create($input);
        return redirect('/details/' . $request['job_id']);
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
        $job = Job::findOrFail($id);
        $appsArray = Application::all();
        $apps =[];
        if(Auth::user())
            foreach($appsArray as $app) {
                if($app->job_id==$id){
                array_push($apps, $app);
                }
            }
        return view('user.apps.index' , compact('apps', 'job'));

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
        $input = $request->all();
        $app = Application::findOrFail($id);
    
        $app->update($input);

        return redirect('user/apps/'. $app->job_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $app = Application::findOrFail($id);

        $job = $app->job_id;
        $app->delete();
        return redirect('/details/'. $job);
        //
    }
}
