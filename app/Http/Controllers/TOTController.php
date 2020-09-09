<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{TOT, TOTTrain, TOTEnt, TOTCourse, TOTDC, TPPTrainer, TOTOwnerEnt, TOTTraining};
use DataTables;

class TOTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tot.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'organisations'         => TOTTrain::select('ID','Name organization_institution as Name')->pluck('Name','ID'),
            'trainers'              => TPPTrainer::select('ID', 'Full Name as Name', 'Organisation')->get()->groupBy('Organisation'),
            'trainerss'             => TPPTrainer::select('ID', 'Full Name as Name', 'Organisation')->pluck('Name', 'ID'),
            'enterprises'           => TOTEnt::select('ID','Name of enterprise as Name')->orderBy('Name of enterprise','ASC')->pluck('Name','ID'),
            'owners'                => TOTOwnerEnt::select('Full Name as Name')->orderBy('Full Name','ASC')->pluck('Name','Name'),
            'courses'               => TOTCourse::select('ID','Course as Name')->orderBy('Course','ASC')->pluck('Name','ID'),
            'dc'                    => TOTDC::select('NewCODE','Delivery Channel as Name')->pluck('Name','NewCODE'),
            'result_tot'            => TOT::$result_tot,
            'owner_trainer'         => TOT::$owner_trainer,
            'intervention'          => TOT::$intervention
        ];
        return view('tot.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attendees	= collect($request->attendees)->transform(function($attendee) {
			return new TOTTraining($attendee);
		});
       
        $data = $request->except('attendees');
        
        $tot = TOT::create($data);
        $tot->attendees()->saveMany($attendees);
        
        return response()->json([
			'created'	=> true,
			'id'		=> $tot->id,
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
        $tot    = TOT::findOrFail($id);
        $data       = [
            'tot'   => $tot
        ];

        return view('tot.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'tot'                   => TOT::with('attendees')->findOrFail($id),
            'organisations'         => TOTTrain::select('ID','Name organization_institution as Name')->pluck('Name','ID'),
            'trainers'              => TPPTrainer::select('ID', 'Full Name as Name', 'Organisation')->get()->groupBy('Organisation'),
            'trainerss'             => TPPTrainer::select('ID', 'Full Name as Name', 'Organisation')->pluck('Name', 'ID'),
            'enterprises'           => TOTEnt::select('ID','Name of enterprise as Name')->orderBy('Name of enterprise','ASC')->pluck('Name','ID'),
            'owners'                => TOTOwnerEnt::select('Enterprise', 'Full Name')->get()->groupBy('Enterprise'),
            'courses'               => TOTCourse::select('ID','Course as Name')->orderBy('Course','ASC')->pluck('Name','ID'),
            'dc'                    => TOTDC::select('NewCODE','Delivery Channel as Name')->pluck('Name','NewCODE'),
            'result_tot'            => TOT::$result_tot,
            'owner_trainer'         => TOT::$owner_trainer,
            'intervention'          => TOT::$intervention
        ];
        return view('tot.edit')->with($data);
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
        $tot = TOT::findOrFail($id);
        
        $attendees	= collect($request->attendees)->transform(function($attendee) {
			return new TOTTraining($attendee);
		});
       
        $data = $request->except('attendees');
        
        $tot->update($data);
        
        TOTTraining::where('TOT_ID', $tot->ID)->delete();
        $tot->attendees()->saveMany($attendees);
        
        return response()->json([
			'updated'	=> true,
			'id'		=> $tot->id,
		]);
    }

    public function delete(Request $request, $id)
    {
        $tot     = TOT::with('attendees')->findOrFail($id);
        return view('tot.delete', compact('tot'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TOT::destroy($id);
        return redirect()->route('tot.index')->with('message', 'You have succesfully deleted the TOT!' );
    }

    /**
     * DataTables Init
     */
    public function datatable()
    {
        return DataTables::of(TOT::query())
        ->addColumn('TrainingOrg', function($tot) {
            if($tot->trainingProvider):
                return $tot->trainingProvider->{'Name organization_institution'};
            endif;
        })
        ->addColumn('Topic', function($tot) {
            if($tot->course):
                return $tot->course->{'Course'};
            endif;
        })
        ->addColumn('IADC', function($tot) {
            if($tot->course):
                return $tot->course->{'Intervention Area'} . $tot->course->{'Delivery Channel'};
            endif;
        })
        ->addColumn('Attendees', function($tot) {
            return count($tot->attendees);
        })
        ->addColumn('action', function ($tot) {
            $action     = "<a href='".route('tot.edit', ['tot' => $tot->ID])."' class='btn btn-raised btn-sm btn-primary'><i class='ti-pencil'></i></a> ";
            if(\Auth::user()->role == 'Administrator'):
                $action     .= "<a href='".route('tot.delete', ['tot' => $tot->ID])."' class='btn btn-raised btn-sm btn-danger'><i class='ti-trash'></i></a> ";
            endif;
            return $action;
        })
        ->rawColumns(['Photo', 'action'])
        ->make(true);
    }

}
