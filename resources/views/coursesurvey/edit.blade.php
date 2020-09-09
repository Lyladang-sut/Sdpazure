@extends('app')

@section('title')

កែប្រែបញ្ជីតាមដានបណ្តុះបណ្តាល |EDIT COURSE SURVEY 

@endsection

@section('content')
{!! Form::model($courseSurvey, ['route' => ['course-survey.update', $courseSurvey->ID], 'method' => 'PUT', 'class' => 'form-horizontal clearfix']) !!}
<div class="widget">
    <div class="widget-heading">
        <h3 class="widget-title">
            <a href="{{ route('course-survey.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជី | ALL COURSE SURVEY</a>
            <div class="pull-right">
                <button type="submit" class="btn btn-raised btn-primary"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
            </div>
        </h3>
    </div>
    <div class="widget-body">
        <div class="wizard">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6" style="margin-top:30px;">
                        <div class="form-group">
                            {!! Form::Label('Course Batch ID', 'Batch ID', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Training Provider', $batchid  , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Training Provider', 'Training Provider', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Training Provider', $providers  , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Sex respondent', 'Sex respondent', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Sex respondent', $sexes , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Submitter', 'Submitter', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Submitter', $submitter , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <hr>
                        <h4><span class="position-left">A.</span> FEEDBACK ON COURSE CONTENT</h4>
                        <br><p class="hr-p">1</p><br>
                        
                        <div class="form-group">
                            {!! Form::Label('Pictures the trainer showed in the classroom were clear', '1a. Pictures the trainer showed in the classroom were clear', ['class' => 'control-label col-lg-8']) !!}
                            <div class="col-lg-4">
                                {!! Form::Select('Pictures the trainer showed in the classroom were clear', $chooseAnswers , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('The explanations in classroom were useful for the practice', '1b. The explanations in classroom were useful for the practice', ['class' => 'control-label col-lg-8']) !!}
                            <div class="col-lg-4">
                                {!! Form::Select('The explanations in classroom were useful for the practice', $chooseAnswers , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('There were enough tools materials for me to practice with', '1c. There were enough tools materials for me to practice with', ['class' => 'control-label col-lg-8']) !!}
                            <div class="col-lg-4">
                                {!! Form::Select('There were enough tools materials for me to practice with', $chooseAnswers , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('The equipment for practicing was in good conditions and useful', '1d. The equipment for practicing was in good conditions and useful', ['class' => 'control-label col-lg-8']) !!}
                            <div class="col-lg-4">
                                {!! Form::Select('The equipment for practicing was in good conditions and useful', $chooseAnswers , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Place set up and equipment conditions helped me be safe', '1e. Instructions, place set up and equipment conditions helped me be safe & avoid accidents', ['class' => 'control-label col-lg-8']) !!}
                            <div class="col-lg-4">
                                {!! Form::Select('Place set up and equipment conditions helped me be safe', $chooseAnswers , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <br><p class="hr-p">2</p><br>
                        
                        <div class="form-group">
                            {!! Form::Label('I feel that the time given to theory was', '2a. I feel that the time given to theory was', ['class' => 'control-label col-lg-8']) !!}
                            <div class="col-lg-4">
                                {!! Form::Select('I feel that the time given to theory was', $selects , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('I feel that the time given to practice was…', '2b. I feel that the time given to practice was…', ['class' => 'control-label col-lg-8']) !!}
                            <div class="col-lg-4">
                                {!! Form::Select('I feel that the time given to practice was…', $selects , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('I think the duration of the whole course was…', '2c. I think the duration of the whole course was…', ['class' => 'control-label col-lg-8']) !!}
                            <div class="col-lg-4">
                                {!! Form::Select('I think the duration of the whole course was…', $selects , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Please give an overall score for the content of the course', 'Please give an overall score for the content of the course', ['class' => 'control-label col-lg-8']) !!}
                            <div class="col-lg-4">
                                {!! Form::Select('Please give an overall score for the content of the course', $chooses , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <br><p class="hr-p">3</p><br>
                        
                        <div class="form-group">
                            {!! Form::Label('Liked best about the Course Content', 'Liked best about the Course Content', ['class' => 'control-label col-lg-12']) !!}
                            <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                                {!! Form::TextArea('Liked best about the Course Content', null, ['class' => 'form-control', 'rows' => 3, 'cols' => 10]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('How Course content can be improved', 'How Course content can be improved', ['class' => 'control-label col-lg-12']) !!}
                            <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                                {!! Form::TextArea('How Course content can be improved', null, ['class' => 'form-control', 'rows' => 3, 'cols' => 10]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 style="color:#3f7d45!important"><span class="position-left">B.</span> FEEDBACK ON ACCOMODATION</h4>
                        <br><p class="hr-p">1</p><br>
                        
                        <div class="form-group">
                            {!! Form::Label('I think my room sleeping area was…', '1a. I think my room sleeping area was…', ['class' => 'control-label col-lg-8']) !!}
                            <div class="col-lg-4">
                                {!! Form::Select('I think my room sleeping area was…', $chooses , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('I think the Food was…', '1b. I think the Food was…', ['class' => 'control-label col-lg-8']) !!}
                            <div class="col-lg-4">
                                {!! Form::Select('I think the Food was…', $chooses , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('I think the sanitation facilities (toilet, shower room) were…', '1c. I think the sanitation facilities (toilet, shower room) were…', ['class' => 'control-label col-lg-8']) !!}
                            <div class="col-lg-4">
                                {!! Form::Select('I think the sanitation facilities (toilet, shower room) were…', $chooses , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('I think the Kitchen Cooking area was…', '1d. I think the Kitchen Cooking area was…', ['class' => 'control-label col-lg-8']) !!}
                            <div class="col-lg-4">
                                {!! Form::Select('I think the Kitchen Cooking area was…', $chooses , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Please give an overall score for the accommodation', 'Please give an overall score for the accommodation', ['class' => 'control-label col-lg-8']) !!}
                            <div class="col-lg-4">
                                {!! Form::Select('Please give an overall score for the accommodation', $chooses , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <br><p class="hr-p">2</p><br>
                        
                        <div class="form-group">
                            {!! Form::Label('best about Accommodation', 'What you liked best about accommodation?', ['class' => 'control-label col-lg-12']) !!}
                            <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                                {!! Form::TextArea('best about Accommodation', null, ['class' => 'form-control', 'rows' => 3, 'cols' => 10]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('how can Accommodation be improved', 'How can Accommodation be improved', ['class' => 'control-label col-lg-12']) !!}
                            <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                                {!! Form::TextArea('how can Accommodation be improved', null, ['class' => 'form-control', 'rows' => 3, 'cols' => 10]) !!}
                            </div>
                        </div>

                        <h4 style="color:#dc0031!important"><span class="position-left">C.</span> OVERALL EXPERIENCE</h4>
                    
                    <br><p class="hr-p text-danger">1. Satisfaction</p><br>
                    <div class="form-group">
                        {!! Form::Label('I have learned during this course what I expected to learn', '1a. I have learned during this course what I expected to learn', ['class' => 'control-label col-lg-8']) !!}
                        <div class="col-lg-4">
                            {!! Form::Select('I have learned during this course what I expected to learn', $chooseAnswers , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('able to use at a job what I have learned in this course', '1b. I think I will be able to use at job what I have learned in course', ['class' => 'control-label col-lg-8']) !!}
                        <div class="col-lg-4">
                            {!! Form::Select('able to use at a job what I have learned in this course', $chooseAnswers , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('If you disagree with any of the points above, please tell us why', '1c. If you disagree with any of the points above, please tell us why', ['class' => 'control-label col-lg-12']) !!}
                        <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                            {!! Form::TextArea('If you disagree with any of the points above, please tell us why', null, ['class' => 'form-control' , 'rows' => 3, 'cols' => 10]) !!}
                        </div>
                    </div>
                    
                    <br><p class="hr-p text-danger">2. Training Improvement</p><br>
                    

                    <div class="form-group">
                        {!! Form::Label('As a result of this training, I feel more confident in', '2a. As a result of this training, I feel more confident in', ['class' => 'control-label col-lg-12']) !!}
                        <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                            {!! Form::TextArea('As a result of this training, I feel more confident in', null, ['class' => 'form-control', 'rows' => 3, 'cols' => 10]) !!}
                        </div>
                    </div>

                    <div class="form-group" style="margin-top:35px; margin-bottom:10px;">
                            {!! Form::Label('What did you most like about the training', '2b. What did you most like about the training', ['class' => 'control-label col-lg-12']) !!}
                            <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                                {!! Form::TextArea('What did you most like about the training', null, ['class' => 'form-control' , 'rows' => 3, 'cols' => 10]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('What aspects of the training could be improved and how', '2c. What aspects of the training could be improved and how', ['class' => 'control-label col-lg-12']) !!}
                            <div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;">
                                {!! Form::TextArea('What aspects of the training could be improved and how', null, ['class' => 'form-control', 'rows' => 3, 'cols' => 10]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('able to use at a job what I have learned in this course', '2d. I think I will be able to use at job what I have learned in course', ['class' => 'control-label col-lg-8']) !!}
                            <div class="col-lg-4">
                                {!! Form::Select('able to use at a job what I have learned in this course', $satisfylevel , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
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