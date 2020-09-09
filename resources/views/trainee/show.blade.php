@extends('app') 

@section('title') 

    Show Enterprise: ID{{$trainee->ID}} 
    
@endsection 

@section('content')

    <div class="widget">
        <div class="widget-heading">
            <a href="{{ route('trainee.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i> បញ្ជីសិក្ខាកាម | All Trainees</a>
            <div class="pull-right">
                <a href="{{ route('trainee.create') }}" target="_blank" class="btn btn-raised btn-primary"><i class="ti-plus mr-5"></i>បង្កើតថ្មី | New</a>
                <a href="{{ route('trainee.edit', $trainee->ID) }}" target="_blank" class="btn btn-raised btn-warning"><i class="ti-pencil mr-5"></i>កែប្រែ | Update</a>
                <a href="{{ route('trainee.delete', $trainee->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</a>
            </div>
        </div>
        <div class="widget-body">
            <div class="tabbable wizard">
                <ul class="nav nav-tabs steps ">
                    <li class="col-md-3 active">                        
                        <a class="wizard-a-link" href="#basic-tab1" data-toggle="tab" aria-expanded="true">
                            <span class="number pull-left">1.</span> 
                            <p class="wizard-p" style="min-width: 200px;">
                            <span class="wizard-span">ពាក្យសុំចូលរៀន</span><br>
                                <span>Application</span>                                
                            </p>
                        </a>
                    </li>
                    <li class="col-md-3">
                        <a class="wizard-a-link" href="#basic-tab2" data-toggle="tab" aria-expanded="false">
                            <span class="number pull-left">2.</span> 
                            <p class="wizard-p" style="min-width: 200px;">
                            <span class="wizard-span">គ្រួសារ</span><br>
                                <span>Home Vist</span>                                
                            </p>
                        </a>
                    </li>
                    <li class="col-md-3">
                        <a class="wizard-a-link" href="#basic-tab3" data-toggle="tab" aria-expanded="false">
                            <span class="number pull-left">3.</span> 
                            <p class="wizard-p" style="min-width: 200px;">
                            <span class="wizard-span">ពាក្យចុះឈ្មោះចូលរៀន</span><br>
                                <span>Registration</span>                                
                            </p>
                        </a>
                    </li>
                    <li class="col-md-3">
                        <a class="wizard-a-link" href="#basic-tab4" data-toggle="tab" aria-expanded="false">
                            <span class="number pull-left">4.</span> 
                            <p class="wizard-p" style="min-width: 200px;">
                            <span class="wizard-span">ការតាមដានក្រោយវគ្គ</span><br>
                                <span>Follow Up</span>                                
                            </p>
                        </a>
                    </li>
        
                </ul>

                <div class="tab-content form-horizontal">
                    <div class="tab-pane active" id="basic-tab1">
                        <div class="enterprise">
                            <div class="widget">
                                <div class="panel-body">
                                    @include('trainee.show.showapplication');
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane" id="basic-tab2">
                        <div class="widget">
                            <div class="panel-body">
                                @include('trainee.show.showhome-visit');
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="basic-tab3">
                        <div class="widget">
                            <div class="panel-body">
                                @include('trainee.show.show-registration-employment');
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="basic-tab4">
                        <div class="widget">
                            <div class="panel-body">
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection 