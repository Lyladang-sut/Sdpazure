@extends('app')

@section('title')

    DELETE COURSE SURVEY #{{ $courseSurvey->ID }}

@endsection

@section('content')

    {!! Form::model($courseSurvey, ['route' => ['course-survey.destroy', $courseSurvey->ID], 'method' => 'DELETE', 'class' => 'form-horizontal clearfix']) !!}
        <div class="widget">
            <div class="widget-heading">
                <a href="{{ route('course-survey.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជី | All COURSE SURVEY </a>
                <div class="pull-right">
                    <a href="{{ route('course-survey.edit', $courseSurvey->ID) }}" target="_blank" class="btn btn-raised btn-primary"><i class="ti-pencil mr-5"></i>កែប្រែ | Update</a>
                </div>
            </div>
            <div class="widget-body text-center">
                <img src="{{ asset('images/trash.png') }}" class="image image-small" style="width: 200px; height: auto;" />
                <h4 class="text-danger">Are you sure want to delete?</h4>
                <h4 class="text-danger">Data can not be restore after you press Delete Button</h4>
            </div>
            <div class="widget-heading foot">
                <a href="{{ route('course-survey.index') }}" class="btn btn-raised btn-default"><i class="ti-cancel mr-5"></i>បោះបង់ | Cancel</a>
                <button type="submit" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</button>
            </div>
        </div>
    {!! Form::close() !!}

@endsection