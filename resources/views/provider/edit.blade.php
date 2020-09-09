@extends('app')

@section('title')

    EDIT TRAINING PROVIDER

@endsection

@section('content')

    <div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">   
        <div class="modal-dialog modal-views" style="width: 45%;top:10%;background: #FFF">
            <div class="modal-content load-modal-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="gridModalLabel">Contacts</h4>
                </div>
                <div class="model-body">
                    <div class="container-fluid">
                        <form class="row form-horizontal" data-vv-scope="contact">
                            <div class="col-md-12">
                                <div class="form-group required" :class = "{'has-error': errors.has('contact.Name') }">
                                    {!! Form::Label('Name', 'Name', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6 no-padding">
                                        {!! Form::Text('Name', null, [ 'v-model' => 'contact["Name"]', 'v-validate' => "'required'", ':class' => "{'form-control': true}"]) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::Label('Email', 'Email', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6 no-padding">
                                        {!! Form::Text('Email', null, [ 'v-model' => 'contact["Email"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group required">
                                    {!! Form::Label('Organisation', 'Organisation', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6 no-padding">
                                        {!! Form::Select('Organisation', $organisation, null, [ 'v-model' => 'contact["Organisation"]', 'required' => 'required', 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::Label('Position', 'Position', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6 no-padding">
                                        {!! Form::Text('Position', null, [ 'v-model' => 'contact["Position"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::Label('Phone Number', 'Phone Number', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6 no-padding">
                                        {!! Form::Text('Phone Number', null, [ 'v-model' => 'contact["Phone Number"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: center">
                    <button type="button" class="btn btn-primary" @click="saveContact">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>    

    <div class="modal fade" id="modalTrainer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog  modal-dialog-centered" style="width: 90%; max-width: 1200px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Trainers</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form  class="row form-horizontal" data-vv-scope="trainer">
                            <div class="col-md-4">
                                <div class="form-group required" :class = "{'has-error': errors.has('trainer.Last name') }">
                                    {!! Form::Label('Last name', 'Last name', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Last name', null, [ 'v-model' => 'trainer["Last name"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                    </div>
                                </div>
        
                                <div class="form-group required" :class = "{'has-error': errors.has('trainer.Sex') }">
                                    {!! Form::Label('Sex', 'Sex', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Sex',$sex, null, ['v-model' => 'trainer["Sex"]', 'v-validate' => "'required'",'class' => 'form-control']) !!}
                                    </div>
                                </div>
        
                                <div class="form-group required" :class = "{'has-error': errors.has('trainer.Country') }">
                                    {!! Form::Label('Country', 'Country', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Country', $countries, null, ['v-model' => 'trainer["Country"]', 'v-validate' => "'required'",'class' => 'form-control']) !!}
                                    </div>
                                </div>
        
                                <div class="form-group required" :class = "{'has-error': errors.has('trainer.District') }">
                                    {!! Form::Label('District', 'District', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        <select id="District" name="District" class="form-control" v-validate="'required'" v-model='trainer["District"]'>
                                            <option v-for="option in ta_districts[trainer['Province']]" v-bind:value="option['ID']" >@{{ option['District'] }}</option>
                                        </select>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    {!! Form::Label('Phone number', 'Phone number', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Phone number', null, ['v-model' => 'trainer["Phone number"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    {!! Form::Label('Contact 1 Name', 'Contact 1 Name', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Contact 1', null, ['v-model' => 'trainer["Contact 1"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    {!! Form::Label('Contact 2', 'Contact 2 Name', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Contact 2', null, ['v-model' => 'trainer["Contact 2"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-md-4">
        
                                <div class="form-group required" :class = "{'has-error': errors.has('trainer.First name') }">
                                    {!! Form::Label('First name', 'First name', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('First name', null, ['v-model' => 'trainer["First name"]', 'v-validate' => "'required'",'class' => 'form-control']) !!}
                                    </div>
                                </div>
        
                                <div class="form-group required" :class = "{'has-error': errors.has('trainer.Date of Birth') }">
                                    {!! Form::Label('Date of Birth', 'Date of Birth', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::date('Date of Birth', null, ['v-model' => 'trainer["Date of birth"]', 'v-validate' => "'required'",'class' => 'form-control']) !!}
                                    </div>
                                </div>
        
                                <div class="form-group required" :class = "{'has-error': errors.has('trainer.Province') }">
                                    {!! Form::Label('Province', 'Province', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        <select id="Province" name="Province" class="form-control" v-validate="'required'" v-model='trainer["Province"]'>
                                            <option v-for="option in ta_provinces[trainer['Country']]" v-bind:value="option['Province']" >@{{ option['Province'] }}</option>
                                        </select>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    {!! Form::Label('Email', 'Email', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Email', null, ['v-model' => 'trainer["Email"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    {!! Form::Label('Last grade of School', 'Last grade of School', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Last grade of School',$last_grade, null, ['v-model' => 'trainer["Last grade of School"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    {!! Form::Label('Contact 1 Number', 'Contact 1 Number', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::text('Contact 1 Number', 0, ['v-model' => 'trainer["Contact 1 Number"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    {!! Form::Label('Contact 2 Name', 'Contact 2 Number', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Contact 2 Name', 0, ['v-model' => 'trainer["Contact 2 Number"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-md-3 text-center">
                                <img src="{{asset('assets/images/backgrounds/bg.jpg')}}" style="width:100%;border:1px dotted">
                                <button class="btn btn-default btn-file btn-primary mt-10">
                                    <i class="icon-file-plus"></i> <span>Browse Image</span>
                                    <input type="file" class="file-input-preview1" name="image">
                                </button>

                                <div class="form-group">
                                    {!! Form::Label('Organisation', 'Organisation', ['class' => 'control-label col-lg-9']) !!}
                                    <div>
                                        {!! Form::Select('Organisation', $organisation, $provider->ID, ['v-model' => 'trainer["Organisation"]', 'class' => 'form-control', 'readonly']) !!}
                                    </div>
                                </div>
                            </div>
        
                            <hr>
                            <div class="col-md-3">
                                <h4>Type of trainer</h4>
        
                                <div class="form-group">
                                    {!! Form::Label('Master Trainer', 'Master Trainer', ['class' => 'control-label col-lg-9']) !!}
                                    <div>
                                        <input type="checkbox" true-value="1" false-value="0" v-model="trainer['Master Trainer']" />
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    {!! Form::Label('Trainer of Assesors', 'Trainer of Assesors', ['class' => 'control-label col-lg-9']) !!}
                                    <div>
                                        <input type="checkbox" true-value="1" false-value="0" v-model="trainer['Trainer of Assesors']" />
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    {!! Form::Label('Trainer of Trainees', 'Trainer of Trainees', ['class' => 'control-label col-lg-9']) !!}
                                    <div>
                                        <input type="checkbox" true-value="1" false-value="0" v-model="trainer['Trainer of Trainees']" />
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    {!! Form::Label('Coach', 'Coach', ['class' => 'control-label col-lg-9']) !!}
                                    <div>
                                        <input type="checkbox" true-value="1" false-value="0" v-model="trainer['Coach']" />
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-md-3">
                                <h4>Skills taught</h4>
        
                                <div class="form-group">
                                    {!! Form::Label('Soft Skills', 'Soft Skills', ['class' => 'control-label col-lg-9']) !!}
                                    <div>
                                        <input type="checkbox" true-value="1" false-value="0" v-model="trainer['Soft Skills']" />
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    {!! Form::Label('Technical Skills', 'Technical Skills', ['class' => 'control-label col-lg-9']) !!}
                                    <div>
                                        <input type="checkbox" true-value="1" false-value="0" v-model="trainer['Technical Skills']" />
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-md-3">
                                <h4>Is the trainer an assessor?</h4>
                                <div class="form-group">
                                    {!! Form::Label('Assessor', 'Assessor', ['class' => 'control-label col-lg-9']) !!}
                                    <div>
                                        <input type="checkbox" true-value="1" false-value="0" v-model="trainer['Assessor']" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="tabbable wizard">
                                    <ul class="nav nav-tabs steps ">
                                        <li class="active col-md-3">
                                            <a class="wizard-a-link" href="#sub-tab1" data-toggle="tab" aria-expanded="true">
                                                <span class="number pull-left">1.</span>
                                                <p class="wizard-p" style="min-width: 200px;">
                                                    <span class="wizard-span">ជំនាញ</span>
                                                    <br>Area of expertise
                                                </p>
                                            </a>
                                        </li>
                                        <li class="col-md-3">
                                            <a class="wizard-a-link" href="#sub-tab2" data-toggle="tab" aria-expanded="true">
                                                <span class="number pull-left">2.</span>
                                                <p class="wizard-p" style="width: auto; min-width: 200px;">
                                                    <span class="wizard-span">វគ្គបង្រៀន</span>
                                                    <br>Course taught in SDP
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
        
                                    <div class="tab-content form-horizontal">
                                        <div class="tab-pane active" id="sub-tab1">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr style="background: #1f364f; color: #fff">
                                                            <th>Sector</th>
                                                            <th>Division</th>
                                                            <th>Occupation</th>
                                                            <th>Other</th>
                                                            <th style="text-align: right">
                                                                <button type="button" class="btn btn-raised btn-success btn-sm" @click="addTrainerExpert">Add</button>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(item, key) in trainer.experts" :key="key">
                                                            <td>
                                                                @{{ item['Sector'] }}
                                                            </td>
                                                            <td>
                                                                @{{ item['Division'] }}
                                                            </td>
                                                            <td v-if="item['Occupation'] && typeof DimAreaOfexp[item['Division']] == 'object'">
                                                                @{{ [].concat(...Object.values(DimAreaOfexp)).find(x => x['ID'] == item['Occupation'])['Occupation'] }}
                                                            </td>
                                                            <td v-else>
                                                                &nbsp;
                                                            </td>
                                                            <td>
                                                                @{{ item['Other'] }}
                                                            </td>
                                                            <td style="text-align: right">
                                                                <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editTrainerExpert(item)">Edit</button>
                                                                <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteTrainerExpert(item)">Delete</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
        
                                        <div class="tab-pane" id="sub-tab2">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr style="background: #1f364f; color: #fff">
                                                            <th>Course Taught in SDP</th>
                                                            <th style="text-align: right">
                                                                <button type="button" class="btn btn-raised btn-success btn-sm" @click="addTrainerCourse">Add</button>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(item, key) in trainer.courses" :key="key">
                                                            <td>
                                                                @{{ item['Course Taught in SDP'] }}
                                                            </td>
                                                            <td style="text-align: right">
                                                                <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editTrainerCourse(item)">Edit</button>
                                                                <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteTrainerCourse(item)">Delete</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: center">
                    <button type="button" class="btn btn-primary" @click="saveTrainer">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modalTrainerExpert" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#modalTrainer">
        <div class="modal-dialog modal-views">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Area of Exp</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-body form-horizontal">
                        <div class="form-group">
                            {!! Form::Label('EntAssessor', 'វិស័យ/Sector', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select id="Sector" name="Sector" class="form-control" v-model='expert["Sector"]'>
                                    <option v-for="option in AreaOfExpCourse" v-bind:value="option['Area of exp course Type']" >@{{ option['Area of exp course Type'] }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Division', 'ផ្នែក/ Division', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select id="Division" name="Division" class="form-control" v-model='expert["Division"]'>
                                    <option v-for="option in CourseDivision[expert['Sector']]" v-bind:value="option['Division']" >@{{ option['Division'] }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Occupatation', 'មុខរបរ/Occupatation', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select id="Occupation" name="Occupation" class="form-control" v-model='expert["Occupation"]'>
                                    <option v-for="option in DimAreaOfexp[expert['Division']]" v-bind:value="option['ID']" >@{{ option['Occupation'] }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Occupatation', 'ផ្សេងៗ/Other', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <input type="text" v-model = "expert['Other']" class="form-control" />
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" data-dismiss="modal" aria-hidden="true">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modalTrainerCourse" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#modalTrainer">
        <div class="modal-dialog modal-views">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Course Taught List</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-body form-horizontal">
                        <div class="form-group">
                            {!! Form::Label('EntAssessor', 'វិស័យ/Sector', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select id="Course Taught in SDP" name="Course Taught in SDP" class="form-control" v-model='course["Course Taught in SDP"]'>
                                    <option v-for="option in TrainerCoursees" v-bind:value="option['Course']" >@{{ option['Course'] }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" data-dismiss="modal" aria-hidden="true">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAssessor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-views" style="width: 90%; max-width: 1200px;">
            <div class="modal-content load-modal-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="gridModalLabel">Assessors</h4>
                </div>
                <div class="model-body">
                    <div class="container-fluid">
                        <form class="row form-horizontal" data-vv-scope="assessor">
                            <div class="col-md-5">
                                <div class="form-group required" :class = "{'has-error': errors.has('assessor.First name') }" >
                                    {!! Form::Label('First name', 'នាម/First name', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('First name', null, ['v-model' => "assessor['First name']", 'v-validate' => "'required'",'class' => 'form-control']) !!}
                                    </div>
                                </div>
                    
                                <div class="form-group required" :class = "{'has-error': errors.has('assessor.Date of birth') }">
                                    {!! Form::Label('Date of birth', 'ថ្ងៃ ខែ ឆ្នាំ កំណើត/Date of birth', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::date('Date of birth', null, ['v-model' => "assessor['Date of birth']", 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                    
                                <div class="form-group required" :class = "{'has-error': errors.has('assessor.Province') }">
                                    {!! Form::Label('Province', 'ខេត្ត/Province', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        <select id="Province" name="Province" class="form-control" v-validate="'required'" v-model='assessor["Province"]'>
                                            <option v-for="option in ta_provinces[assessor['Country']]" v-bind:value="option['Province']" >@{{ option['Province'] }}</option>
                                        </select>
                                    </div>
                                </div>
                    
                                <div class="form-group required" :class = "{'has-error': errors.has('assessor.Sex') }">
                                    {!! Form::Label('Sex', 'ភេទ/Sex', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Sex',$sex, null, ['v-model' => "assessor['Sex']", 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::Label('Email', 'អ៊ីម៉ែល/Email', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Email', null, ['v-model' => "assessor['Email']" , 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    {!! Form::Label('Contact 1', 'អ្នកទំនាក់ទំនង១/Contact 1', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Contact 1', null, ['v-model' => "assessor['Contact 1']" , 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    {!! Form::Label('Trainer of Assesors', 'Trainer of Assesors', ['class' => 'control-label col-lg-9']) !!}
                                    <div>
                                        <input type="checkbox" true-value="1" false-value="0" v-model="assessor['Trainer of Assesors']"/>            
                                    </div>
                                </div>
                    
                            </div>
                    
                            <div class="col-md-5">
                                <div class="form-group required" :class = "{'has-error': errors.has('assessor.Last name') }">
                                    {!! Form::Label('Last name', 'គោត្តនាម/Last name', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Last name', null, ['v-model' => "assessor['Last name']", 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                    
                    
                                <div class="form-group required" :class = "{'has-error': errors.has('assessor.Country') }">
                                    {!! Form::Label('Country', 'ប្រទេស/Country', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        <select id="Country" name="Country" class="form-control selectpicker" data-live-search="true" v-validate="'required'" v-model='assessor["Country"]'>
                                            <option v-for="option in ta_countries" v-bind:value="option['Country']" >@{{ option['Country'] }}</option>
                                        </select>
                                    </div>
                                </div>
        
                                <div class="form-group required" :class = "{'has-error': errors.has('assessor.District') }">
                                    {!! Form::Label('District', 'ស្រុក/District', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        <select id="District" name="District" class="form-control" v-validate="'required'" v-model='assessor["District"]'>
                                            <option v-for="option in ta_districts[assessor['Province']]" v-bind:value="option['ID']" >@{{ option['District'] }}</option>
                                        </select>
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    {!! Form::Label('Last year of School', 'កំរិតវប្បធម៌/Last year of School', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Last year of School',$last_grade, null, ['v-model' => "assessor['Last year of School']" , 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    {!! Form::Label('Phone number', 'លេខទូរសព្ទ/Phone number', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Phone number', null, ['v-model' => "assessor['Phone number']" , 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                    
                                <div class="form-group">
                                    {!! Form::Label('Contact 1 Number', 'លេខទូរសព្ទ ១/Contact 1 Number', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Contact 1 Number', null, ['v-model' => "assessor['Contact 1 Number']" , 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-md-2">
                                <div class="form-group">                    
                                    
                                    <img src="{{ asset('images/default.png') }}" style="border: 1px solid #DDD;width:100%" id="previewImage">
                                    <div class="text-center">
                                        
                                        <br>
                                        <a class="btn btn-default btn-file">
                                            <i class="icon-file-plus"></i> <span>Browse Image</span>
                                            <input type="file" class="file-input-preview" name="Photo">
                                        </a>
                                        <a class="btn btn-default btn-file btnPhotoRemove">
                                            <span>Remove</span>
                                        </a>
                                    </div>
                                        
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="tabbable wizard">
                                    <ul class="nav nav-tabs steps ">
                                        <li class="active col-md-3">
                                            <a class="wizard-a-link" href="#assessor-tab1" data-toggle="tab" aria-expanded="true">
                                                <span class="number pull-left">1.</span>
                                                <p class="wizard-p" style="min-width: 200px;">
                                                    <span class="wizard-span">ជំនាញ (អាជីព)</span>
                                                    <br>Area of expertise (occupation)
                                                </p>
                                            </a>
                                        </li>
                                        <li class="col-md-3">
                                            <a class="wizard-a-link" href="#assessor-tab2" data-toggle="tab" aria-expanded="true">
                                                <span class="number pull-left">2.</span>
                                                <p class="wizard-p" style="width: auto; min-width: 200px;">
                                                    <span class="wizard-span">វគ្គដែលបានវាយតម្លៃ</span>
                                                    <br>Course Assessed
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
        
                                    <div class="tab-content form-horizontal">
                                        <div class="tab-pane active" id="assessor-tab1">
                                            <div class="table-responsive">
                                                <table class="table ">
                                                    <thead>
                                                        <tr style="background: #1f364f; color: #fff">
                                                            <th>Sector</th>
                                                            <th>Division</th>
                                                            <th>Occupation</th>
                                                            <th>Other</th>
                                                            <th style="text-align: right">
                                                                <button type="button" class="btn btn-raised btn-success btn-sm" @click="addAssessorExpert">Add</button>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(item, key) in assessor.experts" :key="key">
                                                            <td>
                                                                @{{ item['Sector'] }}
                                                            </td>
                                                            <td>
                                                                @{{ item['Division'] }}
                                                            </td>
                                                            <td v-if="item['Occupation'] && typeof DimAreaOfexp[item['Division']] == 'object'">
                                                                @{{ [].concat(...Object.values(DimAreaOfexp)).find(x => x['ID'] == item['Occupation'])['Occupation'] }}
                                                            </td>
                                                            <td v-else>
                                                                &nbsp;
                                                            </td>
                                                            <td>
                                                                @{{ item['Other'] }}
                                                            </td>
                                                            <td style="text-align: right">
                                                                <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editAssessorExpert(item)">Edit</button>
                                                                <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteAssessorExpert(item)">Delete</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
        
                                        <div class="tab-pane" id="assessor-tab2">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr style="background: #1f364f; color: #fff">
                                                            <th>Course Taught in SDP</th>
                                                            <th style="text-align: right">
                                                                <button type="button" class="btn btn-raised btn-success btn-sm" @click="addAssessorCourse">Add</button>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(item, key) in assessor.courses" :key="key">
                                                            <td>
                                                                @{{ item['Course Taught in SDP'] }}
                                                            </td>
                                                            <td style="text-align: right">
                                                                <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editAssessorCourse(item)">Edit</button>
                                                                <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteAssessorCourse(item)">Delete</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div> 
                <div class="modal-footer" style="text-align: center">
                    <button type="button" class="btn btn-primary" @click="saveAssessor">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> 
            </div>
        </div>
    </div>

    <div id="modalAssessorExpert" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#modalTrainer">
            <div class="modal-dialog modal-views">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Area of Exp</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body form-horizontal">
                            <div class="form-group">
                                {!! Form::Label('EntAssessor', 'វិស័យ/Sector', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    <select id="Sector" name="Sector" class="form-control" v-model='expert["Sector"]'>
                                        <option v-for="option in AreaOfExpCourse" v-bind:value="option['Area of exp course Type']" >@{{ option['Area of exp course Type'] }}</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group">
                                {!! Form::Label('Division', 'ផ្នែក/ Division', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    <select id="Division" name="Division" class="form-control" v-model='expert["Division"]'>
                                        <option v-for="option in CourseDivision[expert['Sector']]" v-bind:value="option['Division']" >@{{ option['Division'] }}</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group">
                                {!! Form::Label('Occupatation', 'មុខរបរ/Occupatation', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    <select id="Occupation" name="Occupation" class="form-control" v-model='expert["Occupation"]'>
                                        <option v-for="option in DimAreaOfexp[expert['Division']]" v-bind:value="option['ID']" >@{{ option['Occupation'] }}</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group">
                                {!! Form::Label('Occupatation', 'ផ្សេងៗ/Other', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    <input type="text" v-model = "expert['Other']" class="form-control" />
                                </div>
                            </div>
    
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal" data-dismiss="modal" aria-hidden="true">Save</button>
                    </div>
                </div>
            </div>
        </div>
    
        <div id="modalAssessorCourse" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#modalTrainer">
            <div class="modal-dialog modal-views">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Course Taught List</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel-body form-horizontal">
                            <div class="form-group">
                                {!! Form::Label('EntAssessor', 'វិស័យ/Sector', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    <select id="Course Taught in SDP" name="Course Taught in SDP" class="form-control" v-model='course["Course Taught in SDP"]'>
                                        <option v-for="option in TrainerCoursees" v-bind:value="option['Course']" >@{{ option['Course'] }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal" data-dismiss="modal" aria-hidden="true">Save</button>
                    </div>
                </div>
            </div>
        </div>

    <div class="form-horizontal clearfix">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">
                    <a href="{{ route('provider.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជីអ្នកបណ្ដុះបណ្ដាល | Traning Provider List</a>
                    <div class="pull-right">
                        @if(\Auth::user()->role == 'Administrator')
                            <a href="{{ route('provider.delete', $provider->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</a>
                        @endif 
                        <button type="submit" class="btn btn-raised btn-primary" @click="save"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
                    </div>
                </h3>
            </div>
            <div class="widget-body">
                <div class="row">       
                    <div class="col-md-12">
                        <div class="tabbable wizard">
                            <ul class="nav nav-tabs steps ">
                                <li class="active col-md-3">                        
                                    <a class="wizard-a-link" href="#basic-tab1" data-toggle="tab" aria-expanded="true">
                                        <span class="number pull-left">1.</span> 
                                        <p class="wizard-p" style="min-width: 200px;">
                                            <span class="wizard-span">ព័ត៌មានមូលដ្ឋាន</span>
                                            <br>Basic Information
                                        </p>
                                    </a>
                                </li>
                                <li class="col-md-3">                        
                                    <a class="wizard-a-link" href="#basic-tab2" data-toggle="tab" aria-expanded="true">
                                        <span class="number pull-left">2.</span> 
                                        <p class="wizard-p" style="min-width: 200px;">
                                            <span class="wizard-span">ព័ត៌មាន ទំនាក់ទំនង</span>
                                            <br>Contact Info
                                        </p>
                                    </a>
                                </li>
                                <li class="col-md-3">
                                    <a class="wizard-a-link" href="#basic-tab3" data-toggle="tab" aria-expanded="true">
                                        <span class="number pull-left">3.</span> 
                                        <p class="wizard-p" style="min-width: 200px;">
                                            <span class="wizard-span">អ្នកបង្រៀន</span>
                                            <br>Trainers                               
                                        </p>
                                    </a>
                                </li>
                                <li class="col-md-3">
                                    <a class="wizard-a-link" href="#basic-tab4" data-toggle="tab" aria-expanded="true">
                                        <span class="number pull-left">4.</span> 
                                        <p class="wizard-p" style="min-width: 200px;">
                                            <span class="wizard-span">អ្នកវាយតម្លៃ</span>
                                            <br>Assessors                              
                                        </p>
                                    </a>
                                </li>
                            </ul>
    
                            <div class="tab-content">
                                <div class="tab-pane active" id="basic-tab1">
                                    <form class="form-horizontal" data-vv-scope="basic">
                                        <div class="col-md-12" style="margin-top: 25px">
                                            <div class="form-group required" :class = "{'has-error': errors.has('basic.Name organization_institution') }">
                                                {!! Form::Label('Name organization_institution', 'Orginisation/ Institute', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::Text('Name organization_institution', null, [ 'v-model' => 'item["Name organization_institution"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group required" :class = "{'has-error': errors.has('basic.Type') }">
                                                {!! Form::Label('Type', 'Type', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::Select('Type', $type, null, [ 'v-model' => 'item["Type"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                                </div>
                                            </div>
                    
                                            <div class="form-group required" :class = "{'has-error': errors.has('basic.Sector') }">
                                                {!! Form::Label('Sector', 'Sector/ Focus Area', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::Select('Sector', $sector, null, [ 'v-model' => 'item["Sector"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                                </div>
                                            </div>
                    
                                            <div class="form-group required" :class = "{'has-error': errors.has('basic.Target learner type') }">
                                                {!! Form::Label('Target learner type', 'Target learner type', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::Select('Target learner type',$learner_type, null, [ 'v-model' => 'item["Target learner type"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                            <hr>
                                            <h4>Location</h4>
                    
                                            <div class="form-group required" :class = "{'has-error': errors.has('basic.Country') }">
                                                {!! Form::Label('Country', 'ប្រទេស/Country', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    <select id="Country" name="Country" class="form-control" v-validate="'required'" v-model='item["Country"]'>
                                                        <option v-for="option in ta_countries" v-bind:value="option['Country']" >@{{ option['Country'] }}</option>
                                                    </select>
                                                </div>
                                            </div>
                    
                                            <div class="form-group required" :class = "{'has-error': errors.has('basic.Province') }">
                                                {!! Form::Label('Province', 'ខេត្ត/Province', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    <select id="Province" name="Province" class="form-control" v-validate="'required'" v-model='item["Province"]'>
                                                        <option v-for="option in ta_provinces[item['Country']]" v-bind:value="option['Province']" >@{{ option['Province'] }}</option>
                                                    </select>
                                                </div>
                                            </div>
                    
                                            <div class="form-group required" :class = "{'has-error': errors.has('basic.District') }">
                                                {!! Form::Label('District', 'ស្រុក/District', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    <select id="District" name="District" class="form-control" v-validate="'required'" v-model='item["District"]'>
                                                        <option v-for="option in ta_districts[item['Province']]" v-bind:value="option['ID']" >@{{ option['District'] }}</option>
                                                    </select>
                                                </div>
                                            </div>
                    
                                            <div class="form-group">
                                                {!! Form::Label('Address', 'Address', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::text('Address', null, [ 'v-model' => 'item["Address"]', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div> 
                                    </form> 
                                </div>
                                <div class="tab-pane" id="basic-tab2">
                                    <div class="table-responsive">
                                        <table class="table ">
                                            <thead>
                                                <tr style="background: #1f364f; color: #fff">
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th style="text-align: right"><button type="button" class="btn btn-raised btn-success btn-sm" @click="addContact">Add</button></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, key) in item.contacts" :key="key">
                                                    <td>
                                                        @{{ item['Name'] }}
                                                    </td>
                                                    <td>
                                                        @{{ item['Position'] }}
                                                    </td>
                                                    <td>
                                                        @{{ item['Email'] }}
                                                    </td>
                                                    <td>
                                                        @{{ item['Phone Number'] }}
                                                    </td>
                                                    <td style="text-align: right">
                                                        <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editContact(item)">Edit</button>
                                                        <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteContact(item)">Delete</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                    
                                <div class="tab-pane" id="basic-tab3">
                                    <div class="table-responsive">
                                        <table class="table ">
                                            <thead>
                                                <tr style="background: #1f364f; color: #fff">
                                                    <th>Full Name</th>
                                                    <th>Sex</th>
                                                    <th>Province</th>
                                                    <th>Email</th>
                                                    <th style="text-align: right"><button type="button" class="btn btn-raised btn-success btn-sm" @click="addTrainer">Add</button></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, key) in item.trainers" :key="key">
                                                    <td>
                                                        @{{ item['Full Name'] }}
                                                    </td>
                                                    <td>
                                                        @{{ item['Sex'] }}
                                                    </td>
                                                    <td>
                                                        @{{ item['Province'] }}
                                                    </td>
                                                    <td>
                                                        @{{ item['Email'] }}
                                                    </td>
                                                    <td style="text-align: right">
                                                        <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editTrainer(item)">Edit</button>
                                                        <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteTrainer(item)">Delete</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                    
                                <div class="tab-pane" id="basic-tab4">
                                    <div class="table-responsive">
                                        <table class="table ">
                                            <thead>
                                                <tr style="background: #1f364f; color: #fff">
                                                    <th>Full Name</th>
                                                    <th>Sex</th>
                                                    <th>Phone Number</th>
                                                    <th>Email</th>
                                                    <th style="text-align: right"><button type="button" class="btn btn-raised btn-success btn-sm" @click="addAssessor">Add</button></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, key) in item.assessors" :key="key">
                                                    <td>
                                                        @{{ item['Full Name'] }}
                                                    </td>
                                                    <td>
                                                        @{{ item['Sex'] }}
                                                    </td>
                                                    <td>
                                                        @{{ item['Phone number'] }}
                                                    </td>
                                                    <td>
                                                        @{{ item['Email'] }}
                                                    </td>
                                                    <td style="text-align: right">
                                                        <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editAssessor(item)">Edit</button>
                                                        <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteAssessor(item)">Delete</button>
                                                    </td>
                                                </tr>
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
    </div>
   

@endsection

@push('scripts')

<script type="text/javascript">
    var errors =  {};
    var app = new Vue({

        el: '#App',

        data: {
            item: {!! $provider->toJson() !!},
            contact: {},
            trainer: {},
            assessor: {},
            expert: {},
            course: {},
            AreaOfExpCourse: {!! $AreaOfExpCourse->toJson() !!},
            CourseDivision: {!! $CourseDivision->toJson() !!},
            DimAreaOfexp: {!! $DimAreaOfexp->toJson() !!},
            TrainerCoursees: {!! $TrainerCoursees->toJson() !!},
            ta_countries: {!! $ta_countries !!},
            ta_provinces: {!! $ta_provinces !!},
            ta_districts: {!! $ta_districts !!},
            
        },

        created() {
        //console.log([].concat(...Object.values(this.owners)).find(x => x['OM at Intake.ID'] == 55)['Full Name'])
        },

        methods: {
            
            initialize: function () {
                
            },
        
            addContact: function() {
                this.contact = {}
                this.contact['Organisation'] = this.item.ID
                $("#modalContact").modal("show");
            },

            editContact: function(item) {
                const index = this.item.contacts.indexOf(item)
                this.contact = item
                this.contact["index"] = index
                $("#modalContact").modal("show");
            },

            deleteContact: function(item) {
                const index = this.item.contacts.indexOf(item)
                this.item.contacts.splice(index, 1)
            },

            saveContact(){
                var vm = this;
                this.$validator.validate('contact.*').then((result) => {
                    if (result) {
                        if(this.contact.index != undefined){
                            $('#overlay').css('display', 'block');
                            axios.put('{{ route('providercontact.index') }}/' + vm.contact.ID, vm.contact)
                                .then(function(response){
                                    if(response.data.updated){
                                        $("#modalContact").modal("hide");
                                        $('#overlay').css('display', 'none');
                                        Object.assign(vm.item.contacts[vm.contact.index], response.data.data)
                                        vm.initialize();
                                    }else{
                                        console.log('Failed')
                                    }
                                }).catch((err) => {
                                    console.log('Catched Error' + err)
                                });
                        } else {
                            $('#overlay').css('display', 'block');
                            axios.post('{{ route('providercontact.store') }}', vm.contact)
                                .then(function(response){
                                    if(response.data.created){
                                        $("#modalContact").modal("hide");
                                        $('#overlay').css('display', 'none');
                                        vm.item.contacts.push(response.data.data);
                                        vm.initialize();
                                    }else{
                                        console.log('Failed')
                                    }
                                }).catch((err) => {
                                    console.log('Catched Error' + err)
                                });
                        }
                    }
                });
            },

            // Trainer
            addTrainer: function() {
                this.trainer = {
                    experts : [],
                    courses : [],
                }
                this.trainer['Organisation'] = this.item.ID
                $("#modalTrainer").modal("show");
            },

            editTrainer: function(item) {
                const index = this.item.trainers.indexOf(item)
                this.trainer = item
                this.trainer["index"] = index
                $("#modalTrainer").modal("show");
            },

            deleteTrainer: function(item) {
                const index = this.item.trainers.indexOf(item)
                this.item.trainers.splice(index, 1)
                if (confirm('Are you sure you want to delete this item?')) {
                    axios.delete('{{ route('providertrainer.index') }}/' + item.ID)
                    .then(function(response){
                        if(response.data.deleted){
                            this.item.trainers.splice(index, 1)
                        }else{
                            alert("Failed")
                        }
                    }).catch(function () {
                        
                    })
                } 
            },

            saveTrainer(){
                var vm = this;
                this.$validator.validate('trainer.*').then((result) => {
                    if (result) {
                        if(this.trainer.index != undefined){
                            $('#overlay').css('display', 'block');
                            axios.put('{{ route('providertrainer.index') }}/' + vm.trainer.ID, vm.trainer)
                                .then(function(response){
                                    if(response.data.updated){
                                        $("#modalTrainer").modal("hide");
                                        $('#overlay').css('display', 'none');
                                        Object.assign(vm.item.trainers[vm.trainer.index], response.data.data)
                                        vm.initialize();
                                    }else{
                                        console.log('Failed')
                                    }
                                }).catch((err) => {
                                    console.log('Catched Error' + err)
                                });
                        } else {
                            $('#overlay').css('display', 'block');
                            axios.post('{{ route('providertrainer.store') }}', vm.trainer)
                                .then(function(response){
                                    if(response.data.created){
                                        $("#modalTrainer").modal("hide");
                                        $('#overlay').css('display', 'none');
                                        vm.item.trainers.push(response.data.data);
                                        vm.initialize();
                                    }else{
                                        console.log('Failed')
                                    }
                                }).catch((err) => {
                                    console.log('Catched Error' + err)
                                });
                        }
                    }
                });
            },

            addTrainerExpert: function() {
                this.expert= {}
                this.trainer.experts.push(this.expert)
                $("#modalTrainerExpert").modal("show");
            },

            editTrainerExpert: function(item) {
                this.expert = item
                $("#modalTrainerExpert").modal("show");
            },

            deleteTrainerExpert: function(item) {
                const index = this.trainer.experts.indexOf(item)
                this.trainer.experts.splice(index, 1)
            },

            addTrainerCourse: function() {
                this.course= {}
                this.trainer.courses.push(this.course)
                $("#modalTrainerCourse").modal("show");
            },

            editTrainerCourse: function(item) {
                this.course = item
                $("#modalTrainerCourse").modal("show");
            },

            deleteTrainerCourse: function(item) {
                const index = this.trainer.courses.indexOf(item)
                this.trainer.courses.splice(index, 1)
            },

            // Assessor
            addAssessor: function() {
                this.assessor = {
                    experts: [],
                    courses: []
                }
                this.assessor['Organisation'] = this.item.ID
                $("#modalAssessor").modal("show");
            },

            editAssessor: function(item) {
                const index = this.item.assessors.indexOf(item)
                this.assessor = item
                this.assessor["index"] = index
                $("#modalAssessor").modal("show");
            },

            deleteAssessor: function(item) {
                const index = this.item.assessors.indexOf(item)
                this.item.assessors.splice(index, 1)
            },

            saveAssessor(){
                var vm = this;
                this.$validator.validate('assessor.*').then((result) => {
                    if (result) {
                        if(this.assessor.index != undefined){
                            $('#overlay').css('display', 'block');
                            axios.put('{{ route('providerassessor.index') }}/' + vm.assessor.ID, vm.assessor)
                                .then(function(response){
                                    if(response.data.updated){
                                        $("#modalAssessor").modal("hide");
                                        $('#overlay').css('display', 'none');
                                        Object.assign(vm.item.assessors[vm.assessor.index], response.data.data)
                                        vm.initialize();
                                    }else{
                                        console.log('Failed')
                                    }
                                }).catch((err) => {
                                    console.log('Catched Error' + err)
                                });
                        } else {
                            $('#overlay').css('display', 'block');
                            axios.post('{{ route('providerassessor.store') }}', vm.assessor)
                                .then(function(response){
                                    if(response.data.created){
                                        $("#modalAssessor").modal("hide");
                                        $('#overlay').css('display', 'none');
                                        vm.item.assessors.push(response.data.data);
                                        vm.initialize();
                                    }else{
                                        console.log('Failed')
                                    }
                                }).catch((err) => {
                                    console.log('Catched Error' + err)
                                });
                        }
                    }
                });
            },

            addAssessorExpert: function() {
                this.expert= {}
                this.assessor.experts.push(this.expert)
                $("#modalAssessorExpert").modal("show");
            },

            editAssessorExpert: function(item) {
                this.expert = item
                $("#modalAssessorExpert").modal("show");
            },

            deleteAssessorExpert: function(item) {
                const index = this.assessor.experts.indexOf(item)
                this.assessor.experts.splice(index, 1)
            },

            addAssessorCourse: function() {
                this.course= {}
                this.assessor.courses.push(this.course)
                $("#modalAssessorCourse").modal("show");
            },

            editAssessorCourse: function(item) {
                this.course = item
                $("#modalAssessorCourse").modal("show");
            },

            deleteAssessorCourse: function(item) {
                const index = this.assessor.courses.indexOf(item)
                this.assessor.courses.splice(index, 1)
            },


            // Save
            save: function( ){
                var vm = this;
                this.$validator.validate('basic.*').then((result) => {
                    if (result) {
                        $('#overlay').css('display', 'block');
                        axios.put('{{ route('provider.index') }}/' + vm.item.ID, vm.item)
                            .then(function(response){
                                if(response.data.updated){
                                    $('#overlay').css('display', 'none');
                                }else{
                                    console.log('Failed')
                                }
                            }).catch((err) => {
                                let errors = err.response.data.errors;
                                if (errors) {
                                    for (let field in errors) {
                                        vm.errors.add(field, errors[field])
                                    }
                                }
                            });
                    }
                })
            }
        },
        
    });

</script>

@endpush