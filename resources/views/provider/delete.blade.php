@extends('app')

@section('title')

    DELETE TRAINING PROVIDER #{{ $provider->ID }}

@endsection

@section('content')

    {!! Form::model($provider, ['route' => ['provider.destroy', $provider->ID], 'method' => 'DELETE', 'class' => 'form-horizontal clearfix']) !!}
        <div class="widget">
            <div class="widget-heading">
                <a href="{{ route('provider.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជីអ្នកបណ្ដុះបណ្ដាល | Traning Provider List</a>
                <div class="pull-right">
                    <a href="{{ route('provider.edit', $provider->ID) }}" target="_blank" class="btn btn-raised btn-primary"><i class="ti-pencil mr-5"></i>កែប្រែ | Update</a>
                   
                </div>
            </div>
            <div class="widget-body text-center">
                <img src="{{ asset('images/trash.png') }}" class="image image-small" style="width: 200px; height: auto;" />
                <h4 class="text-danger">Are you sure want to delete?</h4>
                <h4 class="text-danger">Data can not be restore after you press Delete Button</h4>
                @if(count($provider->tots) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($provider->tots) }}-TOT, you need to delete them first before you can delete Training Provider. 
                            </div>
                        </div>
                    </div>
                @endif 
                @if(count($provider->contacts) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($provider->contacts) }}-Contact, you need to delete them first before you can delete Training Provider. 
                            </div>
                        </div>
                    </div>
                @endif 
                @if(count($provider->trainers) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($provider->trainers) }}-Trainer, you need to delete them first before you can delete Training Provider. 
                            </div>
                        </div>
                    </div>
                @endif 
                @if(count($provider->assessors) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($provider->assessors) }}-Assessor, you need to delete them first before you can delete Training Provider. 
                            </div>
                        </div>
                    </div>
                @endif 
                @if(count($provider->trainingaccess) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($provider->trainingaccess) }}-Training Access, you need to delete them first before you can delete Training Provider. 
                            </div>
                        </div>
                    </div>
                @endif 
                @if(count($provider->toa) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($provider->toa) }}-TOA , you need to delete them first before you can delete Training Provider. 
                            </div>
                        </div>
                    </div>
                @endif 
                @if(count($provider->takings) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($provider->takings) }}-Industry Taking, you need to delete them first before you can delete Training Provider. 
                            </div>
                        </div>
                    </div>
                @endif 
                
            </div>
            <div class="widget-heading foot">
                <a href="{{ route('provider.index') }}" class="btn btn-raised btn-default"><i class="ti-cancel mr-5"></i>បោះបង់ | Cancel</a>
                @if(count($provider->trainingaccess) == 0 && count($provider->tots) == 0  && count($provider->contacts) == 0  && count($provider->trainers) == 0 && count($provider->assessors) == 0 && count($provider->toa) == 0 && count($provider->takings) == 0  )
                    <button type="submit" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</button>
                @endif
            </div>

        </div>
    {!! Form::close() !!}

@endsection