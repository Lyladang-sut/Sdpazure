<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{HouseHold, Trainee, Address, Coursecode, TrainingProvider, CourseTopic, EmploymentStatus, EmploymentType};

class HouseholdController extends Controller
{
    public function create($id)
    {
        $provinces              = Address::distinct()->select('Province')->pluck('Province', 'Province');
            $provinces              = $provinces->prepend('Choose');
            $coursecodes            = Coursecode::select('ID', 'Course combined as Name')->pluck('Name', 'ID');
            
            $data = [
                'trainee'           => Trainee::findOrFail($id),
                'household'         => Trainee::findOrFail($id)->household,
                'visits'            => Trainee::$visits, 
                'householdmembers'  => Trainee::$householdmembers,
                'workmembers'       => Trainee::$workmembers,
                'languages'         => Trainee::$languages,
                'materials'         => Trainee::$materials,
                'roofmaterials'     => Trainee::$roofmaterials,
                'cdplayers'         => Trainee::$cdplayers,
                'institutions'      => TrainingProvider::distinct()->select('ID', 'Name organization_institution as Name')->pluck('Name', 'ID'),
                'answers'           => Trainee::$answers,
                'yesornos'          => Trainee::$yesornos,
                'cousetopics'       => CourseTopic::select('Course combined as Name')->pluck('Name', 'Name'),
                'coursecodes'       => $coursecodes,
                'totalormonthly'    => Trainee::$totalormonthly,
                'chooses'           => Trainee::$chooses,
                'abilities'         => Trainee::$abilities,
                'jobs'              => Trainee::$jobs,
                'employmentStatuses'=> EmploymentStatus::select('ID', 'Combined')->pluck('Combined', 'ID'),
                'employmentTypes'   => EmploymentType::select('Unemp ID as ID', 'Combined')->pluck('Combined', 'ID'),
            ];

        return view('trainee.household.create')->with($data);
    }

    public function update(Request $request)
    {
        $household = HouseHold::updateOrCreate(
            [ 'Personal ID' => $request->{'Personal ID'}],
            $request->all()
        );

        return response()->json([
            'updated'	=> true,
        ]);
    }
}
