@extends('app')

@section('title')

    DELETE TRAINEE #{{ $trainee->ID }}

@endsection

@section('content')

    {!! Form::model($trainee, ['route' => ['trainee.destroy', $trainee->ID], 'method' => 'DELETE', 'class' => 'form-horizontal clearfix']) !!}
        <div class="widget">
            <div class="widget-heading">
                <a href="{{ route('trainee.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i> បញ្ជីសិក្ខាកាម |​ All trainee</a>
                <div class="pull-right">
                    <a href="{{ route('trainee.edit', $trainee->ID) }}" target="_blank" class="btn btn-raised btn-primary"><i class="ti-pencil mr-5"></i>កែប្រែ | Update</a>
                   
                </div>
            </div>
            <div class="widget-body text-center">
                <img src="{{ asset('images/trash.png') }}" class="image image-small" style="width: 200px; height: auto;" />
                <h4>Are you sure want to delete?</h4>
                <h4>Data can not be restore after you press Delete Button</h4>

                @if(count($trainee->trainingAccesses) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($trainee->trainingAccesses) }}-Training Access Taking, you need to delete them first before you can delete Trainee. 
                            </div>
                        </div>
                    </div>
                @endif

                @if(count($trainee->trainingSupports) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($trainee->trainingSupports) }}-Training Support Taking, you need to delete them first before you can delete Trainee. 
                            </div>
                        </div>
                    </div>
                @endif

                @if(count($trainee->supportEmployments) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($trainee->supportEmployments) }}-Support Employment Taking, you need to delete them first before you can delete Trainee. 
                            </div>
                        </div>
                    </div>
                @endif 

                
            </div>
            <div class="widget-heading foot">
                <a href="{{ route('trainee.index') }}" class="btn btn-raised btn-default"><i class="ti-cancel mr-5"></i>បោះបង់ | Cancel</a>
                @if(count($trainee->trainingAccesses) == 0  && count($trainee->trainingSupports) == 0 && count($trainee->supportEmployments) == 0)
                    <button type="submit" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</button>
                @endif
            </div>
        </div>
    {!! Form::close() !!}

@endsection