@extends('app')

@section('title')

    DELETE RPL #{{ $rpl->ID }}

@endsection

@section('content')

    {!! Form::model($rpl, ['route' => ['rpl.destroy', $rpl->ID], 'method' => 'DELETE', 'class' => 'form-horizontal clearfix']) !!}
        <div class="widget">
            <div class="widget-heading">
                <a href="{{ route('rpl.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជី | RPL List</a>
                <div class="pull-right">
                    <a href="{{ route('rpl.edit', $rpl->ID) }}" target="_blank" class="btn btn-raised btn-primary"><i class="ti-pencil mr-5"></i>កែប្រែ | Update</a>
                </div>
            </div>
            <div class="widget-body text-center">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('images/trash.png') }}" class="image image-small" style="width: 200px; height: auto;" />
                        <h4 class="text-danger">Are you sure want to delete?</h4>
                        <h4 class="text-danger">Data can not be restored after you press Delete Button</h4>
                    </div>
                </div>
                @if(count($rpl->tests) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($rpl->tests) }}-test, you need to delete them first before you can delete RPL. 
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="widget-heading foot">
                <a href="{{ route('rpl.index') }}" class="btn btn-raised btn-default"><i class="ti-cancel mr-5"></i>បោះបង់ | Cancel</a>
                @if(count($rpl->tests) == 0)
                <button type="submit" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</button>
                @endif
            </div>
        </div>
    {!! Form::close() !!}

@endsection