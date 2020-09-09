@extends('app')

@section('title')

   កែប្រែកម្រសំនួរសិក្ខាម | EDIT TRAINER SURVEY LEARNER

@endsection

@section('content')
{!! Form::model($trainerSurvey, ['route' => ['trainer-survey.update', $trainerSurvey->ID], 'method' => 'PUT', 'class' => 'form-horizontal clearfix']) !!}
<div class="widget">
    <div class="widget-heading">
        <h3 class="widget-title">
            <a href="{{ route('trainer-survey.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជី | Trainer Survey List</a>
            <div class="pull-right">
                <button type="submit" class="btn btn-raised btn-primary"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
            </div>
        </h3>
    </div>
    <div class="widget-body">
        <div class="wizard">
            <div class="content clearfix">
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
                                {!! Form::Select('Training Provider',$training_provider, null, ['v-model' => 'item["Training Provider"]', 'required' => 'required','class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group required">
                            {!! Form::Label('Name Of Trainer', 'Name Of Trainer', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select id="Name Of Trainer" name="Name Of Trainer" class="form-control" v-model='item["Name Of Trainer"]'>
                                    <option v-for="option in trainers[item['Training Provider']]" v-bind:value="option['ID']" >@{{ option['Name'] }}</option>
                                </select>
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
        </div>
    </div>
</div>

{!! Form::close() !!}
@endsection

@push('scripts')

<script type="text/javascript">

    var app = new Vue({
        el: '#App',
        data: {
            item: {!! $trainerSurvey !!},
            trainers: {!! $trainers !!},
        },
    });

</script>

@endpush