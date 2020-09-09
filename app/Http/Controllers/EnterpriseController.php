<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Enterprise, Province, District, Commune, Address, Submitter, Intervention};
use App\DimActivity as Activity;
use App\{CountryTA, ProvinceTA, AddressTrainer};
use App\AddressTrainers as AddressTrainers;
use App\AreaOfExpCourse as AreaOfExpCourse;
use App\CourseDivision  as CourseDivision;
use App\DimAreaOfexp as DimAreaOfexp;
use App\TrainerCoursees as TrainerCoursees;

use DataTables;

class EnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'provinces'     => \App\Province::all(),
            'districts'     => \App\District::select('District', 'Province')->get()->groupBy('Province'),
            'interventions' => Intervention::select('Code', 'ID')->get(),
            'activities'    => Activity::select('Activity', 'ID')->get(),
        ];

        return view('enterprise.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Address::distinct()->select('Province')->pluck('Province', 'Province');
        $provinces = $provinces->prepend('Choose');
        
        $data   = [
            'allEnterprices'   => Enterprise::select('Name of enterprise')->get(),
            'activities'    => Activity::pluck('Activity', 'ID'),
            'sectors'       => Enterprise::$sectors,
            'licenses'      => Enterprise::$licenses,
            'provinces'     => $provinces,
            'yes_no'        => Enterprise::$yes_no,
            'sdp_skills'    => Enterprise::$sdp_skills,
            'loops'         => Enterprise::loops(1, 10),
            'provinces'     => Province::select('Province')->get(),
            'districts'     => District::select('District', 'Province')->get()->groupBy('Province'),
            'communes'      => Commune::select('Commune', 'District')->get()->groupBy('District'),
            'villages'      => Address::select('ID', 'Village', 'Commune')->get()->groupBy('Commune'),
            'interventions' => Intervention::pluck('Code', 'ID'),
            'submitters'    => Submitter::select('ID', 'Full Name as Name')->orderBy('Full Name', 'ASC')->pluck('Name', 'ID'),
        ];

       

        return view('enterprise.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data    = $request->except(['employments', 'contacts', 'assessors', 'recruitments']);
        $enterprise     = Enterprise::create($data);

        return response()->json([
            'created'	=> true,
            'id'        => $enterprise->ID,
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
        $enterprise     = Enterprise::findOrFail($id);
        //dd($enterprise);
        $data           = [
            'enterprise'    => $enterprise,
            
        ];
        return view('enterprise.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $section = null)
    {
        $enterprise     = Enterprise::with('employments','contacts', 'assessors', 'assessors.experts', 'assessors.courses', 'recruitments')->findOrFail($id);
        if($section == null):
            $data           = [
                'allEnterprices'   => Enterprise::select('Name of enterprise')->where('id', '!=', $id)->get(),
                'enterprise'    => $enterprise,
                'activities'    => Activity::pluck('Activity', 'ID'),
                'sectors'       => Enterprise::$sectors,
                'licenses'      => Enterprise::$licenses,
                'provinces'     => Address::distinct()->select('Province')->pluck('Province', 'Province'),
                'districts'     => Address::distinct()->select('Province', 'District')->where('Province', $enterprise->Province)->pluck('District', 'District'),
                'communes'      => Address::distinct()->select('Commune')->where('Province', $enterprise->Province)->where('District', $enterprise->District)->pluck('Commune', 'Commune'),
                'villages'      => Address::distinct()->select('ID', 'Village')->where('Province', $enterprise->Province)->where('District', $enterprise->District)->where('Commune', $enterprise->Commune)->pluck('Village', 'ID'),
                'yes_no'        => Enterprise::$yes_no,
                'sdp_skills'    => Enterprise::$sdp_skills,
                'loops'         => Enterprise::loops(1, 10),
                'provinces'     => Province::select('Province')->get(),
                'districts'     => District::select('District', 'Province')->get()->groupBy('Province'),
                'communes'      => Commune::select('Commune', 'District')->get()->groupBy('District'),
                'villages'      => Address::select('ID', 'Village', 'Commune')->get()->groupBy('Commune'),
                'ta_countries'  => CountryTA::select('Country')->get(),
                'ta_provinces'  => ProvinceTA::select('Province', 'Country')->get()->groupBy('Country'),
                'ta_districts'  => AddressTrainer::select('ID', 'District', 'Province')->get()->groupBy('Province'),
                'sex'           => Enterprise::$sex,
                'last_grade'    => Enterprise::$last_grade,
                'AreaOfExpCourse'   => AreaOfExpCourse::all(),
                'CourseDivision'    => CourseDivision::all()->groupBy('Area of exp course Type'),
                'DimAreaOfexp'      => DimAreaOfexp::all()->groupBy('Division'),
                'TrainerCoursees'   => TrainerCoursees::all(),
                'interventions' => Intervention::pluck('Code', 'ID'),
                'submitters'    => Submitter::select('ID', 'Full Name as Name')->orderBy('Full Name', 'ASC')->pluck('Name', 'ID'),
                
            ];
            return view('enterprise.edit')->with($data);
        elseif($section == 'employment'):
            return "employment";
        endif;
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
        $enterprise     = Enterprise::findOrFail($id);
        $data    = $request->except(['employments', 'contacts', 'assessors', 'recruitments']);

        $enterprise->update($data);
        return response()->json([
            'updated'	=> true,
        ]);
    }

    public function delete($id)
    {
        $enterprise     = Enterprise::findOrFail($id);
        return view('enterprise.delete', compact('enterprise'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Enterprise::destroy($id);
        return redirect()->route('enterprise.index')->with('message', 'You have succesfully deleted the Enterprise!' );
    }

    /**
     * DataTables Init
     */
    public function datatable(Request $request)
    {

        if(\Auth::user()->role == 'User'):
            if($request->input('intervention') == '%'):
                $filter = [
                    ['Province', 'LIKE', $request->input('province')], 
                    ['District', 'LIKE', $request->input('district')], 
                    ['Hired graduates', 'LIKE', $request->input('hire')], 
                    ['RPL participant', 'LIKE', $request->input('rpl')], 
                    ['Enterprise involved in SDP training', 'LIKE', $request->input('giving')], 
                    ['Activity', 'LIKE', $request->input('activity')]
                ];
            else:
                $filter = [
                    ['Province', 'LIKE', $request->input('province')], 
                    ['District', 'LIKE', $request->input('district')], 
                    ['If Yes, Which', 'LIKE', $request->input('intervention')], 
                    ['Hired graduates', 'LIKE', $request->input('hire')], 
                    ['RPL participant', 'LIKE', $request->input('rpl')], 
                    ['Enterprise involved in SDP training', 'LIKE', $request->input('giving')], 
                    ['Activity', 'LIKE', $request->input('activity')]
                ];   
            endif;
            $enterprises   = Enterprise::whereHas('submitter', function ($query) {
                $query->where('Training Provider', '=', \Auth::user()->{'Training Provider'});
            })->where($filter)->get();
        else: 
            if($request->input('intervention') == '%'):
                $filter = [
                    ['Province', 'LIKE', $request->input('province')], 
                    ['District', 'LIKE', $request->input('district')], 
                    ['Hired graduates', 'LIKE', $request->input('hire')], 
                    ['RPL participant', 'LIKE', $request->input('rpl')], 
                    ['Enterprise involved in SDP training', 'LIKE', $request->input('giving')], 
                    ['Activity', 'LIKE', $request->input('activity')]
                ];
            else:
                $filter = [
                    ['Province', 'LIKE', $request->input('province')], 
                    ['District', 'LIKE', $request->input('district')], 
                    ['If Yes, Which', 'LIKE', $request->input('intervention')], 
                    ['Hired graduates', 'LIKE', $request->input('hire')], 
                    ['RPL participant', 'LIKE', $request->input('rpl')], 
                    ['Enterprise involved in SDP training', 'LIKE', $request->input('giving')], 
                    ['Activity', 'LIKE', $request->input('activity')]
                ];   
            endif;
            $enterprises   = Enterprise::where($filter)->get(); 
        endif;

        //$enterprises   = Enterprise::all();
        $activities    = Activity::pluck('Activity', 'ID');

        return DataTables::of($enterprises)
        ->addColumn('Location', function($enterprise) {
            return $enterprise->District ." ". $enterprise->Province;
        })
        ->editColumn('Activity', function($enterprise) use ($activities){
            if($enterprise->Activity){
                return $activities[$enterprise->Activity];
            }else{
                return null;
            }
        })
        ->addColumn('IADC', function($enterprise) {
            if($enterprise->intervention){
                return $enterprise->intervention->{'Intervention Area'}.$enterprise->intervention->{'Delivery Channel'};
            }
        })
        ->addColumn('action', function ($enterprise) {
            $action     = "<a href='".route('enterprise.edit', ['enterprise' => $enterprise->ID])."' class='btn btn-raised btn-sm btn-primary'><i class='ti-pencil'></i></a> ";
            if(\Auth::user()->role == 'Administrator'):
                $action     .= "<a href='".route('enterprise.delete', ['enterprise' => $enterprise->ID])."' class='btn btn-raised btn-sm btn-danger'><i class='ti-trash'></i></a> ";
            endif;
            return $action;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

}
