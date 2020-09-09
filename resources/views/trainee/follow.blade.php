@extends('app')

@section('title')

កែប្រែព័ត៌មានសិក្ខាកាម | EDIT TRIAINEE

@endsection

@section('content')

    {!! Form::model($trainee, ['route' => ['trainee.update', $trainee->ID], 'method' => 'PUT', 'class' => 'form-horizontal wizard clearfix']) !!}
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">
                    <a href="{{ route('trainee.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>  បញ្ជីសិក្ខាកាម | All Trainees</a>
                </h3>
            </div>
            <div class="widget-body">
                <div class="wizard">
                    <div class="steps clearfix">
                        <ul role="tablist">
                            <li role="tab" class="first disabled">
                                <a href="{{ route('trainee.edit', ['trainee' => $trainee->ID]) }}" class="wizard-a-link">
                                    <span class="number pull-left">1.</span> 
                                    <p class="wizard-p">
                                        <span class="wizard-span">ពាក្យសុំចូលរៀន </span>
                                        <br> Application
                                    </p>
                                </a>
                            </li>
                            <li role="tab" class="disabled">
                                <a href="{{ route('trainee.edit.section', ['trainee' => $trainee->ID, 'section' => 'household']) }}" class="wizard-a-link">
                                    <span class="number pull-left">2.</span> 
                                    <p class="wizard-p">
                                        <span class="wizard-span">គ្រួសារ </span>
                                        </br>Home Visit
                                    </p>
                                </a>
                            </li>
                            <li role="tab" class="disabled">
                                <a href="{{ route('trainee.edit.section', ['trainee' => $trainee->ID, 'section' => 'registration']) }}" class="wizard-a-link">
                                    <span class="number pull-left">3.</span> 
                                    <p class="wizard-p">
                                        <span class="wizard-span">ពាក្យចុះឈ្មោះចូលរៀន </span>
                                        </br>Registration
                                    </p>
                                </a>
                            </li>
                            <li role="tab" class="last current">
                                <a class="wizard-a-link">
                                    <span class="number pull-left">4.</span> 
                                    <p class="wizard-p">
                                        <span class="wizard-span">ការតាមដានក្រោយវគ្គ </span>
                                        </br>Follow up
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="content clearfix">
                        <div class="tabbable wizard sub">
                            <ul class="nav nav-tabs steps ">
                                <li class="active col-md-2">                        
                                    <a class="wizard-a-link" href="#basic-tab1" data-toggle="tab" aria-expanded="true">
                                        <p class="wizard-p" style="min-width: 200px;">
                                        <span class="wizard-span">ព័ត៌មានមូលដ្ឋាន</span><br>
                                            <span >Basic Information</span>                                
                                        </p>
                                    </a>
                                </li>
                                <li class="col-md-2">
                                    <a class="wizard-a-link" href="#basic-tab2" data-toggle="tab" aria-expanded="true">
                                        <p class="wizard-p" style="min-width: 200px;">
                                        <span class="wizard-span">ការផ្លាស់ប្តូរទៅរកការងារ</span><br>
                                            <span>Transition to Employment  </span>                                
                                        </p>
                                    </a>
                                </li>
                                <li class="col-md-2">
                                    <a class="wizard-a-link" href="#basic-tab3" data-toggle="tab" aria-expanded="true">
                                        <p class="wizard-p" style="min-width: 200px;">
                                        <span class="wizard-span">ស្ថានភាពការងារបច្ចុប្បន្ន</span><br>
                                            <span>Work Situation Now</span>                                
                                        </p>
                                    </a>
                                </li>
                                <li class="col-md-2">
                                    <a class="wizard-a-link" href="#basic-tab4" data-toggle="tab" aria-expanded="true">
                                        <p class="wizard-p" style="min-width: 200px;">
                                        <span class="wizard-span">ការបណ្ដុះបណ្ដាល</span><br>
                                            <span>Training relevance</span>                                
                                        </p>
                                    </a>
                                </li>
                    
                            </ul>
    
                            <div class="tab-content">
                                {{ Form::open(array('url' => 'foo/bar',"class"=>"form-horizontal")) }}
                    
                                    <div class="tab-pane active" id="basic-tab1">
                                        @include('trainee.followup.basicinformation')
                                    </div>
                    
                                    <div class="tab-pane" id="basic-tab2">
                                        @include('trainee.followup.transitiontoemployment')
                                    </div>
                    
                                    <div class="tab-pane" id="basic-tab3">
                                        @include('trainee.followup.worksituatuinnow')
                                    </div>
                                    <div class="tab-pane" id="basic-tab4">
                                        @include('trainee.followup.trainingrelevance')
                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>
            
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}

@endsection

@push('scripts')

    //scripts

@endpush