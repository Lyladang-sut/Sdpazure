<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RPL;
use App\RPLEnterprise as RPLEnterprise;
use App\RPLSector as RPLSector;
use App\RPLBatch as RPLBatch;
use App\RPLCourse as RPLCourse;
use App\RPLLocation as RPLLocation;
USE App\Industry as Industry;
use App\RPLTest as RPLTest;
use DataTables;

class RPLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rpl.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data           =  [
            'providers'         => RPLEnterprise::select('ID', 'RPL Enterprise as Name')->pluck('Name', 'ID'),
            'sectors'           => RPLSector::select('RPL', 'Sector')->pluck('Sector', 'Sector'),
            'batches'           => RPLBatch::select('ID', 'Batch Code as Name')->pluck('Name', 'ID'),
            'courses'           => RPLCourse::select('ID', 'Course')->pluck('Course', 'ID'),
            'locations'         => RPLLocation::select('Province')->pluck('Province', 'Province'),
            'participants'      => Industry::select('ID', 'Full Name as Name')->pluck('Name', 'ID'),
            'incomes'           => RPLTest::$incomes,
            'results'           => RPLTest::$results,
        ];

        return view('rpl.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Make Relationship Collections
        $tests	= collect($request->tests)->transform(function($test) {
			return new RPLTest($test);
		});
       
        // Get Reqeuest Data, excepts Relationship 
        $data = $request->except('tests');
        
        // Update Action
        $rpl = RPL::create($data);
    
        // Insert new relationship
        $rpl->tests()->saveMany($tests);
        
        // Return action status to front-end
        return response()->json([
			'created'	=> true,
			'id'		=> $rpl->id,
        ]);
        
        // Note, before model can save, need to allow in model file
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $data = [
            'rpl'   => RPL::findOrFail($id),

        ];
        return view('rpl.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data           =  [
            'rpl'               => RPL::with('tests')->findOrFail($id),
            'providers'         => RPLEnterprise::select('ID', 'RPL Enterprise as Name')->orderBy('RPL Enterprise', 'ASC')->pluck('Name', 'ID'),
            'sectors'           => RPLSector::select('RPL', 'Sector')->pluck('Sector', 'Sector'),
            'batches'           => RPLBatch::select('ID', 'Batch Code as Name')->pluck('Name', 'ID'),
            'courses'           => RPLCourse::select('ID', 'Course')->pluck('Course', 'ID'),
            'locations'         => RPLLocation::select('Province')->pluck('Province', 'Province'),
            'participants'      => Industry::select('ID', 'Full Name as Name')->orderBy('Full Name', 'ASC')->pluck('Name', 'ID'),
            'incomes'           => RPLTest::$incomes,
            'results'           => RPLTest::$results,
        ];

        return view('rpl.edit')->with($data);
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
        // Select Item with $id
        $rpl = RPL::findOrFail($id);
        
        // Make Relationship Collections
        $tests	= collect($request->tests)->transform(function($test) {
			return new RPLTest($test);
		});

        // Get Reqeuest Data, excepts Relationship 
        $data = $request->except('tests');
        
        // Update Action
        $rpl->update($data);
        
        // Delete old relationship
        RPLTest::where('RPL ID', $rpl->ID)->delete();
        // Insert new relationship
        $rpl->tests()->saveMany($tests);
        
        // Return action status to front-end
        return response()->json([
			'updated'	=> true,
			'id'		=> $rpl->id,
        ]);
        
        // Note, before model can save, need to allow in model file 
    }

    public function delete($id)
    {
        $rpl     = RPL::with('tests')->findOrFail($id);
        return view('rpl.delete', compact('rpl'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RPL::destroy($id);
        return redirect()->route('rpl.index')->with('message', 'You have succesfully deleted the RPL!' );
    }

    /**
     * DataTables Init
     */
    public function datatable()
    {
        return DataTables::of(RPL::query())
        ->editColumn('RPL provider', function ($rpl) {
            if($rpl->provider):
                return $rpl->provider->{'RPL Enterprise'};
            endif;
        })
        ->editColumn('Course', function ($rpl) {
            if($rpl->course):
                return $rpl->course->{'Course'};
            endif;
        })
        ->editColumn('Batch', function($rpl) {
            if($rpl->batch):
                return $rpl->batch->{'Batch Code'};
            endif;
        })
        ->addColumn('action', function ($rpl) {
            $action     = "<a href='".route('rpl.edit', ['rpl' => $rpl->ID])."' class='btn btn-raised btn-sm btn-primary'><i class='ti-pencil'></i></a> ";
            if(\Auth::user()->role == 'Administrator'):
                $action     .= "<a href='".route('rpl.delete', ['rpl' => $rpl->ID])."' class='btn btn-raised btn-sm btn-danger'><i class='ti-trash'></i></a> ";
            endif;
            return $action;
        })
        ->rawColumns(['Image', 'action'])
        ->make(true);
    }

}
