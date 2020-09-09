@extends('app')

@push('styles')
    <style type="text/css">
        h4{
            padding-top:15px;
            padding-bottom:15px;
        }
        btn-primary{
            padding-top:15px;
            padding-bottom:15px;
        }
    </style>
@endpush

@section('title')
@endsection

@section('content')

    <div class="widget">
        <div class="widget-heading">
            <h4 class="widget-title">
                <a href="{{ route('trainer-survey.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជី​ | Trainer Survey List</a>
                <div class="pull-right">
                    <a href="{{ route('trainer-survey.edit', $trainerSurvey->ID) }}" target="_blank" class="btn btn-raised btn-warning"><i class="ti-pencil mr-5"></i>កែប្រែ | Update</a>
                    <a href="{{ route('trainer-survey.delete', $trainerSurvey->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</a>
                </div>
            </h4>
        </div>
            <div class="panel-body form-horizontal">
                <div class="col-md-7">
                    <div class="form-group">
                    {!! Form::Label('Course Batch ID', 'Batch ID', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ $trainerSurvey->batch->{'FullBatchID'} }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('Training Provider', 'Training Provider', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ $trainerSurvey->provider->{'Name organization_institution'} }}
                            
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('Name Of Trainer', 'Name Of Trainer', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ $trainerSurvey->trainer->{'Full Name'} }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('Subject trainer gave', 'Subject trainer gave', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ $trainerSurvey->{'Subject trainer gave'} }}
                        </div>
                    </div>

                    <h4>Training Provider Feedback</h4>
                    <div class="form-group">
                        {!! Form::Label('The Trainer’s explanations were clear', '1a.   The Trainer’s explanations were clear', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ $trainerSurvey->{'The Trainer’s explanations were clear'} }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('The Trainer demonstrated the theory with practice', '1b.   The Trainer demonstrated the theory with practice', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ $trainerSurvey->{'The Trainer demonstrated the theory with practice'} }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('The Trainer used different techniques to present topics', '1c.   The Trainer used different techniques to present topics', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                        {{ $trainerSurvey->{'The Trainer used different techniques to present topics'} }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('The Trainer gave me instructions when I was practicing', '1d.   The Trainer gave me instructions when I was practicing', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ $trainerSurvey->{'The Trainer gave me instructions when I was practicing'} }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('The Trainer was patient and respectful when I made questions', '1e.   The Trainer was patient and respectful when I made questions', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ $trainerSurvey->{'The Trainer was patient and respectful when I made questions'} }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('The Trainer had good knowledge on what he she taught', '1f.   The Trainer had good knowledge on what he she taught', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                        {{ $trainerSurvey->{'The Trainer had good knowledge on what he she taught'} }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('The Trainer’s classes were well prepared and organized', '1g.   The Trainer’s classes were well prepared and organized', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                        {{ $trainerSurvey->{'The Trainer’s classes were well prepared and organized'} }}
                        </div>
                    </div>
                
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        {!! Form::Label('Please give an overall score for your trainer', 'Please give an overall score for your trainer', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                        {{ $trainerSurvey->{'Please give an overall score for your trainer'} }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('Like best About Trainer', 'What you like best about the Trainer', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                        {{ $trainerSurvey->{'Like best About Trainer'} }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('where can trainer improve', 'What the trainer can improve?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                        {{ $trainerSurvey->{'where can trainer improve'} }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    

    {{ Form::close() }}
@endsection