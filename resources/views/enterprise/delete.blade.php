@extends('app')

@section('title')

    DELETE ENTERPRISE #{{ $enterprise->ID }}

@endsection

@section('content')

    {!! Form::model($enterprise, ['route' => ['enterprise.destroy', $enterprise->ID], 'method' => 'DELETE', 'class' => 'form-horizontal clearfix']) !!}
        <div class="widget">
            <div class="widget-heading">
                <a href="{{ route('enterprise.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជីសហគ្រាស | All Enterprise</a>
                <div class="pull-right">
                    <a href="{{ route('enterprise.edit', $enterprise->ID) }}" target="_blank" class="btn btn-raised btn-primary"><i class="ti-pencil mr-5"></i>កែប្រែ | Update</a>   
                </div>
            </div>
            <div class="widget-body text-center">
                <img src="{{ asset('images/trash.png') }}" class="image image-small" style="width: 200px; height: auto;" />
                <h4>Are you sure want to delete?</h4>
                <h4>Data can not be restore after you press Delete Button</h4>

                @if(count($enterprise->industries) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($enterprise->industries) }}-Industries, you need to delete them first before you can delete Enterprise. 
                            </div>
                        </div>
                    </div>
                @endif 

                @if(count($enterprise->posttrainingsupport) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($enterprise->posttrainingsupport) }}-PostTrainingEmployment, you need to delete them first before you can delete Enterprise. 
                            </div>
                        </div>
                    </div>
                @endif 
                
                @if(count($enterprise->employments) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($enterprise->employments) }}-Employmet, you need to delete them first before you can delete Enterprise. 
                            </div>
                        </div>
                    </div>
                @endif 

                @if(count($enterprise->contacts) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($enterprise->contacts) }}-Contact, you need to delete them first before you can delete Enterprise. 
                            </div>
                        </div>
                    </div>
                @endif 

                @if(count($enterprise->recruitments) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($enterprise->recruitments) }}-Recruitment , you need to delete them first before you can delete Enterprise. 
                            </div>
                        </div>
                    </div>
                @endif 

                @if(count($enterprise->assessors) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($enterprise->assessors) }}-Assessor, you need to delete them first before you can delete Enterprise. 
                            </div>
                        </div>
                    </div>
                @endif 
            </div>
            <div class="widget-heading foot">
                <a href="{{ route('enterprise.index') }}" class="btn btn-raised btn-default"><i class="ti-cancel mr-5"></i>បោះបង់ | Cancel</a>
                @if(count($enterprise->industries) == 0 && count($enterprise->employments) == 0  && count($enterprise->contacts) == 0  && count($enterprise->recruitments) == 0 && count($enterprise->assessors) == 0 && count($enterprise->posttrainingsupport) == 0)
                    <button type="submit" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</button>
                @endif
            </div>
        </div>
    {!! Form::close() !!}

@endsection