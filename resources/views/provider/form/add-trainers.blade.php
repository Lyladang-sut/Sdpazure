@extends('app')

@section('title')

    CREATE TRAINING PROVIDER

@endsection

@section('content')

     {!! Form::open(['method' => 'PUT', 'class' => 'form-horizontal clearfix']) !!}
<div class="panel-body">
    <div>
        <div class="col-md-4 no-padding">
            <div class="form-group">
                {!! Form::Label('Last name', 'Last name', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('Last name', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Sex', 'Sex', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Select('Sex',$sex, null, ['class' => 'form-control']) !!}
                </div>
            </div>
            
            <div class="form-group">
                {!! Form::Label('Country', 'Country', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Select('Country',$country, null, ['class' => 'form-control']) !!}
                </div>
            </div>
            
            <div class="form-group">
                {!! Form::Label('District', 'District', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Select('District',[], null, ['class' => 'form-control']) !!}
                </div>
            </div>
            
            <div class="form-group">
                {!! Form::Label('Phone number', 'Phone number', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('Phone number', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Contact 1 Name', 'Contact 1 Name', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('Name organization_institution', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Contact 2', 'Contact 2 Name', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('Contact 2', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            
            <div class="form-group">
                {!! Form::Label('First name', 'First name', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('First name', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Date of Birth', 'Date of Birth', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::date('Date of Birth', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Province', 'Province', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Select('Province',[], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Email', 'Email', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('Email', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Last grade of School', 'Last grade of School', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Select('Last grade of School',$last_grade, null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Contact 1 Number', 'Contact 1 Number', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('Contact 1 Number', 0, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Contact 2 Name', 'Contact 2 Name', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('Contact 2 Name', 0, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="col-md-3 text-center">
            <img src="{{asset('assets/images/backgrounds/bg.jpg')}}" style="width:100%;border:1px dotted">
            <button class="btn btn-default btn-file btn-primary mt-10">
              <i class="icon-file-plus"></i> <span>Browse Image</span>
              <input type="file" class="file-input-preview1" name="image">
            </button>

            {!! Form::Label('Organisation', 'Organisation (auto)', ['class' => 'control-label text-center mt-10']) !!}
            {!! Form::Text('Organisation', null, ['class' => 'form-control mt-10']) !!}
        </div>
    </div>
    
    <div class="row" style="clear:both">
        <hr>
        <div class="col-md-3">
            <h4>Type of trainer</h4>

            <div class="form-group">
                {!! Form::Label('Master Trainer', 'Master Trainer', ['class' => 'control-label col-lg-9']) !!}
                <div>
                    {!! Form::Checkbox('Master Trainer', 1, false) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Trainer of Assesors', 'Trainer of Assesors', ['class' => 'control-label col-lg-9']) !!}
                <div>
                    {!! Form::checkbox('Trainer of Assesors', 1, false) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Trainer of Trainees', 'Trainer of Trainees', ['class' => 'control-label col-lg-9']) !!}
                <div>
                    {!! Form::checkbox('Trainer of Trainees', 1, false) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Coach', 'Coach', ['class' => 'control-label col-lg-9']) !!}
                <div>
                    {!! Form::checkbox('Coach', 1, false) !!}
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <h4>Skills taught</h4>

            <div class="form-group">
                {!! Form::Label('Soft Skills', 'Soft Skills', ['class' => 'control-label col-lg-9']) !!}
                <div>
                    {!! Form::checkbox('Soft Skills', 1, false) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Technical Skills', 'Technical Skills', ['class' => 'control-label col-lg-9']) !!}
                <div>
                    {!! Form::checkbox('Technical Skills', 1, false) !!}
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <h4>Is the trainer an assessor?</h4>
            <div class="form-group">
                {!! Form::Label('Assessor', 'Assessor', ['class' => 'control-label col-lg-9']) !!}
                <div>
                    {!! Form::checkbox('Assessor', 1, false) !!}
                </div>
            </div>
        </div>
    </div>

    
    {{ Form::close() }}
</div>
@endsection