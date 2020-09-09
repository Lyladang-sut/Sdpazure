<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{OwnerManager};

class OwnerManagerController extends Controller
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
    public function create(Request $request)
    {
        $data    = $request->except('trainers', 'experts');
        $manager = OwnerManager::create($data);

        return response()->json([
			'updated'	=> true,
			'data'		=> OwnerManager::findOrFail($manager->ID),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data    = $request->except('trainers', 'experts');
        $manager = OwnerManager::create($data);

        return response()->json([
			'created'	=> true,
			'data'		=> OwnerManager::findOrFail($manager->ID),
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
        $manager = OwnerManager::findOrFail($id);
        $data    = $request->except('trainers', 'experts');
        $manager->update($data);

        return response()->json([
			'updated'	=> true,
			'data'		=> OwnerManager::findOrFail($manager->ID),
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
