@extends('app')

@push('styles')

    //Style 

@endpush

@section('title')

    SHOW INDUSTRY

@endsection

@section('content')

     <div class="panel-body">
        <div class="tabbable wizard">
        <ul class="nav nav-tabs steps">
                <li class="active col-md-2">                        
                    <a class="wizard-a-link" href="#basic-tab1" data-toggle="tab" aria-expanded="true">
                        <span class="number pull-left">1.</span> 
                        <p class="wizard-p" style="min-width: 200px;">
                        <span class="wizard-span">ប្រវត្ដិរូប</span><br>
                            <span>Profile</span>                                
                        </p>
                    </a>
                </li>
                <li class=" col-md-2">                        
                    <a class="wizard-a-link" href="#basic-tab2" data-toggle="tab" aria-expanded="true">
                        <span class="number pull-left">2.</span> 
                        <p class="wizarsd-p" style="min-width: 200px;">
                        <span class="wizard-span">ផ្តល់ការបណ្តុះបណ្តាល</span><br>
                            <span>Giving Training</span>                                
                        </p>
                    </a>
                </li>
                <li class=" col-md-3">                        
                    <a class="wizard-a-link" href="#basic-tab3" data-toggle="tab" aria-expanded="true">
                        <span class="number pull-left">3.</span> 
                        <p class="wizard-p" style="min-width: 300px;">
                        <span class="wizard-span">ការបណ្តុះបណ្តាល</span><br>
                            <span>Taking Hospitality Training</span>                                
                        </p>
                    </a>
                </li>
            </ul>
            
            <div class="tab-content form-horizontal">
                    <div class="tab-pane active" id="basic-tab1">
                        <div class="enterprise">
                            <div class="widget">
                                <div class="widget-heading">
                                    <h4 class="widget-title"><a href="{{ route('industry.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>  ALL INDUSTRY</a></h4>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-4 ">
                                        <h4>Personal Information</h4>
                                        
                                        <div class="form-group">
                                            {!! Form::Label('First Name', '១. នាមខ្លួន/First Name', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {{ $industry->{'First Name'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Last Name', '២. នាមត្រកូល/Family Name', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {{ $industry->{'Last Name'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Date Of Birth', 'ថ្ងៃខែឆ្នាំកំណើត/ Date Birth', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {{ date('d F Y',strtotime($industry->{'Date Of Birth'})) }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Sex', 'ភេទ/ Sex', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {{ $industry->{'Sex'} }}
                                            </div>
                                        </div>

                                         <h4>
                                            ៦ទីលំនៅអចិន្ត្រៃយ៍ សំរាប់ទំនាក់ទំនងសាម៉ីខ្លួន/ Home location
                                         </h4>

                                         <div class="form-group">
                                            {!! Form::Label('Province', 'ខេត្ត / Province', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {{ $industry->{'Province'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('District', ' ស្រុក / ក្រុង / District', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {{ $industry->{'District'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Commune', 'ឃុំ/សង្កាត់ / Commune', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {{ $industry->{'Commune'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Village', 'ភូមិ / Village', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {{ $industry->{'Village'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('House Number', 'ផ្ទះលេខ / House Number', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {{ $industry->{'House Number'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Phone Number', 'លេខទូរស័ព្ទ/ Phone No', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {{ $industry->{'Phone Number'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Email', 'អ៊ីម៉ែល/Email', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {{ $industry->{'Email'} }}
                                            </div>
                                        </div>

                                        
                                        

                                    </div>   

                                    <div class="col-md-5">
                                        <h4>ព៍ត័មានបន្ថែម</h4>
                                        <div class="form-group">
                                                {!! Form::Label('Last year of schooling', 'បញ្ជាក់កំរិតសិក្សាខ្ពស់បំផុតដែលអ្នកបានបញ្ចប់/Last grade schooling finished', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {{ $industry->{'Last year of schooling'} }}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::Label('Ethnic Minority', 'ជនជាតិ/ Ethnicity', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {{ $industry->{'Ethnic Minority'} }}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::Label('Employment Status', 'ស្ថានភាពការងារ/Employment Status', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {{ $industry->{'Employment Status'} }}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::Label('Position', 'តួនាទី/ការងារ/Position', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {{ $industry->{'Position'} }}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::Label('Differently Abled Person', 'មានពិការភាព?/ Differently Abled Person?', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {{ $industry->{'Differently Abled Person'} }}
                                                </div>
                                            </div>

                                     
                                    </div>
                                    
                                    <div class="col-md-2 no-padding text-center">
                                        @php
                                            if($industry->Photo !== NULL):
                                                $image = $industry->image->Image;
                                                echo "<img src='data:image/jpeg;base64,".base64_encode($image)."' class='avatar img-thumbnail' style='width:100%; height: auto;'/>";
                                            else: 
                                                $image = \URL::to('')."/images/default.png";
                                                echo "<img src='".$image."' class='avatar img-thumbnail' style='width:100%; height: auto;'/>";
                                            endif;
                                        @endphp
                                    </div>

                                </div>
                            </div>                           
                        </div>
                    </div>

                    <div class="tab-pane" id="basic-tab2">
                        <div class="tab-pane active" id="basic-tab2">
                            <div class="enterprise">
                                <div class="widget">
                                    <div class="widget-heading">
                                        <h4 class="widget-title">
                                            <a href="{{ route('industry.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i> All MANUAL RESULT</a> 
                                        </h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-6">
                                            <h4>ព័ត៌មានសហគ្រាស/ Enterprise Information</h4>
                                            <p class="col-md-7 no-padding">ឈ្មោះសហគ្រាស/Enterprise <span class="text-center pull-right"><a href="#"> {{ $industry->enterprise->{'Name of enterprise'} }}</a></p></span>
                                            <p class="col-md-7 no-padding">តួនាទី/ការងារ/Position <span class="text-center pull-right">{{ $industry->{'Position'} }}</span></p>
                                            <div style="clear:both"></div>
                                            <h4>Training provided at Enterprise</h4>
                                            <p class="text-danger">Please enter the Intervantion Area (IA) & Delivery Channel (DC) the owner/manager is providing skill training for</p>
                                            
                                            <div class="form-group">
                                                {!! Form::Label('IADC Training', 'IADC Training', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {{ $industry->onwermanager->intervent->{'DC Description'} }}
                                                </div>
                                            </div>
                                            <br>
                                            <h4>បទពិសោធមុន និងចំនេះដឹង/ Previous Experience & Knowledge</h4>
                                            
                                            <div class="form-group">
                                                {!! Form::Label('Is Assessor', 'Is Owner/Manager an Assessor?', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {{ $industry->onwermanager->{'Is Assessor'} }}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::Label('Experience trainer', 'តើអ្នកធ្លាប់បានផ្តល់ការបណ្តុះបណ្តាលដល់បុគ្គលិករបស់អ្នកដោយផ្ទាល់ដែរឬទេ/ Have you ever given training to your staff?', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {{ $industry->onwermanager->{'Experience trainer'} }}
                                                </div>
                                            </div>
                                            
                                            <br>
                                            <h4>វគ្គបណ្តុះបណ្តាលគ្រូបង្ហាត់/ Trainer Experience</h4>
                                            
                                            <table class="table" style="border:1px solid #ddd">
                                                <tr><th>Training provided</th></tr>
                                                @if(count($industry->onwermanager->OMTrainerExp))
                                                    @foreach($industry->onwermanager->OMTrainerExp As $OwnerManager)
                                                    <tr>
                                                        <td> {{ $OwnerManager->{'Training provided'} }} </td>                                                       
                                                    </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td class="text-center">There are no related items.</td>
                                                    </tr>
                                                @endif  
                                            </table>

                                            

                                        </div>
                                    </div>
                                </div>                           
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="basic-tab3">
                        <div class="tab-pane active" id="basic-tab3">
                            <div class="industry">
                                <div class="widget">
                                    <div class="widget-heading">
                                        <h4 class="widget-title">
                                            <a href="{{ route('industry.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>  ALL INDUSTRY</a>
                                        </h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-6">
                                            <h4>Knowledge & Expertise
                                                
                                            </h4><br>
                                            <table class="table" style="border:1px solid #ddd">
                                                <tr>
                                                    <th>Area expertise om</th>
                                                    <th>If other, Specify</th>
                                                    <th>Years experience</th>
                                                    <th>Type Certificate related received</th>
                                                </tr>
                                                @if(count($industry->onwermanager->omemptrains))
                                                    @foreach($industry->onwermanager->omemptrains As $Omemptrains)
                                                    <tr>
                                                        <td> {{ $Omemptrains->dimomareaexp->{'Area of Knowledge'} }} </td>
                                                        <td> {{ $Omemptrains->{'If other, Specify'} }} </td>
                                                        <td> {{ $Omemptrains->{'Years experience'} }} </td>
                                                        <td> {{ $Omemptrains->{'Type Certificate related received'} }} </td>                                                       
                                                    </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="4" class="text-center">There are no related items.</td>
                                                    </tr>
                                                @endif  
                                            </table>
                                        </div>

                                    </div>
                                </div>                           
                            </div>
                        </div>
                    </div>
                    
            </div>
            
        </div>     
    </div>

@endsection

@push('scripts')

    //scripts

@endpush