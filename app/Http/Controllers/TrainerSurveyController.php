<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{TrainerSurvey, TPPTrainer};
use App\BatchCourseCode as BatchCourseCode;
use App\TrainingProvider as TrainingProvider;
use DataTables;

class TrainerSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trainer-survey-learners.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $batch = BatchCourseCode::select('ID', 'FullBatchID as Name')->pluck('Name', 'ID');
        $training_provider = TrainingProvider::select('ID', 'Name organization_institution as Name')->pluck('Name', 'ID');
        $data = [
            'batch'             => $batch,
            'training_provider' => $training_provider,
            'select_anwser'     => TrainerSurvey::$select_anwser ,
            'subject_trainer'   => TrainerSurvey::$subject_trainer, 
            'score'             => TrainerSurvey::$score
        ];
        return view('trainer-survey-learners.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trainerSurvey = TrainerSurvey::findOrFail($id);
        $batch = BatchCourseCode::select('ID', 'FullBatchID as Name')->pluck('Name', 'ID');
    
        $data = [
            'trainerSurvey' => $trainerSurvey,
            'batch'         => $batch,
        ];
        
        return view('trainer-survey-learners.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $batch = BatchCourseCode::select('ID', 'FullBatchID as Name')->pluck('Name', 'ID');
        $training_provider = TrainingProvider::select('ID', 'Name organization_institution as Name')->pluck('Name', 'ID');
        $data       = [

            'trainerSurvey'  => TrainerSurvey::findOrFail($id),
            'batch'             => $batch,
            'training_provider' => $training_provider,
            'trainers'          => TPPTrainer::select('Organisation', 'ID', 'Full Name as Name')->get()->groupBy('Organisation'),
            'select_anwser'     => TrainerSurvey::$select_anwser ,
            'subject_trainer'   => TrainerSurvey::$subject_trainer, 
            'score'             => TrainerSurvey::$score

        ];

        return view('trainer-survey-learners.edit')->with($data);
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
        $trainerSurvey   = TrainerSurvey::findOrFail($id);

        $this->validate($request, [

        ]);

        $input  = inputs($request->except(['_method', '_token']));

        $trainerSurvey->fill($input)->save();

        return redirect()->route('trainer-survey.edit', $id)->with('message', 'Trainer Survey Learners has been updated'); 
    }

    public function delete($id)
    {
        $trainerSurvey     = TrainerSurvey::findOrFail($id);
        return view('trainer-survey-learners.delete', compact('trainerSurvey'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TrainerSurvey::destroy($id);
        return redirect()->route('trainer-survey.index')->with('message', 'You have succesfully deleted the Trainer Survey !' );
    }

    /**
     * DataTables Init
     */
    public function datatable()
    {
        return DataTables::of(TrainerSurvey::query())
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
        ->editColumn('Name Of Trainer', function($survey) {
            if($survey->trainer):
                return $survey->trainer->{'Full Name'};
            endif;
        })
        ->editColumn('Submitter', function($survey) {
            if($survey->submitter):
                return $survey->submitter->{'Full Name'};
            endif;
        })
        ->addColumn('action', function ($survey) {
            $action     = "<a href='".route('trainer-survey.edit', ['id' => $survey->ID])."' class='btn btn-raised btn-sm btn-primary'><i class='ti-pencil'></i></a> ";
            if(\Auth::user()->role == 'Administrator'):
                $action     .= "<a href='".route('trainer-survey.delete', ['id' => $survey->ID])."' class='btn btn-raised btn-sm btn-danger'><i class='ti-trash'></i></a> ";
            endif;
            return $action;
        })
        ->rawColumns(['Image', 'action'])
        ->make(true);
    }

}
