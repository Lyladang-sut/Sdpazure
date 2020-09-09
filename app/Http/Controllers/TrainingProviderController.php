<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{TrainingProvider, Assessors, TPPTrainer, AreaOfExpCourse, CourseDivision, DimAreaOfexp, TrainerCoursees, CourseTaught, AddressTrainers};
use App\{CountryTA, ProvinceTA, AddressTrainer};
use App\Address as Address;
use App\TppContact as TppContact;
use DataTables;


class TrainingProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('provider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'type'          => TrainingProvider::$type,
            'sector'        => TrainingProvider::$sector,
            'learner_type'  => TrainingProvider::$learner_type,
            'sex'           => TrainingProvider::$sex,
            'last_grade'    =>TrainingProvider::$last_grade,
            'organisation'  => TrainingProvider::select('ID','Name organization_institution as name')->pluck('name', 'ID'),
            'ta_countries'  => CountryTA::select('Country')->get(),
            'ta_provinces'  => ProvinceTA::select('Province', 'Country')->get()->groupBy('Country'),
            'ta_districts'  => AddressTrainer::select('ID', 'District', 'Province')->get()->groupBy('Province'),
        ];
        return view('Provider.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = inputs($request->except(['_method', '_token', 'Name_organization_institution']));
        $data['Name organization_institution'] = $request->{'Name_organization_institution'};
        $provider = TrainingProvider::create($data);

        if($provider){
            return redirect()->route('provider.edit', $provider->ID);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Provider.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $section = null)
    {
        $provider  = TrainingProvider::with('contacts', 'trainers', 'assessors', 'trainers.experts', 'trainers.courses', 'assessors.experts', 'assessors.courses')->findOrFail($id);  

        $data = [
            'type'          => TrainingProvider::$type,
            'sector'        => TrainingProvider::$sector,
            'learner_type'  => TrainingProvider::$learner_type,
            'sex'           => TrainingProvider::$sex,
            'last_grade'    => TrainingProvider::$last_grade,
            'organisation'  => TrainingProvider::select('ID','Name organization_institution as name')->pluck('name', 'ID'),
            'countries'     => CountryTA::select('Country')->pluck('Country','Country'),
            'ta_countries'  => CountryTA::select('Country')->get(),
            'ta_provinces'  => ProvinceTA::select('Province', 'Country')->get()->groupBy('Country'),
            'ta_districts'  => AddressTrainer::select('ID', 'District', 'Province')->get()->groupBy('Province'),
            'provider'      => $provider,
            'provinces'     => Address::distinct()->select('Province')->pluck('Province', 'Province')->prepend('Choose'),
            'districts'     => AddressTrainers::pluck('District', 'ID'),
            'AreaOfExpCourse' => AreaOfExpCourse::all(),
            'CourseDivision' => CourseDivision::all()->groupBy('Area of exp course Type'),
            'DimAreaOfexp' => DimAreaOfexp::all()->groupBy('Division'),
            'TrainerCoursees' => TrainerCoursees::all(),
        ];

        return view('Provider.edit')->with($data);
    
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
        $provider = TrainingProvider::findOrFail($id);
        
        // Get Reqeuest Data, excepts Relationship 
        $data = $request->except('contacts', 'trainers', 'assessors');
        // Update Action
        $provider->update($data);

        return response()->json([
			'updated'	=> true,
        ]);
    
    }

    public function delete($id)
    {
        $provider     = TrainingProvider::findOrFail($id);
        return view('provider.delete', compact('provider'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TrainingProvider::destroy($id);
        return redirect()->route('provider.index')->with('message', 'You have succesfully deleted the TRAINING PROVIDER!' );
    }

    /**
     * DataTables Init
     */
    public function datatable()
    {
        return DataTables::of(TrainingProvider::query())
            ->addColumn('Location', function($provider) {
                return $provider->{'Country'};
            })
            ->addColumn('action', function ($provider) {
                $action     = "<a href='".route('provider.edit', ['provider' => $provider->ID])."' class='btn btn-raised btn-sm btn-primary'><i class='ti-pencil'></i></a> ";
                if(\Auth::user()->role == 'Administrator'):
                    $action     .= "<a href='".route('provider.delete', ['provider' => $provider->ID])."' class='btn btn-raised btn-sm btn-danger'><i class='ti-trash'></i></a> ";
                endif;
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
