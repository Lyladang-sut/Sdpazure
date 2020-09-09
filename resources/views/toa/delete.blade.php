@extends('app')

@section('title')

    DELETE TOA #{{ $toa->ID }}

@endsection

@section('content')

    {!! Form::model($toa, ['route' => ['toa.destroy', $toa->ID], 'method' => 'DELETE', 'class' => 'form-horizontal clearfix']) !!}
        <div class="widget">
            <div class="widget-heading">
                <a href="{{ route('toa.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i> បញ្ជី | TOA List</a>
                <div class="pull-right">
                    <a href="{{ route('toa.edit', $toa->ID) }}" target="_blank" class="btn btn-raised btn-primary"><i class="ti-pencil mr-5"></i>កែប្រែ | Update</a>
                    
                </div>
            </div>
            <div class="widget-body text-center">
                <img src="{{ asset('images/trash.png') }}" class="image image-small" style="width: 200px; height: auto;" />
                <h4 class="text-danger">Are you sure want to delete?</h4>
                <h4 class="text-danger">Data can not be restore after you press Delete Button</h4>
                @if(count($toa->attendees) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($toa->attendees) }}-attentdee, you need to delete them first before you can delete RPL. 
                            </div>
                        </div>
                    </div>
                @endif   
                <div class="widget-heading foot">
                    <a href="{{ route('toa.index') }}" class="btn btn-raised btn-default"><i class="ti-cancel mr-5"></i>បោះបង់ | Cancel</a>
                    @if(count($toa->attendees) == 0 )
                        <button type="submit" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</button>
                    @endif
                </div>
            </div>

        </div>
    {!! Form::close() !!}

@endsection