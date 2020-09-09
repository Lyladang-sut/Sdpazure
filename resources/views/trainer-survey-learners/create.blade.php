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
    កម្រសំនួរសិក្ខាម | TRAINER SURVEY LEARNER
@endsection

@section('content')
    {{ Form::open(array('url' => 'foo/bar',"class"=>"form-horizontal")) }}
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">
                    <a href="{{ route('trainer-survey.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជី | Trainer Survey List</a>
                    <div class="pull-right">
                        <button data-style="expand-left" class="btn btn-raised btn-primary ladda-button"><span class="ladda-label">រក្សាទុក | Save</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                    </div>
                </h3>
                
            </div>
                <div class="panel-body">
                    <div class="col-md-7">
                        <div class="form-group required">
                            {!! Form::Label('Course Batch ID', 'Batch ID', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Course Batch ID', $batch, null, ['required' => 'required','class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::Label('Training Provider', 'Training Provider', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Training Provider',$training_provider, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group required">
                            {!! Form::Label('Name Of Trainer', 'Name Of Trainer', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Name Of Trainer', [], null, ['required' => 'required','class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group required">
                            {!! Form::Label('Subject trainer gave', 'Subject trainer gave', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Subject trainer gave', $subject_trainer, null, ['required' => 'required','class' => 'form-control']) !!}
                            </div>
                        </div>

                        <h4>Training Provider Feedback</h4>
                        <div class="form-group required">
                            {!! Form::Label('The Trainer’s explanations were clear', '1a.   The Trainer’s explanations were clear', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('The Trainer’s explanations were clear', $select_anwser, null, ['required' => 'required','class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group required">
                            {!! Form::Label('The Trainer demonstrated the theory with practice', '1b.   The Trainer demonstrated the theory with practice', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('The Trainer demonstrated the theory with practice', $select_anwser, null, ['required' => 'required','class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group required">
                            {!! Form::Label('The Trainer used different techniques to present topics', '1c.   The Trainer used different techniques to present topics', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('The Trainer used different techniques to present topics', $select_anwser, null, ['required' => 'required','class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group required">
                            {!! Form::Label('The Trainer gave me instructions when I was practicing', '1d.   The Trainer gave me instructions when I was practicing', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('The Trainer gave me instructions when I was practicing', $select_anwser, null, ['required' => 'required','class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group required">
                            {!! Form::Label('The Trainer was patient and respectful when I made questions', '1e.   The Trainer was patient and respectful when I made questions', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('The Trainer was patient and respectful when I made questions', $select_anwser, null, ['required' => 'required','class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group required">
                            {!! Form::Label('The Trainer had good knowledge on what he she taught', '1f.   The Trainer had good knowledge on what he she taught', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('The Trainer had good knowledge on what he she taught', $select_anwser, null, ['required' => 'required','class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group required">
                            {!! Form::Label('The Trainer’s classes were well prepared and organized', '1g.   The Trainer’s classes were well prepared and organized', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('The Trainer’s classes were well prepared and organized', $select_anwser, null, ['required' => 'required','class' => 'form-control']) !!}
                            </div>
                        </div>
                    
                    </div>

                    <div class="col-md-5">
                        <div class="form-group required">
                            {!! Form::Label('Please give an overall score for your trainer', 'Please give an overall score for your trainer', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Please give an overall score for your trainer', $score, null, ['required' => 'required','class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::Label('Like best About Trainer', 'What you like best about the Trainer', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::TextArea('Like best About Trainer', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::Label('where can trainer improve', 'What the trainer can improve?', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::TextArea('where can trainer improve', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        

    {{ Form::close() }}
@endsection