@extends('app')

@section('title')

    CREATE TRAINING PROVIDER

@endsection

@section('content')

     {!! Form::open(['method' => 'PUT', 'class' => 'form-horizontal clearfix']) !!}
    
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">
                    <a href="{{ route('provider.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i> All trainee</a>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-raised btn-success"><i class="ti-save mr-5"></i> Save</button>
                    </div>
                </h3>
            </div>
            <div class="widget-body">
                <div class="wizard">
                    <div class="steps clearfix">
                        <ul role="tablist">
                            <li role="tab" class="disabled">
                                <a class="wizard-a-link">
                                    <span class="number pull-left">1.</span> 
                                    <p class="wizard-p">
                                        <span class="wizard-span">ព័ត៌មានមូលដ្ឋាន </span>
                                        <br> Basic Information
                                    </p>
                                </a>
                            </li>
                            <li role="tab" class="first current">
                                <a  class="wizard-a-link">
                                    <span class="number pull-left">2.</span> 
                                    <p class="wizard-p">
                                        <span class="wizard-span">ព័ត៍មាន ទំនាក់ទំនង</span>
                                        <br>Contact Info
                                    </p>
                                </a>
                            </li>
                            <li role="tab" class="disabled">
                                <a class="wizard-a-link">
                                    <span class="number pull-left">3.</span> 
                                    <p class="wizard-p">
                                        <span class="wizard-span">អ្នកបង្រៀន</span>
                                        <br>Trainers
                                    </p>
                                </a>
                            </li>
                            <li role="tab" class="disabled">
                                <a class="wizard-a-link">
                                    <span class="number pull-left">4.</span> 
                                    <p class="wizard-p">
                                        <span class="wizard-span">អ្នកវាយតម្លៃ</span>
                                        <br>Assessors
                                    </p>
                                </a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Name</td>
                                    <td>Position</td>
                                    <td>Email</td>       
                                    <td>Phone Number</td>
                                    <td>Organisation</td>             
                                </tr>

                                


                                


                            </table>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                {!! Form::Label('Name', 'Name', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6 no-padding">
                                    {!! Form::Text('Name', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::Label('Email', 'Email', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6 no-padding">
                                    {!! Form::Text('Email', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group required">
                                {!! Form::Label('Organisation', 'Organisation', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6 no-padding">
                                    {!! Form::Select('Organisation',$organisation, null, ['required' => 'required', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                        </div>
                        
                        <div class="col-md-4">

                            <div class="form-group">
                                {!! Form::Label('Position', 'Position', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6 no-padding">
                                    {!! Form::Text('Position', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::Label('Phone Number', 'Phone Number', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6 no-padding">
                                    {!! Form::Text('Phone Number', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>    
            </div>
        </div>
    {{ Form::close() }}
@endsection