@extends('app')

@section('title')

កែប្រែព័ត៌មានសិក្ខាកាម | EDIT TRIAINEE

@endsection

@section('content')

<div class="modal fade" id="modalSupport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-dialog-centered" style="width: 90%; max-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Post Training Support</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form  class="row form-horizontal" data-vv-scope="support">
                        <div class="col-lg-12">
                
                            <div class="form-group required"  :class = "{'has-error': errors.has('support.DatePTS') }">
                                {!! Form::Label('DatePTS', 'ការគាំទ្រកាលបរិច្ឆេទត្រូវបានផ្តល់ជូន/ Date support provided', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Date('DatePTS', null, [ 'v-model' => 'support["DatePTS"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::Label('Topic', 'ប្រភេទនៃការគាំទ្រដែលបានផ្តល់/ Type of support provided', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Select('Topic', $dimSupportTypes, null, [ 'v-model' => 'support["Topic"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div v-show="support['Topic'] == '3'">
                                <h4 style="padding-top:10px; padding-bottom:10px;">ប្រសិនបើអ្នកផ្តល់ការគាំទ្រផ្នែកហិរញ្ញវត្ថុ សូមបញ្ជូលទឹកប្រាក៉/ If financial support is provided, please enter the amount</h4>

                                <div class="form-group">
                                    {!! Form::Label('Amount $', 'ចំនួនទឹកប្រាក់ (ដុល្លារ) / Amount $', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Amount $', null, [ 'v-model' => 'support["Amount $"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::Label('If money use', 'គោលចំណងនៃកាប្រើប្រាស់ទឹកប្រាក់/Describe how the money will be used', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::TextArea('If money use', null, [ 'v-model' => 'support["If money use"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::Label('describe_detail', 'សូមបញ្ជាក់លំអិត(បើមាន)/Please describe detail if any', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::TextArea('describe_detail', null, [ 'v-model' => 'support["describe_detail"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-primary" @click="saveSupport(support.index)">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEmployment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-dialog-centered" style="width: 90%; max-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Post Training Employment</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form  class="row form-horizontal" data-vv-scope="employment">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    {!! Form::Label('Is graduate traceble', 'តើអាចទាក់ទងទៅសិស្សបញ្ចប់ការបណ្ដុះបណ្ដាលបានដែរឬទេ? Is graduate traceable? ', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Is graduate traceble', $yesornos , null, ['@change' => 'onChangeTracebleReason', 'v-model' => 'employment["Is graduate traceble"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" v-show='employment["Is graduate traceble"] == "ទេ/No"'>
                                    {!! Form::Label('Reason description', 'ប្រសិនបើទេ សូមជួយសរសេរពីមូលហេតុខាងក្រោម If no, reason description', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Reason description', null, [ 'v-model' => 'employment["Reason description"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-show='employment["Is graduate traceble"] != "ទេ/No"'>
                            <div class="row">
                                <div class="col-lg-6"> 
                                <div v-if='employment["Is graduate traceble"] != "ទេ/No"' class="form-group required" :class = "{'has-error': errors.has('employment.Employment status') }">
                                        {!! Form::Label('Employment status', 'ស្ថានភាពការងារក្នុងរយះពេល/ Employment status', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Select('Employment status', $employmentStatuses , null, [ 'v-model' => 'employment["Employment status"]', 'v-validate' => '"required"', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div v-if='employment["Is graduate traceble"] == "ទេ/No"' class="form-group" :class = "{'has-error': errors.has('employment.Employment status') }">
                                        {!! Form::Label('Employment status', 'ស្ថានភាពការងារក្នុងរយះពេល/ Employment status', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Select('Employment status', $employmentStatuses , null, [ 'v-model' => 'employment["Employment status"]', 'v-validate' => '""', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group" v-show="employment['Employment status'] != 1">
                                        {!! Form::Label('Date', 'ថ្ងៃខែឆ្នាំចូលបម្រើការងារ/Date got employed', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Date('Date', null, [ 'v-model' => 'employment["Date"]', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div v-show="employment['Employment status'] == '2'" class="col-lg-6">
                                    <div class="form-group">
                                        {!! Form::Label('Enterprise Name', 'ឈ្មោះសហគ្រាស​/Name of enterprise', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            <select name="Enterprise Name" class="form-control" v-model='employment["Enterprise Name"]'>
                                                <option v-for="option in enterprises" v-bind:value="option['ID']" >@{{ option['Name of enterprise'] }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div v-show="employment['Employment status'] == '3'" class="col-lg-6">
                                    
                                    <div class="form-group">
                                        {!! Form::Label('If self-emp, business type', 'If self-employed, enter business type', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Text('If self-emp, business type', null, [ 'v-model' => 'employment["If self-emp, business type"]', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::Label('Location business', 'If self employed, enter business location', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            <select name="Location business" class="form-control" v-model='employment["Location business"]'>
                                                <option v-for="option in provinces" v-bind:value="option['Province']" >@{{ option['Province'] }}</option>
                                            </select>    
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row" v-show="employment['Employment status'] != 1">
                                        <div class="col-lg-12">
                                            <h4 style="padding-top:10px; padding-bottom:10px; padding-left:5px">Please enter the monthly income that graduates make. If they receive a commission, ask the graduate how much he/she has received in the past months in average</h4>
                                        </div>
                                    </div>

                                    <div class="row" v-show="employment['Employment status'] != 1">

                                        <div class="col-lg-6">
                                            
                                            <div class="form-group">
                                                {!! Form::Label('Commission per client', 'តើសិក្ខាកាមទទួលបានភាគរយ ជំនួសប្រាក់ខែទេ?​ Does graduate receive commission as their monthly income?', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::Select('Commission per client', $yesornos , null, [ 'v-model' => 'employment["Commission per client"]', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group" v-show="employment['Commission per client'] == 'បាទ/Yes'">
                                                {!! Form::Label('If comission, describe', 'ប្រសិនបើទទួលបានភាគរយ សូមបញ្ជាក់ចំនួន/ភាគរយ/ If yes, please enter amount or percentage received', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::Text('If comission, describe', null, [ 'v-model' => 'employment["If comission, describe"]', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row" v-show="employment['Employment status'] != 1">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                {!! Form::Label('Salary (Riel)', 'ប្រាក់ខែ  រៀល/ Monthly Income (Riel)', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::Text('Salary (Riel)', null, [ 'v-model' => 'employment["Salary (Riel)"]', 'class' => 'form-control']) !!}
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                {!! Form::Label('Salary (USD)', 'ប្រាក់ខែ  ដុល្លា/ Monthly Income (USD)', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                {!! Form::Text('Salary (USD)', null, [ 'v-model' => 'employment["Salary (USD)"]', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>    
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        <div v-show="employment['Employment status'] != '1'" class="col-lg-12">
                                            <hr>
                                            <div class="form-group">
                                                {!! Form::Label('Accommodation support', 'ទទួលបានការឧបត្ថម្ភលើការស្នាក់នៅ?/Receive accommodation support?', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::Select('Accommodation support', $yesornos , null, [ '@change'=>'onChangeAccommondationSupport', 'v-model' => 'employment["Accommodation support"]', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="form-group" v-show='employment["Accommodation support"] == "បាទ/Yes"'>
                                                {!! Form::Label('Accommodation support description', 'ពិពណ៌នាលើការឧបត្ថម្ភការស្នាក់នៅ/Accommodation support description', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::Text('Accommodation support description', null, [ 'v-model' => 'employment["Accommodation support description"]', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::Label('Food support', 'ទទួលបានការឧបត្ថម្ភលើអាហារ?/Receive food support?', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::Select('Food support', $yesornos , null, [ '@change'=>'onChangeFoodSupport', 'v-model' => 'employment["Food support"]', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="form-group" v-show='employment["Food support"] == "បាទ/Yes"'>
                                                {!! Form::Label('Food support description', 'ពិពណ៌នាលើការឧបត្ថម្ភលើអាហារ/Receive food support description', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::Text('Food support description', null, [ 'v-model' => 'employment["Food support description"]', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::Label('Transport support', 'ទទួលបានការឧបត្ថម្ភលើការធ្វើដំណើរ?/Receive transport support?', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::Select('Transport support', $yesornos , null, [ '@change'=>'onChangeTransportSupport', 'v-model' => 'employment["Transport support"]', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="form-group" v-show='employment["Transport support"] == "បាទ/Yes"'>
                                                {!! Form::Label('Transport support description', 'ពិពណ៌នាលើការឧបត្ថម្ភក្នុងការធ្វើដំណើរ/Receive transport support description', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::Text('Transport support description', null, [ 'v-model' => 'employment["Transport support description"]', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::Label('Free days a week', 'មានថ្ងៃឈប់សំរាកក្នុងមួយអាទិត្យ?/Gets free days during the week?', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::Select('Free days a week', $yesornos , null, [ 'v-model' => 'employment["Free days a week"]', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                {!! Form::Label('How many off days', 'ប្រសិនបើមាន  តើប៉ុន្មានថ្ងៃIf yes, how many off days', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::Text('How many off days', null, [ 'v-model' => 'employment["How many off days"]', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" v-show="employment['Employment status'] == 1">
                                            <hr>
                                            <div class="form-group">
                                                {!! Form::Label('reason_unemployment', 'មូលហេតុនៃការគ្មានការងារធ្វើ/ Reason of unemployment', ['class' => 'control-label col-lg-6']) !!}
                                                
                                                <div class="col-lg-6">
                                                    {!! Form::Select('reason_unemployment', $listUnemployment , null, ['@change' => 'onChangeReasonUnemployment', 'v-model' => 'employment["reason_unemployment"]', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="col-md-12" v-if='employment["reason_unemployment"] == 2 || employment["reason_unemployment"] == 11'>
                                            <div class="form-group">
                                                {!! Form::Label('comments_unemployment', 'សូមជួយសរសេរពីមូលហេតុខាងក្រោម/ please write comments why', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::TextArea('comments_unemployment', null, [ 'v-model' => 'employment["comments_unemployment"]', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- <div class="col-md-12" v-show="employment['Employment status'] == 1">
                                            <hr>
                                            <div class="form-group">
                                                {!! Form::Label('Comments', 'ប្រសិនបើសិស្សអត់មានការងារ សូមជួយសរសេរពីមូលហេតុខាងក្រោម/ If trainee does not have or want to get a job, please write comments why', ['class' => 'control-label col-lg-6']) !!}
                                                <div class="col-lg-6">
                                                    {!! Form::TextArea('Comments', null, [ 'v-model' => 'employment["Comments"]', 'class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-primary" @click="saveEmployment(employment.index)">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<form class="form-horizontal wizard clearfix">
    <div class="widget">
        <div class="widget-heading">
            <h3 class="widget-title">
                <a href="{{ route('trainee.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i> ​បញ្ជីសិក្ខាកាម |​ All trainee</a>
            </h3>
        </div>
        <div class="widget-body support">
            <div class="wizard">
                <div class="steps clearfix">
                    <ul role="tablist">
                        <li role="tab" class="first disabled">
                            <a href="{{ route('trainee.edit', ['trainee' => $trainee]) }}" class="wizard-a-link">
                                <span class="number pull-left">1.</span> 
                                <p class="wizard-p">
                                    <span class="wizard-span">ប្រវត្តិរូប </span>
                                    <br> Profile
                                </p>
                            </a>
                        </li>
                        <li role="tab" class="disabled">
                            <a href="{{ route('trainee.edit.section', ['trainee' => $trainee, 'section' => 'training']) }}" class="wizard-a-link">
                                <span class="number pull-left">2.</span> 
                                <p class="wizard-p">
                                    <span class="wizard-span">វគ្គបណ្តុះបណ្តាល </span>
                                    </br>Training Course
                                </p>
                            </a>
                        </li>
                        <li role="tab" class="current">
                            <a class="wizard-a-link">
                                <span class="number pull-left">3.</span> 
                                <p class="wizard-p">
                                    <span class="wizard-span">ការគាំទ្រក្រោយវគ្គ </span>
                                    </br>Post Training Support
                                </p>
                            </a>
                        </li>
                        @if(\Auth::user()->role == "Administrator")
                        <li role="tab" class="disabled">
                            <a href="{{ route('trainee.edit.section', ['trainee' => $trainee, 'section' => 'follow']) }}" class="wizard-a-link">
                                <span class="number pull-left">4.</span> 
                                <p class="wizard-p">
                                    <span class="wizard-span">ការតាមដានក្រោយវគ្គ </span>
                                    </br>Follow up
                                </p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="content clearfix">
                    <div class="tabbable wizard sub">
                        <ul class="nav nav-tabs steps">
                            <li class="active col-md-3">                        
                                <a class="wizard-a-link" href="#basic-tab2" data-toggle="tab" aria-expanded="true">
                                    <p class="wizard-p" style="min-width: 200px;">
                                    <!-- <span class="wizard-span">ការគាំទ្រការបណ្តុះបណ្តាលដែលបានចូលប្រើ</span><br> -->
                                    <span class="wizard-span">ការគាំទ្រដែលទទួលបានពីមជ្ឈមណ្ឌល</span><br>
                                        <span>Support Accessed</span>                                
                                    </p>
                                </a>
                            </li>
                            <li class="col-md-3">                        
                                <a class="wizard-a-link" href="#basic-tab3" data-toggle="tab" aria-expanded="true">
                                    <p class="wizard-p" style="min-width: 200px;">
                                    <!-- <span class="wizard-span">ការទទួលបានការគាំទ្រផ្នែកការងារ</span><br> -->
                                    <span class="wizard-span">ស្ថានភាពការងារក្រោយវគ្គ</span><br>
                                        <span>Post Training Employment</span>                                
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="tab-content">
                        <div class="tab-pane active" id="basic-tab2">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr style="background: #1f364f; color: #fff">
                                            <th>Date Support</th>
                                            <th>Type Support</th>
                                            <th>Amount</th>
                                            <th style="text-align: right">
                                                <button type="button" class="btn btn-raised btn-success btn-sm" @click="addSupport">Add</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, key) in supports" :key="key">
                                            <td>
                                                @{{ item['DatePTS'] }}
                                            </td>
                                            <td>
                                                @{{ typeSupports[item['Topic']] }}
                                            </td>
                                            <td>
                                                @{{ item['Amount $'] }}
                                            </td>
                                            <td style="text-align: right">
                                                <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editSupport(item)">Edit</button>
                                                <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteSupport(item)">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                        </div>

                        <div class="tab-pane" id="basic-tab3">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="background: #1f364f; color: #fff">
                                        <tr>
                                            <th>Date</th>
                                            <th>Traceble status</th>
                                            <th>Employment status</th>
                                            <th>Enterprise Name</th>
                                            <th>Salary (Riel)</th>
                                            <th>Salary (USD)</th>
                                            <th style="text-align: right"><button type="button" class="btn btn-raised btn-success btn-sm" @click="addEmployment">Add</button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, key) in employments" :key="key">
                                            <td>
                                                @{{ item['Date'] }}
                                            </td>
                                            <td>
                                                @{{ item['Is graduate traceble'] }}
                                            </td>
                                            <td>
                                                @{{ employmentstatuses[item['Employment status']] }}
                                            </td>
                                            <td v-if="item['Enterprise Name'] && typeof enterprises == 'object'">
                                                @{{ [].concat(...Object.values(enterprises)).find(x => x['ID'] == item['Enterprise Name'])['Name of enterprise'] }}
                                            </td>
                                            <td v-else>
                                                &nbsp;
                                            </td>
                                            <td>
                                                @{{ item['Salary (Riel)'] }}
                                            </td>
                                            <td>
                                                @{{ item['Salary (USD)'] }}
                                            </td>
                                            <td style="text-align: right">
                                                <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editEmployment(item)">Edit</button>
                                                <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteEmployment(item)">Delete</button>
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
</form>

@endsection

@push('scripts')

    <script type="text/javascript">

        var app = new Vue({
            el: '#App',
            data: {
                support: {},
                supports: {!! $supports !!},
                employment: {},
                employments: {!! $employments !!},
                coursetopics: {!! $coursetopics !!},
                coursecodes: {!! $coursecodes !!},
                courselocations: {!! $courselocations !!},
                batchopens: {!! $batchopens !!},
                providers: {!! $providers !!},
                enterprises: {!! $enterprises !!},
                industries: {!! $industries !!},
                provinces: {!! $province !!},
                employmentstatuses: {!! $employmentStatuses !!},
                typeSupports: {!! $dimSupportTypes !!},
                supportAccomon: '',
                supportFood: '',
                supportTransport: '',
                supportTraceble: ''
            },

            created() {
                this.initialize()
            },

            methods: {
                
                initialize: function(){
                    this.support = {}
                    this.support["Personal ID"] = {!! $trainee !!}
                    this.employment = {}
                    this.employment["Personal ID"] = {!! $trainee !!}
                    this.supportAccomon = this.employments[0]["Accommodation support description"]
                    this.supportFood = this.employments[0]["Food support description"]
                    this.supportTransport = this.employments[0]["Transport support description"]
                    this.supportTracebleReason = this.employments[0]["Reason description"]
                },

                onChangeReasonUnemployment: function(){
                    if(this.employment["reason_unemployment"] == '2' || this.employment["reason_unemployment"] == '11'){
                        
                    }else{
                        this.employment["comments_unemployment"] = ''
                    }
                    // alert(this.employment["reason_unemployment"]);
                },

                onChangeTracebleReason: function() {
                    // traceble onchange set description value
                    if(this.employment["Is graduate traceble"]  == "បាទ/Yes"){
                        this.employment["Reason description"] = this.supportTracebleReason
                    }else{
                        this.employment["Reason description"] = null
                    }
                },

                onChangeAccommondationSupport: function() {
                    // accommodation support onchange set description value
                    if(this.employment["Accommodation support"]  == "បាទ/Yes"){
                        this.employment["Accommodation support description"] = this.supportAccomon
                    }else{
                        this.employment["Accommodation support description"] = null
                    }
                },

                onChangeFoodSupport: function() {
                    // food support onchange set description value
                    if(this.employment["Food support"] == "បាទ/Yes"){
                        this.employment["Food support description"] = this.supportFood
                    }else{
                        this.employment["Food support description"] = null
                    }
                },

                onChangeTransportSupport: function() {
                    // transpot support onchange set description value
                    if(this.employment["Transport support"] == "បាទ/Yes"){
                        this.employment["Transport support description"] = this.supportTransport
                    }else{
                        this.employment["Transport support description"] = null
                    }
                },

                addSupport: function() {
                    $('#modalSupport').modal('show');
                },

                editSupport: function(item) {
                    const index = this.supports.indexOf(item)
                    this.support = item
                    this.support["index"] = index
                    $("#modalSupport").modal("show");
                },

                deleteSupport: function(item) {
                    var vm = this;
                
                    if (confirm('Are you sure you want to delete this item?')) {
                        axios.delete('{{ route('posttrainingsupport.index') }}/' + item.ID)
                        .then(function(response){
                            if(response.data.deleted){
                                console.log('deleted')
                                const index = vm.supports.indexOf(item)
                                vm.supports.splice(index, 1)
                                
                            }else{
                                console.log('Failed')
                            }
                        }).catch(function () {
                            console.log('Cached Error')
                        })
                    } 
                },

                saveSupport: function(index){
                    var vm = this;
                    this.$validator.validate('support.*').then((result) => {
                        if (result) {
                            if(this.support.index != undefined){
                                $('#overlay').css('display', 'block');
                                axios.put('{{ route('posttrainingsupport.index') }}/' + vm.support.ID, vm.support)
                                    .then(function(response){
                                        if(response.data.updated){
                                            $("#modalSupport").modal("hide");
                                            $('#overlay').css('display', 'none');
                                            Object.assign(vm.supports[vm.support.index], response.data.data)
                                            vm.initialize();
                                        }else{
                                            console.log('Failed')
                                        }
                                    }).catch((err) => {
                                        console.log('Catched Error' + err)
                                    });
                            } else {
                                $('#overlay').css('display', 'block');
                                axios.post('{{ route('posttrainingsupport.store') }}', vm.support)
                                    .then(function(response){
                                        if(response.data.created){
                                            $("#modalSupport").modal("hide");
                                            $('#overlay').css('display', 'none');
                                            vm.supports.push(response.data.data);
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

                // Employment
                addEmployment: function() {
                    $('#modalEmployment').modal('show');
                },

                editEmployment: function(item) {
                    const index = this.employments.indexOf(item)
                    this.employment = item
                    this.employment["index"] = index
                    $("#modalEmployment").modal("show");
                },

                deleteEmployment: function(item) {
                    var vm = this;
                
                    if (confirm('Are you sure you want to delete this item?')) {
                        axios.delete('{{ route('posttrainingemployment.index') }}/' + item.ID)
                        .then(function(response){
                            if(response.data.deleted){
                                console.log('deleted')
                                const index = vm.employments.indexOf(item)
                                vm.employments.splice(index, 1)
                                
                            }else{
                                console.log('Failed')
                            }
                        }).catch(function () {
                            console.log('Cached Error')
                        })
                    } 

                },

                saveEmployment: function(index){
                    var vm = this;
                    this.$validator.validate('employment.*').then((result) => {
                        if (result) {
                            if(this.employment["Is graduate traceble"] == "ទេ/No"){
                                this.employment["Employment status"] = null
                            }
                            if(this.employment.index != undefined){
                                $('#overlay').css('display', 'block');
                                axios.put('{{ route('posttrainingemployment.index') }}/' + vm.employment.ID, vm.employment)
                                    .then(function(response){
                                        if(response.data.updated){
                                            $("#modalEmployment").modal("hide");
                                            $('#overlay').css('display', 'none');
                                            Object.assign(vm.employments[vm.employment.index], response.data.data)
                                            vm.initialize();
                                        }else{
                                            console.log('Failed')
                                        }
                                    }).catch((err) => {
                                        console.log('Catched Error' + err)
                                    });
                            } else {
                                $('#overlay').css('display', 'block');
                                axios.post('{{ route('posttrainingemployment.store') }}', vm.employment)
                                    .then(function(response){
                                        if(response.data.created){
                                            $("#modalEmployment").modal("hide");
                                            $('#overlay').css('display', 'none');
                                            vm.employments.push(response.data.data);
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

            }
        });

    </script>

@endpush