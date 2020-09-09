<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Enterprise, EnterpriseEmployment};

class EnterpriseEmploymentController extends Controller
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
        $data = $request->all();
        $employment = EnterpriseEmployment::create($data);

        return response()->json([
			'created'	=> true,
			'data'		=> EnterpriseEmployment::findOrFail($employment->ID),
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
        $employment = EnterpriseEmployment::findOrFail($id);
        $data = $request->except('index');
        $employment->update($data);

        return response()->json([
			'updated'	=> true,
			'data'		=> EnterpriseEmployment::findOrFail($employment->ID),
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
        $employment = EnterpriseEmployment::findOrFail($id);
        $employment->delete();

        return response()->json([
			'deleted'	=> true,
        ]);
    }
}
