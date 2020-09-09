<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseSurvey as CourseSurvey;
use App\TrainingProvider as TrainingProvider;
use App\BatchId as BatchId;
use App\Submitter as Submitter;
use DataTables;

class CourseSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('coursesurvey.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'sexes'         => CourseSurvey::$sexes,
            'chooseAnswers' => CourseSurvey::$chooseAnswers,
            'selects'       => CourseSurvey::$selects,
            'chooses'       => CourseSurvey::$chooses,
            'satisfylevel'  => CourseSurvey::$satisfylevel,
            'providers'     => TrainingProvider::select('ID', 'Name organization_institution as Name')->pluck('Name', 'ID'),
            'batchid'       => BatchId::select('ID', 'FullBatchID as Name')->pluck('Name', 'ID'),
            'submitter'       => Submitter::select('ID', 'Full Name as Name')->pluck('Name', 'ID'),
        ];
        return view('coursesurvey.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input      = inputs($request->except('_token', '_method'));
        $coureSurvey = CourseSurvey::create($input);

        return redirect()->route('course-survey.index')->with('message', 'Manual Result has been created'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coureSurvey    = CourseSurvey::findOrFail($id);
        $data       = [
            'coureSurvey'   => $coureSurvey,
        ];

        return view('coursesurvey.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data       = [
            'courseSurvey'  => CourseSurvey::findOrFail($id),
            'providers'     => TrainingProvider::select('ID', 'Name organization_institution as Name')->pluck('Name', 'ID'),
            'sexes'         => CourseSurvey::$sexes,
            'chooseAnswers' => CourseSurvey::$chooseAnswers,
            'selects'       => CourseSurvey::$selects,
            'chooses'       => CourseSurvey::$chooses,
            'satisfylevel'  => CourseSurvey::$satisfylevel,
            'batchid'       => BatchId::select('ID', 'FullBatchID as Name')->pluck('Name', 'ID'),
            'submitter'       => Submitter::select('ID', 'Full Name as Name')->pluck('Name', 'ID'),
        ];

        return view('coursesurvey.edit')->with($data);
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
        $coursesurvey   = CourseSurvey::findOrFail($id);

        $this->validate($request, [

        ]);

        $input  = inputs($request->except(['_method', '_token']));
        //dd($input);

        $coursesurvey->fill($input)->save();

        return redirect()->route('course-survey.edit', $id)->with('message', 'Course Survey has been updated'); 
    }

    public function delete($id)
    {
        $courseSurvey  = CourseSurvey::findOrFail($id);
        return view('coursesurvey.delete', compact('courseSurvey'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CourseSurvey::destroy($id);
        return redirect()->route('course-survey.index')->with('message', 'You have succesfully deleted the Course Survey !' );
    }

    /**
     * DataTables Init
     */
    public function datatable()
    {
        return DataTables::of(CourseSurvey::query())
        ->editColumn('Course Batch ID', function($survey) {
            if($survey->batch):
                return $survey->batch->{'FullBatchID'};
            endif;
        })
        ->editColumn('Training Provider', function ($survey) {
            if($survey->provider):
                return $survey->provider->{'Name organization_institution'};
            endif;
        })
        ->editColumn('Submitter', function($survey) {
            if($survey->submitter):
                return $survey->submitter->{'Full Name'};
            endif;
        })
        ->addColumn('action', function ($survey) {
            $action     = "<a href='".route('course-survey.edit', ['id' => $survey->ID])."' class='btn btn-raised btn-sm btn-primary'><i class='ti-pencil'></i></a> ";
            if(\Auth::user()->role == 'Administrator'):
                $action     .= "<a href='".route('course-survey.delete', ['id' => $survey->ID])."' class='btn btn-raised btn-sm btn-danger'><i class='ti-trash'></i></a> ";
            endif;
            return $action;
        })
        ->rawColumns(['Image', 'action'])
        ->make(true);
    }
}
