<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Industry, IndustryImage, OwnerManager, OMTrainingAccess, TrainingProvider, CourseBatchOpenOM, BatchOpen, Province, District, Commune, Address};
use App\EthnicGroup as EthnicGroup;
use App\DimOMAreaExp as DimOMAreaExp;
use App\Intervention as Intervention;
use App\{Submitter, Enterprise, BatchOpenOM};
use App\Traits\UploadImage;
use DataTables;

class IndustryController extends Controller
{
    use UploadImage;
    private $upload_path = 'storage/';
    private $prefix_name = '_ps_image';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'provinces'     => \App\Province::all(),
            'interventions' => Intervention::select('Code', 'ID')->get(),
        ];
        // dd(phpinfo());

        return view('industry.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'sexes'         => Industry::$sexes,
            'ethnic'        => Industry::$ethnic,
            'status'        => Industry::$status,
            'yes_no'        => Industry::$yes_no,
            'EthnicGroup'   => EthnicGroup::select('ID', 'Combined Khmer as Name')->pluck('Name', 'ID'),
            'DimOMAreaExp'  => DimOMAreaExp::select('ID', 'Area of Knowledge as Name')->pluck('Name', 'ID'),
            'Intervention'  => Intervention::select('ID', 'Code', 'DC Description as Name')->where('Enterprise', 1)->pluck('Code.-.Name', 'ID'),
            'provinces'     => Province::select('Province')->get(),
            'districts'     => District::select('District', 'Province')->get()->groupBy('Province'),
            'communes'      => Commune::select('Commune', 'District')->get()->groupBy('District'),
            'villages'      => Address::select('ID', 'Village', 'Commune')->get()->groupBy('Commune'),
            'grades'        => Industry::$grades,
            'submitters'    => Submitter::select('ID', 'Full Name as Name')->orderBy('Full Name', 'ASC')->pluck('Name', 'ID'),
            'enterprises'   => Enterprise::select('ID', 'Name of enterprise as Name')->pluck('Name', 'ID'),
        ];
        return view('industry.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data    = $request->except(['support_employments', 'training_accesses', 'training_supports']);

        $industry = Industry::create($data);
        return response()->json([
            'created'    => true,
            'id'        => $industry->ID
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
        $industry = Industry::findOrFail($id);
        $data = [
            'industry' => $industry
        ];
        return view('industry.show')->with($data);
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

            $industry = Industry::findOrFail($id);
            $image = IndustryImage::where('ID', $industry->Photo)->first();
            $image_encode = ($image) ? base64_encode($image->Image) : null;
            $data = [
                'industry'      => $industry,
                'image'         => $image_encode,
                'sexes'         => Industry::$sexes,
                'ethnic'        => Industry::$ethnic,
                'status'        => Industry::$status,
                'yes_no'        => Industry::$yes_no,
                'EthnicGroup'   => EthnicGroup::select('ID', 'Combined Khmer as Name')->pluck('Name', 'ID'),
                'DimOMAreaExp'  => DimOMAreaExp::select('ID', 'Area of Knowledge as Name')->pluck('Name', 'ID'),
                'Intervention'  => Intervention::select('ID', 'Code', 'DC Description as Name')->where('Enterprise', 1)->pluck('Code.-.Name', 'ID'),
                'provinces'     => Province::select('Province')->get(),
                'districts'     => District::select('District', 'Province')->get()->groupBy('Province'),
                'communes'      => Commune::select('Commune', 'District')->get()->groupBy('District'),
                'villages'      => Address::select('ID', 'Village', 'Commune')->get()->groupBy('Commune'),
                'grades'        => Industry::$grades,
                'submitters'    => Submitter::select('ID', 'Full Name as Name')->orderBy('Full Name', 'ASC')->pluck('Name', 'ID'),
                'enterprises'   => Enterprise::select('ID', 'Name of enterprise as Name')->pluck('Name', 'ID'),
            ];
            return view('industry.edit')->with($data);

        elseif ($section == 'giving') :
            $data = [
                'industry'      => Industry::select('ID', 'Submitter')->with('ownermanager', 'ownermanager.trainers', 'ownermanager.experts')->findOrFail($id),
                'sexes'         => Industry::$sexes,
                'ethnic'        => Industry::$ethnic,
                'status'        => Industry::$status,
                'yes_no'        => Industry::$yes_no,
                'experiences'   => Industry::$experiences,
                'EthnicGroup'   => EthnicGroup::select('ID', 'Combined Khmer as Name')->pluck('Name', 'ID'),
                'DimOMAreaExp'  => DimOMAreaExp::select('ID', 'Area of Knowledge as Name')->pluck('Name', 'ID'),
                'Intervention'  => Intervention::select('ID', 'Code', 'DC Description as Name')->where('Enterprise', 1)->pluck('Code.-.Name', 'ID')
            ];
            return view('industry.giving')->with($data);

        elseif ($section == 'taking') :
            $data = [
                'industry'      => Industry::select('ID')->with(['trainings' => function ($query) {
                    return $query->orderBy('ID','DESC');
                }])->findOrFail($id),
                'status'        => Industry::$status,
                'yes_no'        => Industry::$yes_no,
                'reasonDropOut'     => Industry::$reasonDropOut,
                'providers'     => TrainingProvider::select('Name organization_institution as Name', 'ID')->pluck('Name', 'ID'),
                'courses'       => CourseBatchOpenOM::select('Course Info as ID', 'Course')->pluck('Course', 'ID'),
                'batches'       => BatchOpenOM::select('Batch Code as Name', 'ID', 'Course Info')->get()->groupBy('Course Info'),
            ];
            return view('industry.taking')->with($data);
        else :

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
        $industry  = Industry::findOrFail($id);
        $data    = $request->except(['support_employments', 'training_accesses', 'training_supports', 'Image']);
        if ($request->Image != null && $request->Image != 'reset') {
            $datastring = file_get_contents($request->Image);
            $image         = unpack("H*hex", $datastring);
            $image         = '0x' . $image['hex'];
            $photoName = $this->uploadImageBase64($request->Image, $this->upload_path, $this->prefix_name);

            if ($industry->Photo != null) {
                $photo = IndustryImage::where("ID", $industry->Photo)->update(['Image' =>  \DB::raw("CONVERT(VARBINARY(MAX), $image) "), 'photo' => $photoName]);
            } else {
                $photo = IndustryImage::create(['Image' =>  \DB::raw("CONVERT(VARBINARY(MAX), $image) "), 'photo' => $photoName]);
                $data['Photo'] = $photo->id;
            }
        } elseif ($request->Image == "reset") {
            $data['Photo'] = null;
        }

        $industry->update($data);
        return response()->json([
            'updated'    => true,
        ]);
    }

    public function delete($id)
    {
        $industry = Industry::findOrFail($id);
        return view('industry.delete', compact('industry'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $industry = Industry::findOrFail($id);
        if ($industry->ownermanager) {
            OwnerManager::findOrFail($industry->ownermanager->ID)->trainers()->delete();
        }
        $industry->ownermanager()->delete();
        $industry->delete();
        return redirect()->route('industry.index')->with('message', 'You have succesfully deleted the INDUSTRY!');
    }

    /**
     * DataTables Init
     */
    public function datatable(Request $request)
    {

        if (\Auth::user()->role == 'User') :
            if ($request->input('giving') != '%') :
                if ($request->input('taking') != '%') :
                    if ($request->input('taking') == 'No') :
                        $Industries   = Industry::whereHas("enterprise", function ($q) use ($request) {
                            $q->where([["Province", "LIKE", $request->input('province')]]);
                        })->whereHas("ownermanager.intervent", function ($q) use ($request) {
                            $q->where([["IADC Training", "LIKE", $request->input('giving')]]);
                        })->has("trainings", "=", 0)->whereHas('submitter', function ($query) {
                            $query->where('Training Provider', '=', \Auth::user()->{'Training Provider'});
                        });
                    else :
                        $Industries   = Industry::whereHas("enterprise", function ($q) use ($request) {
                            $q->where([["Province", "LIKE", $request->input('province')]]);
                        })->whereHas("ownermanager.intervent", function ($q) use ($request) {
                            $q->where([["IADC Training", "LIKE", $request->input('giving')]]);
                        })->has("trainings", ">", 0)->whereHas('submitter', function ($query) {
                            $query->where('Training Provider', '=', \Auth::user()->{'Training Provider'});
                        });
                    endif;
                else :
                    $Industries   = Industry::whereHas("enterprise", function ($q) use ($request) {
                        $q->where([["Province", "LIKE", $request->input('province')]]);
                    })->whereHas("ownermanager.intervent", function ($q) use ($request) {
                        $q->where([["IADC Training", "LIKE", $request->input('giving')]]);
                    })->whereHas('submitter', function ($query) {
                        $query->where('Training Provider', '=', \Auth::user()->{'Training Provider'});
                    });
                endif;
            else :
                if ($request->input('taking') != '%') :
                    if ($request->input('taking') == 'No') :
                        $Industries   = Industry::whereHas("enterprise", function ($q) use ($request) {
                            $q->where([["Province", "LIKE", $request->input('province')]]);
                        })->has("trainings", "=", 0)->whereHas('submitter', function ($query) {
                            $query->where('Training Provider', '=', \Auth::user()->{'Training Provider'});
                        });
                    else :
                        $Industries   = Industry::whereHas("enterprise", function ($q) use ($request) {
                            $q->where([["Province", "LIKE", $request->input('province')]]);
                        })->has("trainings", ">", 0)->whereHas('submitter', function ($query) {
                            $query->where('Training Provider', '=', \Auth::user()->{'Training Provider'});
                        });
                    endif;
                else :
                    $Industries   = Industry::whereHas("enterprise", function ($q) use ($request) {
                        $q->where([["Province", "LIKE", $request->input('province')]]);
                    })->whereHas('submitter', function ($query) {
                        $query->where('Training Provider', '=', \Auth::user()->{'Training Provider'});
                    });
                endif;
            endif;

        else :
            if ($request->input('giving') != '%') :
                if ($request->input('taking') != '%') :
                    if ($request->input('taking') == 'No') :
                        $Industries   = Industry::whereHas("enterprise", function ($q) use ($request) {
                            $q->where([["Province", "LIKE", $request->input('province')]]);
                        })->whereHas("ownermanager.intervent", function ($q) use ($request) {
                            $q->where([["IADC Training", "LIKE", $request->input('giving')]]);
                        })->has("trainings", "=", 0);
                    else :
                        $Industries   = Industry::whereHas("enterprise", function ($q) use ($request) {
                            $q->where([["Province", "LIKE", $request->input('province')]]);
                        })->whereHas("ownermanager.intervent", function ($q) use ($request) {
                            $q->where([["IADC Training", "LIKE", $request->input('giving')]]);
                        })->has("trainings", ">", 0);
                    endif;
                else :
                    $Industries   = Industry::whereHas("enterprise", function ($q) use ($request) {
                        $q->where([["Province", "LIKE", $request->input('province')]]);
                    })->whereHas("ownermanager.intervent", function ($q) use ($request) {
                        $q->where([["IADC Training", "LIKE", $request->input('giving')]]);
                    });
                endif;
            else :
                if ($request->input('taking') != '%') :
                    if ($request->input('taking') == 'No') :
                        $Industries   = Industry::whereHas("enterprise", function ($q) use ($request) {
                            $q->where([["Province", "LIKE", $request->input('province')]]);
                        })->has("trainings", "=", 0);
                    else :
                        $Industries   = Industry::whereHas("enterprise", function ($q) use ($request) {
                            $q->where([["Province", "LIKE", $request->input('province')]]);
                        })->has("trainings", ">", 0);
                    endif;
                else :
                    $Industries   = Industry::whereHas("enterprise", function ($q) use ($request) {
                        $q->where([["Province", "LIKE", $request->input('province')]]);
                    });
                endif;
            endif;
        endif;

        //$Industries   = Industry::all();


        return DataTables::eloquent($Industries)
            ->addColumn('Image', function ($industry) {
                if ($industry->Photo !== NULL) :
                    // $image = \URL::to('') . "/images/default.png";
                    $image = $industry->image->photo;
                    return "<img src='" .$image. "' class='avatar img-thumbnail' width='80px; height: auto;'/>";
                else :
                    $image = \URL::to('') . "/images/default.png";
                    return "<img src='" . $image . "' class='avatar img-thumbnail' width='80px; height: auto;'/>";
                endif;
            })
            ->editColumn('Enterprise', function ($industry) {
                if ($industry->enterprise) {
                    return $industry->enterprise->{'Name of enterprise'};
                }
            })
            ->addColumn('EnterpriseLocation', function ($industry) {
                if ($industry->enterprise) {
                    return $industry->enterprise->Province;
                }
            })
            ->addColumn('GivingTraining', function ($industry) {
                if ($industry->ownermanager) :
                    if ($industry->ownermanager->intervent) :
                        return $industry->ownermanager->intervent->{'Intervention Area'} . $industry->ownermanager->intervent->{'Delivery Channel'} . '-' . $industry->ownermanager->intervent->{'DC Description'};
                    endif;
                endif;
            })
            ->addColumn('TakingTraining', function ($industry) {
                if (count($industry->trainings) > 0) :
                    return 'Yes';
                else :
                    return 'No';
                endif;
            })
            ->addColumn('Course', function ($industry) {
                if ($industry->lastestTraining()) :
                    if ($industry->lastestTraining()->course) :
                        return $industry->lastestTraining()->course->Course;
                    else :
                        return '';
                    endif;
                endif;
                return '';
            })
            ->addColumn('TrainingProvider', function ($industry) {
                if ($industry->lastestTraining()) :
                    if ($industry->lastestTraining()->trainingProviding) :
                        return $industry->lastestTraining()->trainingProviding->{'Name organization_institution'};
                    else :
                        return '';
                    endif;
                endif;
                return '';
            })
            ->addColumn('RPL', function ($industry) {
                return null;
            })
            ->addColumn('Assessor', function ($industry) {
                if ($industry->ownermanager) :
                    if ($industry->ownermanager->intervent) :
                        return $industry->ownermanager->{'Is Assessor'};
                    endif;
                endif;
            })
            ->addColumn('action', function ($industry) {
                $action     = "<a href='" . route('industry.edit', ['industry' => $industry->ID]) . "' class='btn btn-raised btn-sm btn-primary'><i class='ti-pencil'></i></a> ";
                if (\Auth::user()->role == 'Administrator') :
                    $action     .= "<a href='" . route('industry.delete', ['industry' => $industry->ID]) . "' class='btn btn-raised btn-sm btn-danger'><i class='ti-trash'></i></a> ";
                endif;
                return $action;
            })
            ->rawColumns(['Image', 'action'])
            ->make(true);
    }
}
