<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{TOA, Enterprise, Intervention, TOTDC, RPL, TOTCourse, TrainingProvider, Assessors, TPPTrainer, TOATraining, OMAssessorTOAQ, EnterpriseOwner, TrainerAssessor, EntwithAssessor, EntAssessor};
use DataTables;

class TOAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('toa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'ownerOrTrainers'   => TOA::$ownerOrTrainers,
            'competents'        => TOA::$competents,
            'enterpriseOwners'  => EnterpriseOwner::select('ID', 'Name of enterprise as Name')->pluck('Name', 'ID'),
            'trainingProviders' => TrainingProvider::select('ID', 'Name organization_institution as Name')->pluck('Name', 'ID'),
            'totdc'             => TOTDC::select('NewCODE', 'Delivery Channel as Name')->pluck('Name', 'NewCODE'),
            'Intervention'      => Intervention::select('Intervention Area as Name')->pluck('Name'),
            'course'            => TOTCourse::select('ID','Course as Name')->orderBy('Course','ASC')->pluck('Name','ID'),
            'trainers'          => TPPTrainer::select('ID','Full Name as Name')->pluck('Name','ID'),
            'enterprises'       => Enterprise::select('ID','Name of enterprise as Name')->pluck('Name','ID'),
            'owners'            => OMAssessorTOAQ::all()->groupBy('Enterprise'),
            'assessors'         => Assessors::all()->groupBy('Organisation'),
            'trainerAssessors'  => TrainerAssessor::all()->groupBy('Organisation'),
            'EntwithAssessors'  => EntwithAssessor::select('ID','Name of enterprise as Name')->pluck('Name','ID'),
            'EntAssessors'      => EntAssessor::all()->groupBy('Enterprise link'),
            'types'             => TOATraining::$types
        ];
        return view('toa.create')->with($data);
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
			return new TOATraining($attendee);
        });
        
        $data = $request->except('attendees');
        
        $toa = TOA::create($data);
        $toa->attendees()->saveMany($attendees);
        
        return response()->json([
			'created'	=> true,
			'id'		=> $toa->id,
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
        $toa    = TOA::findOrFail($id);
        $data       = [
            'toa'   => $toa
        ];
        return view('toa.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toa    = TOA::with('attendees')->findOrFail($id);
        $data = [
            'toa'               => $toa,
            'ownerOrTrainers'   => TOA::$ownerOrTrainers,
            'competents'        => TOA::$competents,
            'enterpriseOwners'  => EnterpriseOwner::select('ID', 'Name of enterprise as Name')->pluck('Name', 'ID'),
            'trainingProviders' => TrainingProvider::select('ID', 'Name organization_institution as Name')->pluck('Name', 'ID'),
            'totdc'             => TOTDC::select('NewCODE', 'Delivery Channel as Name')->pluck('Name', 'NewCODE'),
            'Intervention'      => Intervention::select('Intervention Area as Name')->pluck('Name'),
            'course'            => TOTCourse::select('ID','Course as Name')->orderBy('Course','ASC')->pluck('Name','ID'),
            'trainers'          => TPPTrainer::select('ID','Full Name as Name')->pluck('Name','ID'),
            'enterprises'       => Enterprise::select('ID','Name of enterprise as Name')->pluck('Name','ID'),
            'owners'            => OMAssessorTOAQ::all()->groupBy('Enterprise'),
            'assessors'         => Assessors::all()->groupBy('Organisation'),
            'trainerAssessors'  => TrainerAssessor::all()->groupBy('Organisation'),
            'EntwithAssessors'  => EntwithAssessor::select('ID','Name of enterprise as Name')->pluck('Name','ID'),
            'EntAssessors'      => EntAssessor::all()->groupBy('Enterprise link'),
            'types'             => TOATraining::$types
        ];
        return view('toa.edit')->with($data);
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
        $toa = TOA::findOrFail($id);
        
        $attendees	= collect($request->attendees)->transform(function($attendee) {
			return new TOATraining($attendee);
        });
        
        $data = $request->except('attendees');
        
        $toa->update($data);
        
        TOATraining::where('TOA_ID', $toa->ID)->delete();
        $toa->attendees()->saveMany($attendees);
        
        return response()->json([
			'updated'	=> true,
			'id'		=> $toa->id,
		]);
    }

    public function delete(Request $request, $id)
    {
        $toa     = TOA::with('attendees')->findOrFail($id);
        return view('toa.delete', compact('toa'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        toa::destroy($id);
        return redirect()->route('toa.index')->with('message', 'You have succesfully deleted the TOA!' );
    }

    /**
     * DataTables Init
     */
    public function datatable()
    {
        return DataTables::of(TOA::query())
        ->editColumn('Training Orginisation', function($toa) {
            if($toa->provider):
                return $toa->provider->{'Name organization_institution'};
            else:
                return null;
            endif;
        })
        ->editColumn('Course Trained', function($toa) {
            if($toa->course):
                return $toa->course->{'Course'};
            else:
                return null;
            endif;
        })
        ->addColumn('action', function ($toa) {
            $action     = "<a href='".route('toa.edit', ['toa' => $toa->ID])."' class='btn btn-raised btn-sm btn-primary'><i class='ti-pencil'></i></a> ";
            if(\Auth::user()->role == 'Administrator'):
                $action     .= "<a href='".route('toa.delete', ['toa' => $toa->ID])."' class='btn btn-raised btn-sm btn-danger'><i class='ti-trash'></i></a> ";
            endif;
            return $action;
        })
        ->make(true);
    }

}
