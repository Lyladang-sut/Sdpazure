<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Trainee, TrainingAccessed};

class TrainingAccessController extends Controller
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
        $data       = $request->all();
        $training   = TrainingAccessed::create($data);
        
        return response()->json([
			'created'	=> true,
			'data'		=> TrainingAccessed::findOrFail($training->ID),
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
        $training = TrainingAccessed::findOrFail($id);
        $data   = $request->except('index');
        $training->update($data);
        
        return response()->json([
			'updated'	=> true,
			'data'		=> TrainingAccessed::findOrFail($training->ID),
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
        $training = TrainingAccessed::findOrFail($id);
        $training->delete();

        return response()->json([
			'deleted'	=> true,
        ]);
    }
}
