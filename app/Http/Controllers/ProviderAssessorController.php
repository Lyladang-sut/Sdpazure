<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Assessors, AreaOfExpertise, CourseTaught};

class ProviderAssessorController extends Controller
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
        $data   = $request->except('experts', 'courses');
        $assessor = Assessors::create($data);

        $experts	= collect($request->experts)->transform(function($expert) {
			return new AreaOfExpertise($expert);
        });
        AreaOfExpertise::where('AssesorID', $assessor->ID)->delete();
        $assessor->experts()->saveMany($experts);

        $courses	= collect($request->courses)->transform(function($course) {
			return new CourseTaught($course);
        });
        CourseTaught::where('AssesorID', $assessor->ID)->delete();
        $assessor->courses()->saveMany($courses);
        
        return response()->json([
			'created'	=> true,
			'data'		=> Assessors::findOrFail($assessor->ID),
        ]);
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
        $assessor = Assessors::findOrFail($id);
        $data   = $request->except('index', 'experts', 'courses');
        $assessor->update($data);

        $experts	= collect($request->experts)->transform(function($expert) {
			return new AreaOfExpertise($expert);
        });
        AreaOfExpertise::where('AssesorID', $assessor->ID)->delete();
        $assessor->experts()->saveMany($experts);

        $courses	= collect($request->courses)->transform(function($course) {
			return new CourseTaught($course);
        });
        CourseTaught::where('AssesorID', $assessor->ID)->delete();
        $assessor->courses()->saveMany($courses);
        
        return response()->json([
			'updated'	=> true,
			'data'		=> Assessors::findOrFail($assessor->ID),
        ]);
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
    }
}
