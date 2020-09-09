<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ManualResult as ManualResult;
use App\Indicator as Indicator;
use DataTables;

class ManualResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manualresult.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'sex'       =>  ManualResult::$sex,
            'indicator' =>  Indicator::select('ID','Indicator Short as Name')->pluck('Name', 'ID'),

        ];
        return view('manualresult.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'Result'        => 'required|numeric',
        //     'Notes'         => 'nullable',
        // ]);

        $input      = inputs($request->all());
        $manualResult = ManualResult::create($input);

        return redirect()->route('manual-result.index')->with('message', 'Manual Result has been created'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manualResult    = ManualResult::findOrFail($id);
        $data = [
           'manualResult'   => $manualResult, 
           'sex'            =>  ManualResult::$sex,
            'indicator'     =>  Indicator::select('ID','Indicator Short as Name')->pluck('Name', 'ID'),

        ];
        return view('manualresult.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manualResult    = ManualResult::findOrFail($id);
        $data = [
            'manualResult'  => $manualResult, 
            'sexes'         =>  ManualResult::$sex,
            'indicators'    =>  Indicator::select('ID','Indicator Short as Name')->pluck('Name', 'ID'),
         ];
        return view('manualresult.edit')->with($data);
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
       
        $manualResult   = ManualResult::findOrFail($id);
        // $this->validate($request, [
        //     'Result'        => 'required|numeric',
        //     'Notes'         => 'nullable',
        // ]);

        $input      = inputs($request->all());
        $manualResult->update($input);

        return redirect()->route('manual-result.edit', $id)->with('message', 'Manual Result has been updated'); 

    }

    public function delete($id)
    {
        $manualResult   = ManualResult::findOrFail($id);
        return view('manualresult.delete', compact('manualResult'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ManualResult::destroy($id);
        return redirect()->route('manual-result.index')->with('message', 'You have succesfully deleted the Manual Result !' );
    }

    /**
     * DataTables Init
     */
    public function datatable()
    {
        return DataTables::of(ManualResult::query())
        ->editColumn('Indicator', function($survey) {
            if($survey->indicator):
                return $survey->indicator->{'Indicator Short'};
            endif;
        })
        ->addColumn('action', function ($survey) {
            $action     = "<a href='".route('manual-result.edit', ['id' => $survey->ID])."' class='btn btn-raised btn-sm btn-primary'><i class='ti-pencil'></i></a> ";
            if(\Auth::user()->role == 'Administrator'):
                $action     .= "<a href='".route('manual-result.delete', ['id' => $survey->ID])."' class='btn btn-raised btn-sm btn-danger'><i class='ti-trash'></i></a> ";
            endif;
            return $action;
        })
        ->rawColumns(['Image', 'action'])
        ->make(true);
    }
}
