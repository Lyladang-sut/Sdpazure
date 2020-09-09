<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{TPPTrainer, AreaOfExpertise, CourseTaught};

class ProviderTrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TPPTrainer::all()->toJson();
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
        $trainer = TPPTrainer::create($data);

        $experts	= collect($request->experts)->transform(function($expert) {
			return new AreaOfExpertise($expert);
        });
        AreaOfExpertise::where('TPPTrainerID', $trainer->ID)->delete();
        $trainer->experts()->saveMany($experts);

        $courses	= collect($request->courses)->transform(function($course) {
			return new CourseTaught($course);
        });
        CourseTaught::where('TPPTrainerID', $trainer->ID)->delete();
        $trainer->courses()->saveMany($courses);
        
        return response()->json([
			'created'	=> true,
			'data'		=> TPPTrainer::findOrFail($trainer->ID),
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
        $trainer = TPPTrainer::findOrFail($id);
        $data   = $request->except('index', 'experts', 'courses');
        $trainer->update($data);

        $experts	= collect($request->experts)->transform(function($expert) {
			return new AreaOfExpertise($expert);
        });
        AreaOfExpertise::where('TPPTrainerID', $trainer->ID)->delete();
        $trainer->experts()->saveMany($experts);

        $courses	= collect($request->courses)->transform(function($course) {
			return new CourseTaught($course);
        });
        CourseTaught::where('TPPTrainerID', $trainer->ID)->delete();
        $trainer->courses()->saveMany($courses);
        
        return response()->json([
			'updated'	=> true,
			'data'		=> TPPTrainer::findOrFail($trainer->ID),
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
        AreaOfExpertise::where('TPPTrainerID', $id)->delete();
        CourseTaught::where('TPPTrainerID', $id)->delete();
        TPPTrainer::destroy($id);

        return response()->json([
			'deleted'	=> true,
		]);
    }
}
