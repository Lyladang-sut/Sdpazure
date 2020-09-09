<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Trainee, CourseLocationOpen, BatchOpen, TrainingAccessed, TATPP, Enterprise, Industry, PostTrainingSupport, PostTrainingEmployment};
use App\{HouseHold, Submitter};
use App\RegistrationData as RegistrationData;
use App\EthnicGroup as EthnicGroup;
use App\{Province, District, Commune, Address};
use App\TrainingProvider as TrainingProvider;
use App\CourseTopic as CourseTopic;
use App\CourseCode as Coursecode;
use App\DimCertificateReceived as DimCertificateReceived;
use App\EmploymentStatus as EmploymentStatus;
use App\EmploymentType as EmploymentType;
use App\EmpRegistration as EmpRegistration;
use App\DimSupportType as DimSupportType;
use App\DimTargetJob as DimTargetJob;
use App\EnterpriseProvince;
use App\Traits\UploadImage;
use DataTables;

class TraineeController extends Controller
{
    
    use UploadImage;
    private $upload_path = 'storage/';
    private $prefix_name = '_trainee_image';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'institutions'  => \App\TrainingProvider::all(),
            'courses'       => \App\CourseTopic::all(),
            'provinces'     => \App\Province::all(),
            'districts'     => \App\District::select('District', 'Province')->get()->groupBy('Province'),
            'batches'       => \App\BatchId::all(),
        ];
        return view('trainee.index')->with($data);
    }

    /**
     * 
     */
    public function getExistedTrainee(Request $request)
    {
        $trainee = Trainee::select('Personal ID')->get();
        $fname = ucfirst($request['fname']);
        $fmname = ucfirst($request['fmname']);
        $sex = ucfirst($request['sex']);
        $province = ucfirst($request['Province']);
        $district = ucfirst($request['District']);
        $commune = ucfirst($request['Commune']);
        $dob = ucfirst($request['Date Of Birth']);
        $sex_explode = explode('/', $sex);
        $dob_explode = explode('-', $dob);
        $dob_concate = $dob_explode[0] . $dob_explode[1] . $dob_explode[2];
        $strpid = substr($fname, 0, 1) . substr($fmname, 0, 1) . substr($sex_explode[1], 0, 1) . substr($province, 0, 1) . substr($district, 0, 1) . substr($commune, 0, 1) . $dob_concate;
        foreach ($trainee as $value) {
            if ($value->{'Personal ID'} == $strpid) {
                $status = true;
                break;
            } else {
                $status = false;
            }
        }
        return response()->json(['existed_status' => $status]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces              = Address::distinct()->select('Province')->pluck('Province', 'Province');
        $provinces              = $provinces->prepend('Choose');
        $coursecodes            = Coursecode::select('ID', 'Course combined as Name')->pluck('Name', 'ID');
        
        $trainee_type = array(
            'Disadvantage youth (DVT and full-time)' => 'Disadvantage youth (DVT and full-time)',
            'Low-skilled worker (IHT, HCP)' => 'Low-skilled worker (IHT, HCP)'
        );

        $data = [
            'sexes'             => Trainee::$sexes,
            'maritals'          => Trainee::$maritals,
            'ethnics'           => Trainee::$ethnics,
            'ethnicGroups'      => EthnicGroup::options(),
            'provinces'                 => Province::select('Province')->get(),
            'districts'                 => District::select('District', 'Province')->get()->groupBy('Province'),
            'communes'                  => Commune::select('Commune', 'District')->get()->groupBy('District'),
            'villages'                  => Address::select('ID', 'Village', 'Commune')->get()->groupBy('Commune'),
            'relationships'     => Trainee::$relationships,
            'educationlevels'   => Trainee::$educationlevels,
            'childs'            => Trainee::$childs,
            'numchildrens'      => Trainee::$numchildrens,
            'poorid'            => Trainee::$poorid,
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
            'cousetopics'       => CourseTopic::select('Course code as Code', 'Course combined as Name')->pluck('Name', 'Code'),
            'coursecodes'       => CourseCode::all()->groupBy('Course code'),
            'totalormonthly'    => Trainee::$totalormonthly,
            'chooses'           => Trainee::$chooses,
            'abilities'         => Trainee::$abilities,
            'jobs'              => Trainee::$jobs,
            'jobAfters'         => Trainee::$jobAfters,
            'employmentStatuses' => EmploymentStatus::select('ID', 'Combined')->pluck('Combined', 'ID'),
            'employmentTypes'   => EmploymentType::select('Unemp ID as ID', 'Combined')->pluck('Combined', 'ID'),
            'dimSupportTypes'   => DimSupportType::select('ID', 'Support Combined as Name')->pluck('Name', 'ID'),
            'dimCertificateRecieved'    => DimCertificateReceived::select('ID', 'Combined')->pluck('Combined', 'ID'),
            'dimTargetJob'      => DimTargetJob::select('ID', 'Combined Job as Name')->pluck('Name', 'ID'),
            'IdTypes'           => EmpRegistration::$idTypes,
            'trainee_type'      => $trainee_type,
            'submitters'    => Submitter::select('ID', 'Full Name as Name')->orderBy('Full Name', 'ASC')->pluck('Name', 'ID'),
        ];

        return view('trainee.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = inputs($request->except(['Image', 'image', 'Unemployment_Other', '_method', '_token']));

        if ($request->hasFile('image')) {
            $datastring = file_get_contents($request->file('image')->getRealPath());
            $data         = unpack("H*hex", $datastring);
            $data         = '0x' . $data['hex'];
            $photoName = $this->uploadImage($request->file('image'), $this->upload_path, $this->prefix_name);
            $photo = \App\TraineeImage::create(['Image' =>  \DB::raw("CONVERT(VARBINARY(MAX), $data) "), 'photo' => $photoName]);
            $input['Photo'] = $photo->ID;
        }

        $trainee                 = Trainee::updateOrCreate($input);


        return redirect()->route('trainee.edit', [$trainee->ID])->with('message', 'Successfully Created New Trainee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trainee    = Trainee::findOrFail($id);
        $data       = [
            'trainee'   => $trainee
        ];
        return view('trainee.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $section = null)
    {
        if ($section == null) :
            $trainee = Trainee::with('household', 'registration')->findOrFail($id);

            $trainee_type = array(
                'Disadvantage youth (DVT and full-time)' => 'Disadvantage youth (DVT and full-time)',
                'Low-skilled worker (IHT, HCP)' => 'Low-skilled worker (IHT, HCP)'
            );

            $data                           = [
                'trainee'                   => $trainee,
                'sexes'                     => Trainee::$sexes,
                'maritals'                  => Trainee::$maritals,
                'ethnics'                   => Trainee::$ethnics,
                'ethnicGroups'              => EthnicGroup::options(),
                'provinces'                 => Province::select('Province')->get(),
                'districts'                 => District::select('District', 'Province')->get()->groupBy('Province'),
                'communes'                  => Commune::select('Commune', 'District')->get()->groupBy('District'),
                'villages'                  => Address::select('ID', 'Village', 'Commune')->get()->groupBy('Commune'),
                'relationships'             => Trainee::$relationships,
                'educationlevels'           => Trainee::$educationlevels,
                'childs'                    => Trainee::$childs,
                'numchildrens'              => Trainee::$numchildrens,
                'poorid'                    => Trainee::$poorid,
                'employmentStatuses'        => EmploymentStatus::select('ID', 'Combined')->pluck('Combined', 'ID'),
                'employmentTypes'           => EmploymentType::select('Unemp ID as ID', 'Combined')->pluck('Combined', 'ID'),
                'chooses'                   => Trainee::$chooses,
                'yesornos'                  => Trainee::$yesornos,
                'abilities'                 => Trainee::$abilities,
                'dimCertificateRecieved'    => DimCertificateReceived::select('ID', 'Combined')->pluck('Combined', 'ID'),
                'coursetopics'              => CourseTopic::select('Course code as Code', 'Course combined as Name')->pluck('Name', 'Code'),
                'coursecodes'               => Coursecode::all()->groupBy('Course code'),
                'courselocations'           => CourseLocationOpen::all()->groupBy('ID'),
                'batchopens'                => BatchOpen::all()->groupBy('Total'),
                'providers'                 => TATPP::all(),
                'enterprises'               => Enterprise::all(),
                'industries'                => Industry::all(),
                'province'                  => Province::all(),
                'dimSupportTypes'   => DimSupportType::select('ID', 'Support Combined as Name')->pluck('Name', 'ID'),
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
                'coursecodes'       => Coursecode::select('ID', 'Course combined as Name')->pluck('Name', 'ID'),
                'totalormonthly'    => Trainee::$totalormonthly,
                'chooses'           => Trainee::$chooses,
                'abilities'         => Trainee::$abilities,
                'jobs'              => Trainee::$jobs,
                'employmentStatuses' => EmploymentStatus::select('ID', 'Combined')->pluck('Combined', 'ID'),
                'employmentTypes'   => EmploymentType::select('Unemp ID as ID', 'Combined')->pluck('Combined', 'ID'),
                'registration'      => Trainee::findOrFail($id)->registration,
                'totalormonthly'    => Trainee::$totalormonthly,
                'jobAfters'         => Trainee::$jobAfters,
                'yesornos'          => Trainee::$yesornos,
                'employmentStatuses' => EmploymentStatus::select('ID', 'Combined')->pluck('Combined', 'ID'),
                'employmentTypes'   => EmploymentType::select('Unemp ID as ID', 'Combined')->pluck('Combined', 'ID'),
                'dimTargetJob'      => DimTargetJob::select('ID', 'Combined Job as Name')->pluck('Name', 'ID'),
                'IdTypes'           => EmpRegistration::$idTypes,
                'trainee_type'      => $trainee_type,
                'submitters'    => Submitter::select('ID', 'Full Name as Name')->orderBy('Full Name', 'ASC')->pluck('Name', 'ID'),
            ];

            return view('trainee.edit')->with($data);

        elseif ($section == 'training') :

            $data = [
                'trainee'           => $id,
                'provinces'         => EnterpriseProvince::select('Province')->get(),
                'trainings'         => TrainingAccessed::where('Personal ID', $id)->get(),
                'coursetopics'      => CourseTopic::select('Course code as Code', 'Course combined as Name')->pluck('Name', 'Code'),
                'coursecodes'       => Coursecode::all()->groupBy('Course code'),
                'courselocations'   => CourseLocationOpen::all()->groupBy('ID'),
                'batchopens'        => BatchOpen::all()->groupBy('Total'),
                'providers'         => TATPP::all(),
                'enterprises'       => Enterprise::orderBy('Name of enterprise', 'ASC')->get()->groupBy('Province'),
                'industries'        => Industry::select('Full Name', 'ID', 'Enterprise')->get()->groupBy('Enterprise'),
                'employmentStatuses' => EmploymentStatus::select('ID', 'Combined')->pluck('Combined', 'ID'),
                'statuses'          => Trainee::$statuses,
                'reasonDropOut'     => Trainee::$reasonDropOut,
                'yesornos'          => Trainee::$yesornos,
                'chooses'           => Trainee::$chooses,
                'abilities'         => Trainee::$abilities,
                'jobs'              => Trainee::$jobs,
                'dimCertificateRecieved'    => DimCertificateReceived::select('ID', 'Combined')->pluck('Combined', 'ID'),
            ];

            return view('trainee.training')->with($data);

        elseif ($section == 'support') :
            $listreasonUmEmp = array(
                '1' => 'គ្មានឱកាសការងារនៅក្បែផ្ទះរបស់ខ្ញុំ/No job opportunity near my home.',
                '2' => 'មិនមានជំនាញគ្រប់គ្រាន់ដើម្បីទទួលបានមុខរបរ(សូមបញ្ជាក់បន្ថែម)/Not enough skills to get a job (specify)',
                '3' => 'គ្មានអ្នកទំនាក់ទំនង ឬ បណ្តាញអ្នកស្គាល់ / No contacts/ network',
                '4' => 'គ្មាន ពត៏មានអំពីការងារ/No employment information',
                '5'=> 'មិនមានការគាំទ្រដើម្បីចូលរួមជាមួយសហគ្រាស / ជាមួយឱកាសការងារ/ No support to engage with enterprises/ with job opportunities',
                '6' => 'សមាជិក គ្រួសារមានជំងឺ ឬ ជំងឺ ផ្ទាល់ខ្លួន/ Sickness of family member/ myself',
                '7' => 'រៀបអាពាហ៍ពិពាហ៍/ Marriage',
                '8' => 'មានផ្ទៃពោះ ឬ មានកូន Pregnancy/ children',
                '9' => 'បានបន្តការសិក្សា/Continued studying' ,
                '10' => 'ការធ្វើចំណាកស្រុក/ Migration',
                '11' => 'ផ្សេងៗ(សូមបញ្ជាក់បន្ថែម)'
            );
            $data = [
                'trainee'           => $id,
                'supports'          => PostTrainingSupport::where('Personal ID', $id)->get(),
                'employments'       => PostTrainingEmployment::where('Personal ID', $id)->get(),
                'employmentStatuses' => EmploymentStatus::select('ID', 'Combined')->pluck('Combined', 'ID'),
                'employmentTypes'   => EmploymentType::select('Unemp ID as ID', 'Combined')->pluck('Combined', 'ID'),
                'dimTargetJob'      => DimTargetJob::select('ID', 'Combined Job as Name')->pluck('Name', 'ID'),
                'dimSupportTypes'   => DimSupportType::select('ID', 'Support Combined as Name')->pluck('Name', 'ID'),
                'yesornos'          => Trainee::$yesornos,
                'listUnemployment'  => $listreasonUmEmp,
                'coursetopics'      => CourseTopic::select('Course code as Code', 'Course combined as Name')->pluck('Name', 'Code'),
                'coursecodes'       => Coursecode::all()->groupBy('Course code'),
                'courselocations'   => CourseLocationOpen::all()->groupBy('ID'),
                'batchopens'        => BatchOpen::all()->groupBy('Total'),
                'providers'         => TATPP::all(),
                'enterprises'       => Enterprise::all(),
                'industries'        => Industry::all(),
                'province'          => Province::all(),
            ];

            return view('trainee.support')->with($data);

        elseif ($section == 'follow') :

            $provinces              = Address::distinct()->select('Province')->pluck('Province', 'Province');
            $provinces              = $provinces->prepend('Choose');
            $coursecodes            = Coursecode::select('ID', 'Course combined as Name')->pluck('Name', 'ID');

            $data = [
                'trainee'           => Trainee::findOrFail($id),
                'sexes'             => Trainee::$sexes,
                'maritals'          => Trainee::$maritals,
                'ethnics'           => Trainee::$ethnics,
                'ethnicGroups'      => EthnicGroup::options(),
                'provinces'         => $provinces,
                'relationships'     => Trainee::$relationships,
                'educationlevels'   => Trainee::$educationlevels,
                'childs'            => Trainee::$childs,
                'numchildrens'      => Trainee::$numchildrens,
                'poorid'            => Trainee::$poorid,
                'employmentStatuses' => EmploymentStatus::select('ID', 'Combined')->pluck('Combined', 'ID'),
                'employmentTypes'   => EmploymentType::select('Unemp ID as ID', 'Combined')->pluck('Combined', 'ID'),
            ];

            return view('trainee.follow')->with($data);

        else :

            return redirect()->route('404');

        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $section = null)
    {
        $trainee    = Trainee::findOrFail($id);

        $data       = $request->except(['Image', 'household', 'registration', 'support_employments', 'training_accesses', 'training_supports']);

        $trainee->update($data);

        if ($request->input('Image')) {
            $datastring = file_get_contents($request->input('Image'));
            $data         = unpack("H*hex", $datastring);
            $data         = '0x' . $data['hex'];
           
            $photoName = $this->uploadImageBase64($request->Image, $this->upload_path, $this->prefix_name);

            if ($trainee->Photo === null) {
                $photo = \App\TraineeImage::create(
                    ['Image' =>  \DB::raw("CONVERT(VARBINARY(MAX), $data) "), 'photo' => $photoName]
                );

                $trainee->update(['Photo' => $photo->ID]);
            } else {
                $photo = $trainee->image->update(
                    ['Image' =>  \DB::raw("CONVERT(VARBINARY(MAX), $data) "), 'photo' => $photoName]
                );
            }
        }

        // if( count($request->input('household')) > 0){
        //     $household = HouseHold::updateOrCreate(
        //         [ 'Personal ID' => $trainee->ID],
        //         $request->input('household')
        //     );
        // }
        // if( count($request->input('registration')) > 0){
        //     $registration = RegistrationData::updateOrCreate(
        //         [ 'Application ID' => $trainee->ID],
        //         $request->input('registration')
        //     );
        // }

        return response()->json([
            'updated'    => true,
        ]);
    }

    public function registrationUpdate(Request $request, $id, $section = null)
    {
        $trainee    = Trainee::findOrFail($id);

        if (count($request->input('registration')) > 0) {
            $registration = RegistrationData::updateOrCreate(
                ['Application ID' => $trainee->ID],
                $request->input('registration')
            );
        }

        return response()->json([
            'updated'    => true,
        ]);
    }

    public function householdUpdate(Request $request, $id, $section = null)
    {
        $trainee    = Trainee::findOrFail($id);

        if (count($request->input('household')) > 0) {
            $household = HouseHold::updateOrCreate(
                ['Personal ID' => $trainee->ID],
                $request->input('household')
            );
        }

        return response()->json([
            'updated'    => true,
        ]);
    }

    public function registration(Request $request)
    {
        $registration = RegistrationData::updateOrCreate(
            ['Application ID' => $request->{'Application ID'}],
            $request->except('Full Time Employment Level (FTE)', 'Average income', 'Full Income')
        );

        return response()->json([
            'updated'    => true,
        ]);
    }

    public function delete($id)
    {
        $trainee    = Trainee::findOrFail($id);
        return view('trainee.delete', compact('trainee'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainee = Trainee::findOrFail($id);

        $trainee->household()->delete();
        $trainee->registration()->delete();
        $trainee->delete();

        return redirect()->route('trainee.index')->with('message', 'You have succesfully deleted the TRAINEE!');
    }

    /**
     * DataTables Init
     */
    public function datatable(Request $request)
    {
        ini_set('MAX_EXECUTION_TIME', -1);
        if (\Auth::user()->role == 'User') :
            //     $organization  = \Auth::user()->{'Training Provider'};
            //     $submitters = \App\TrainingProvider::findOrFail($organization)->submitters;
            //     //dd($submitters->pluck('ID')->toArray());
            //     $trainees   = Trainee::whereIn('Submitter', $submitters->pluck('ID')->toArray())->get();
            if ($request->input('institution') != '%' || $request->input('course') != '%' || $request->input('batchid') != '%') :
                $trainees   = Trainee::with("trainingAccesses.courses")->whereHas('submitter', function ($query) {
                    $query->where('Training Provider', '=', \Auth::user()->{'Training Provider'});
                })->whereHas("trainingAccesses", function ($q) use ($request) {
                    $q->where([["Training Provider", "LIKE", $request->input('institution')], ["Course Topic", "LIKE", $request->input('course')], ["Batch Number", "LIKE", $request->input('batchid')]]);
                })->where([['Province', 'LIKE', $request->input('province')], ['District', 'LIKE', $request->input('district')]]);
            else :
                $trainees   = Trainee::whereHas('submitter', function ($query) {
                    $query->where('Training Provider', '=', \Auth::user()->{'Training Provider'});
                })->where([['Province', 'LIKE', $request->input('province')], ['District', 'LIKE', $request->input('district')]]);
            endif;

        else :
            if ($request->input('institution') != '%' || $request->input('course') != '%' || $request->input('batchid') != '%') :
                $trainees   = Trainee::with("trainingAccesses.courses")->whereHas("trainingAccesses", function ($q) use ($request) {
                    $q->where([["Training Provider", "LIKE", $request->input('institution')], ["Course Topic", "LIKE", $request->input('course')], ["Batch Number", "LIKE", $request->input('batchid')]]);
                })->where([['Province', 'LIKE', $request->input('province')], ['District', 'LIKE', $request->input('district')]]);
            else :
                $trainees   = Trainee::where([['Province', 'LIKE', $request->input('province')], ['District', 'LIKE', $request->input('district')]]);
            endif;
        endif;

        return DataTables::eloquent($trainees)
            ->addColumn('Image', function ($trainee) {
                if ($trainee->Photo !== NULL && $trainee->image) :
                    $image = $trainee->image->photo;
                    return "<img src='" . $image . "' class='avatar img-thumbnail' style='width:80px; height: auto;'/>";
                else :
                    $image = \URL::to('') . "/images/default.png";
                    return "<img src='" . $image . "' class='avatar img-thumbnail' style='width:80px; height: auto;'/>";
                endif;
            })
            ->addColumn('Course', function ($trainee) {
                if (count($trainee->trainingAccesses) > 0) {
                    return ($trainee->trainingAccesses[0]->courses->Course) ?? '';
                }
            })
            ->addColumn('Status', function ($trainee) {
                if (count($trainee->trainingAccesses) > 0) {
                    return $trainee->trainingAccesses[0]->{'Status'};
                }
            })
            ->addColumn('BatchID', function ($trainee) {
                if (count($trainee->trainingAccesses) > 0) {
                    if ($trainee->trainingAccesses[0]->{'batchnumber'}) {
                        if ($trainee->trainingAccesses[0]->{'batchnumber'}) {
                            return $trainee->trainingAccesses[0]->{'batchnumber'}->{'FullBatchID'};
                        }
                    }
                }
            })
            ->addColumn('Institution', function ($trainee) {
                if (count($trainee->trainingAccesses) > 0) {
                    return $trainee->trainingAccesses[0]->{'institutionproviding'}->{'Name organization_institution'};
                }
            })
            ->addColumn('KhmerName', function ($trainee) {
                return $trainee->{'Family nameKH'} . ' ' . $trainee->{'First nameKH'};
            })
            ->addColumn('action', function ($trainee) {
                $action     = "<a href='" . route('trainee.edit', ['trainee' => $trainee->ID]) . "' class='btn btn-raised btn-sm btn-primary'><i class='ti-pencil'></i></a> ";
                if (\Auth::user()->role == 'Administrator') :
                    $action     .= "<a href='" . route('trainee.delete', ['trainee' => $trainee->ID]) . "' class='btn btn-raised btn-sm btn-danger'><i class='ti-trash'></i></a> ";
                endif;
                return $action;
            })
            ->rawColumns(['Image', 'action'])
            ->make(true);
    }
}
