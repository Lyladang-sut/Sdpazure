@extends('app')

@push('styles')

@endpush

@section('title')
                
        Course, Accommodation, Overall Satisfaction Survey

@endsection

@section('content')
{!! Form::open(['url' => 'foo/bar', 'class' => 'form-horizontal panel-body personal_data2', 'files' => true]) !!}
<div class="widget">
    <div class="widget-heading">
        <h4 class="widget-title">
            <a href="{{ route('course-survey.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជី | All COURSE SURVEY</a>
            <div class="pull-right">
                <a href="{{ route('course-survey.edit', $coureSurvey->ID) }}" target="_blank" class="btn btn-raised btn-warning"><i class="ti-pencil mr-5"></i>កែប្រែ | Update</a>
                <a href="{{ route('course-survey.delete', $coureSurvey->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</a>
            </div>
        </h4>
    </div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::Label('Course Batch ID', 'Batch ID', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($coureSurvey)
                        {{ $coureSurvey->batch{'FullBatchID'} }}       
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Training Provider', 'Training Provider', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($coureSurvey)
                        {{ $coureSurvey->provider{'Name organization_institution'} }}       
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Sex respondent', 'Sex respondent', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($coureSurvey)
                        {{ $coureSurvey{'Sex respondent'} }}       
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Submitter', 'Submitter', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($coureSurvey)
                        {{ $coureSurvey->submitter{'Full Name'} }}       
                    @endif
                </div>
            </div>
            <hr>
        </div>
    </div>    

    <div class="row">
            
        <div class="col-md-6">
            <h4>B. FEEDBACK ON COURSE CONTENT</h4>
            <P style="border-bottom:1px solid; width:725px; margin-top:10px ; margin-bottom:10px; color:#4682B4;">1</P>
            
            <div class="form-group">
                {!! Form::Label('Pictures the trainer showed in the classroom were clear', '1a. Pictures the trainer showed in the classroom were clear', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'Pictures the trainer showed in the classroom were clear'} }}  
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('The explanations in classroom were useful for the practice', '1b. The explanations in classroom were useful for the practice', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'The explanations in classroom were useful for the practice'} }} 
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('There were enough tools materials for me to practice with', '1c. There were enough tools materials for me to practice with', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'There were enough tools materials for me to practice with'} }} 
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('The equipment for practicing was in good conditions and useful', '1d. The equipment for practicing was in good conditions and useful', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'The equipment for practicing was in good conditions and useful'} }} 
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Place set up and equipment conditions helped me be safe', '1e. Instructions, place set up and equipment conditions helped me be safe & avoid accidents', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'Place set up and equipment conditions helped me be safe'} }} 
                </div>
            </div>

            <P style="border-bottom:1px solid; width:725px; margin-top:10px ; margin-bottom:10px; color:#4682B4;">2</P>
        
            <div class="form-group">
                {!! Form::Label('I feel that the time given to theory was', '2a. I feel that the time given to theory was', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'I feel that the time given to theory was'} }} 
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('I feel that the time given to practice was…', '2b. I feel that the time given to practice was…', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'I feel that the time given to practice was…'} }} 
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('I think the duration of the whole course was…', '2c. I think the duration of the whole course was…', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'I think the duration of the whole course was…'} }} 
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Please give an overall score for the content of the course', 'Please give an overall score for the content of the course', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'Please give an overall score for the content of the course'} }} }
                </div>
            </div>

            <P style="border-bottom:1px solid; width:725px; margin-top:10px ; margin-bottom:10px; color:#4682B4;">3</P>
            
            <div class="form-group">
                {!! Form::Label('Liked best about the Course Content', 'Liked best about the Course Content', ['class' => 'control-label col-lg-12']) !!}
                <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                    {{ $coureSurvey{'Liked best about the Course Content'} }} 
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('How Course content can be improved', 'How Course content can be improved', ['class' => 'control-label col-lg-12']) !!}
                <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                    {{ $coureSurvey{'How Course content can be improved'} }} 
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <h4>FEEDBACK ON ACCOMODATION</h4>
            <P style="border-bottom:1px solid; width:725px; margin-top:10px ; margin-bottom:10px; color:#4682B4;">1</P>
            
            <div class="form-group">
                {!! Form::Label('I think my room sleeping area was…', '1a. I think my room sleeping area was…', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'I think my room sleeping area was…'} }} 
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('I think the Food was…', '1b. I think the Food was…', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'I think the Food was…'} }} 
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('I think the sanitation facilities (toilet, shower room) were…', '1c. I think the sanitation facilities (toilet, shower room) were…', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'I think the sanitation facilities (toilet, shower room) were…'} }} 
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('I think the Kitchen Cooking area was…', '1d. I think the Kitchen Cooking area was…', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'I think the Kitchen Cooking area was…'} }} 
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Please give an overall score for the accommodation', 'Please give an overall score for the accommodation', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'Please give an overall score for the accommodation'} }} 
                </div>
            </div>

            <P style="border-bottom:1px solid; width:725px; margin-top:22px ; margin-bottom:10px; color:#4682B4;">2</P>
            
            <div class="form-group">
                {!! Form::Label('best about Accommodation', 'What you liked best about accommodation?', ['class' => 'control-label col-lg-12']) !!}
                <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                    {{ $coureSurvey{'best about Accommodation'} }} 
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('how can Accommodation be improved', 'How can Accommodation be improved', ['class' => 'control-label col-lg-12']) !!}
                <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                    {{ $coureSurvey{'how can Accommodation be improved'} }} 
                </div>
            </div>
        
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <h4>OVERALL EXPERIENCE</h4>
            <P style="border-bottom:1px solid; width:725px; margin-top:10px ; margin-bottom:10px; color:#FF6347;">1. Statistic</P>
            
            <div class="form-group">
                {!! Form::Label('I have learned during this course what I expected to learn', '1a. I have learned during this course what I expected to learn', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'I have learned during this course what I expected to learn'} }} 
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('able to use at a job what I have learned in this course', '1b. I think I will be able to use at job what I have learned in course', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'able to use at a job what I have learned in this course'} }} 
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('If you disagree with any of the points above, please tell us why', '1c. If you disagree with any of the points above, please tell us why', ['class' => 'control-label col-lg-12']) !!}
                <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                    {{ $coureSurvey{'If you disagree with any of the points above, please tell us why'} }} 
                </div>
            </div>

            <P style="border-bottom:1px solid; width:725px; margin-top:10px ; margin-bottom:10px; color:#FF6347;">2. Training Improvement</P>

            <div class="form-group">
                {!! Form::Label('As a result of this training, I feel more confident in', '2a. As a result of this training, I feel more confident in', ['class' => 'control-label col-lg-12']) !!}
                <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                    {{ $coureSurvey{'As a result of this training, I feel more confident in'} }} 
                </div>
            </div>
        
        </div>

        <div class="col-md-6">
            <div class="form-group" style="margin-top:35px; margin-bottom:10px;">
                {!! Form::Label('What did you most like about the training', '2b. What did you most like about the training', ['class' => 'control-label col-lg-12']) !!}
                <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                    {{ $coureSurvey{'What did you most like about the training'} }} 
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('What aspects of the training could be improved and how', '2c. What aspects of the training could be improved and how', ['class' => 'control-label col-lg-12']) !!}
                <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                    {{ $coureSurvey{'What aspects of the training could be improved and how'} }} 
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('able to use at a job what I have learned in this course', '1b. I think I will be able to use at job what I have learned in course', ['class' => 'control-label col-lg-8']) !!}
                <div class="col-lg-4">
                    {{ $coureSurvey{'able to use at a job what I have learned in this course'} }} 
                </div>
            </div>
        </div>
    </div>
</div>
</div>

{!! Form::close() !!}


@endsection

@push('scripts')


@endpush