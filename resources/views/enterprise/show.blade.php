@extends('app') 

@section('title') 

    Show Enterprise: ID{{$enterprise->ID}} 
    
@endsection 

@section('content')

    <div class="widget">
        <div class="widget-heading">
            <a href="{{ route('enterprise.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i> បញ្ជីសហគ្រាស | All Enterprise</a>
            <div class="pull-right">
                <a href="{{ route('enterprise.create') }}" target="_blank" class="btn btn-raised btn-primary"><i class="ti-plus mr-5"></i>បង្កើតថ្មី | New</a>
                <a href="{{ route('enterprise.edit', $enterprise->ID) }}" target="_blank" class="btn btn-raised btn-warning"><i class="ti-pencil mr-5"></i>កែប្រែ | Update</a>
                <a href="{{ route('enterprise.delete', $enterprise->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</a>
            </div>
        </div>
        <div class="widget-body">
            <div class="tabbable wizard">
                <ul class="nav nav-tabs steps ">
                    <li class="col-md-3 active">                        
                        <a class="wizard-a-link" href="#basic-tab1" data-toggle="tab" aria-expanded="true">
                            <span class="number pull-left">1.</span> 
                            <p class="wizard-p" style="min-width: 200px;">
                            <span class="wizard-span">ព័ត៌មានមូលដ្ឋាន</span><br>
                                <span>Basic Information</span>                                
                            </p>
                        </a>
                    </li>
                    <li class="col-md-3">
                        <a class="wizard-a-link" href="#basic-tab2" data-toggle="tab" aria-expanded="false">
                            <span class="number pull-left">2.</span> 
                            <p class="wizard-p" style="min-width: 200px;">
                            <span class="wizard-span">សហគ្រាសជាមួយកម្មវិធីSDP</span><br>
                                <span>Enterprise &amp; SDP</span>                                
                            </p>
                        </a>
                    </li>
                    <li class="col-md-3">
                        <a class="wizard-a-link" href="#basic-tab3" data-toggle="tab" aria-expanded="false">
                            <span class="number pull-left">3.</span> 
                            <p class="wizard-p" style="min-width: 200px;">
                            <span class="wizard-span">អ្នកទំនាកទំនង និង អ្នកវាយតម្លៃ</span><br>
                                <span>Contacts &amp; Assessors</span>                                
                            </p>
                        </a>
                    </li>
        
                </ul>

                <div class="tab-content form-horizontal">
                    <div class="tab-pane active" id="basic-tab1">
                        <div class="enterprise">
                            <div class="widget">
                                <div class="panel-body">
                                    <div class="col-md-5">
                                        <h4> ព័ត៌មានមូលដ្ឋាន/ Basic Information </h4>

                                        <div class="form-group">
                                            {!! Form::Label('Name of enterprise', '១​.​ ឈ្មោះសហគ្រាស​/Name of enterprise', ['class' => 'control-label col-lg-8']) !!}
                                            <div class="col-lg-4">
                                                {{ $enterprise->{'Name of enterprise'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Date start business', '២. ថ្ងៃទីខែឆ្នាំចាប់ផ្តើមអាជីវកម្ម/Date start business', ['class' => 'control-label col-lg-8']) !!}
                                            <div class="col-lg-4">
                                                {{ $enterprise->{'Date of start of business'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Has license', '៣. ឯកសារចុះបញ្ជិអាជីវកម្ម/Has license?', ['class' => 'control-label col-lg-8']) !!}
                                            <div class="col-lg-4">
                                                {{ $enterprise->{'Has license'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Activity', '៤. ប្រភេទអាជីវកម្ម /Type of business', ['class' => 'control-label col-lg-8']) !!}
                                            <div class="col-lg-4">
                                                {{ $enterprise->activity->Activity }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Sector', 'វិស័យ/Sector of the business', ['class' => 'control-label col-lg-8']) !!}
                                            <div class="col-lg-4">
                                                {{ $enterprise->{'Sector'} }}
                                            </div>
                                        </div>

                                        <h4>៥. ទីតាំង​/Location</h4>

                                        <div class="form-group">
                                            {!! Form::Label('Province', 'ខេត្ត/Province', ['class' => 'control-label col-lg-8']) !!}
                                            <div class="col-lg-4">
                                                {{ $enterprise->{'Province'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('District', 'ស្រុក-ក្រុង​/District', ['class' => 'control-label col-lg-8']) !!}
                                            <div class="col-lg-4">
                                                {{ $enterprise->{'District'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Commune', 'ឃុំ-សង្កាត់/Commune', ['class' => 'control-label col-lg-8']) !!}
                                            <div class="col-lg-4">
                                                {{ $enterprise->{'Commune'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Village', 'ភូមិ/Village', ['class' => 'control-label col-lg-8']) !!}
                                            <div class="col-lg-4">
                                                {{ $enterprise->{'Village'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Address', 'ផ្ទះលេខ/House number', ['class' => 'control-label col-lg-8']) !!}
                                            <div class="col-lg-4">
                                                {{ $enterprise->{'Address'} }}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-offset-1 col-md-6">

                                        <h4>៦. ចំនួនបុគ្គលិក/Employees (optional)</h4>

                                        <div class="form-group">
                                            {!! Form::Label('Number women employees', '# ស្រីសរុប/ women employees', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {{ (int)$enterprise->{'Number women employees'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Number men employees', '# ប្រុសសរុប/ men employees', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {{ (int)$enterprise->{'Number men employees'} }}
                                            </div>
                                        </div>

                                        <p class="text-danger">ពត៌មានលម្អិតពីគណីនី/ Bank information for enterprises offering Dual Vocational Training Only</p>

                                        <div class="form-group">
                                            {!! Form::Label('Bank Name', 'ឈ្មោះ​របស់​ធនាគារ/ Bank Name', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {{ $enterprise->{'Bank Name'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Bank Account', 'លេខគណនី / Account Number', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {{ $enterprise->{'Bank Account'} }}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::Label('Need to hire new employees', '៩. តើអ្នកត្រូវការជួលបុគ្គលិកថ្មីៗ ឬទេ/ Does the enterprise need to hire new employees?', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {{ $enterprise->{'Need to hire new employees'} }}
                                            </div>
                                        </div>
                                        <span class="text-danger">ប្រសិនមាន​ សូមបំពេញតារាខាងក្រោម/ If yes, please complete table below</span>
                                        <h4>ត្រូវការបុគ្គលិក/Employees Needed 

                                                        </h4>
                                        <br>
                                        <table class="table text-left" style="border:1px solid #ddd">
                                            <thead>
                                                <tr style="background:#f3f3f3">
                                                    <th>Position</th>
                                                    <th>How Many</th>
                                                    <th>Comments</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($enterprise->employments)) @foreach($enterprise->employments as $employment)
                                                <tr>
                                                    <td>{{ $employment->Position }}</td>
                                                    <td>{{ (int)$employment->{'How Many'} }}</td>
                                                    <td>{{ $employment->Comments }}</td>
                                                </tr>
                                                @endforeach @else
                                                <tr>
                                                    <td colspan="3" class="text-center">There are no related items.</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane" id="basic-tab2">
                        <div class="widget">
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <h4>ទំនាក់ទំនងសហគ្រាសជាមួយកម្មវិធីSDP /Enterprise Connection with SDP</h4>
                                    <span class="text-danger">ក្នុងផ្នែកនេះយើងចង់ដឹងចា សហគ្រាសមានទំនាន់ទំនងដូចម៉្ដេចជាមួយ SDP /In this section we want to know how the enterprise is connected to SDP</span>
                                    <div class="form-group">
                                        {!! Form::Label('Enterprise involved in SDP training', '៧. តើសហគ្រាសបណ្តុះបណ្តាលជំនាញសម្រាប់កម្មវិធីSDPទេ?/ Is enterprise offering skills training in SDP?', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {{ $enterprise->{'Enterprise involved in SDP training'} }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::Label('EntIntervention', 'ប្រសិនមាន សូមវាយលេខសម្គាល់/ If yes, please select the Intervention Area and Delivery Channel (IADC) the enterprise is engaged with', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {{ $enterprise->{'EntIntervention'} }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::Label('Hired graduates', '៨. តើសហគ្រាសត្រូវការជួលសិក្ខាកាមដែលបានបញ្ចប់ការសិក្សាដែរឬទេ/Did enterprise hire a graduate?', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {{ $enterprise->{'Hired graduates'} }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::Label('RPL participant', 'តើបុគ្គលិកបានចូលរួមក្នុងការវាយតម្លៃ RPL ដែលឬទេ?/Did staff member(s) participate in RPL assessment?', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {{ $enterprise->{'RPL participant'} }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="basic-tab3">
                        <div class="widget">
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <span class="text-danger">សូមផ្តល់ឈ្មោះអ្នកទំនាក់ទំនងពីរនាក់នៅតាមសហគ្រាស/ Contacts at the enterprise</span>
                                    <h4>១០. អ្នកទំនាកទំនង/Contacts Information អ្នកវាយតម្លៃ/Assessors</h4>
                                    <br>
                                    <table class="table text-left" style="border:1px solid #ddd">
                                        <thead>
                                            <tr style="background:#f3f3f3">
                                                <th>Full Name</th>
                                                <th>Position</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($enterprise->contacts)) @foreach($enterprise->contacts As $contact)
                                            <tr>
                                                <td> {{ $contact->{'Full Name'} }} </td>
                                                <td> {{ $contact->{'Position'} }} </td>
                                                <td> {{ $contact->{'Phone Number'} }} </td>
                                                <td> {{ $contact->{'Email'} }} </td>
                                            </tr>
                                            @endforeach @else
                                            <tr>
                                                <td colspan="4" class="text-center">There are no related items.</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>

                                    <span class="text-danger">បញ្ចូលលទ្ធផលពីការស្ទង់មតិម្ចាស់សហគ្រាសឬអ្នកគ្រប់គ្រង/ Enter results of the Employer's follow up survey</span>
                                    <h4>ការស្ទង់មតិតាមដានអំពីសហគ្រាស Recruitment Follow up

                                                        </h4>
                                    <br>
                                    <table class="table text-center" style="border:1px solid #ddd">
                                        <thead>
                                            <tr style="background:#f3f3f3">
                                                <th>Interview date</th>
                                                <th>Females employed</th>
                                                <th>Males employes</th>
                                                <th>Overall score</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($enterprise->recruitments)) @foreach($enterprise->recruitments As $recruitment)
                                            <tr>
                                                <td> {{ $recruitment->{'Interview date'} }} </td>
                                                <td> {{ (int)$recruitment->{'Females employed'} }} </td>
                                                <td> {{ (int)$recruitment->{'Males employes'} }} </td>
                                                <td> {{ $recruitment->{'Overall score'} }} </td>
                                            </tr>
                                            @endforeach @else
                                            <tr>
                                                <td colspan="4" class="text-center">There are no related items.</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection 