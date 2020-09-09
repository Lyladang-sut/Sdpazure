@extends('app')

@section('title')

    DELETE USER #{{ $user->ID }}

@endsection

@section('content')

    {!! Form::model($user, ['route' => ['user.destroy', $user->ID], 'method' => 'DELETE', 'class' => 'form-horizontal clearfix']) !!}
        <div class="widget">
            <div class="widget-heading">
                <a href="{{ route('user.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជីសហគ្រាស | All Enterprise</a>
                <div class="pull-right">
                    <a href="{{ route('user.edit', $user->ID) }}" target="_blank" class="btn btn-raised btn-primary"><i class="ti-pencil mr-5"></i>កែប្រែ | Update</a>   
                </div>
            </div>
            <div class="widget-body text-center">
                <img src="{{ asset('images/trash.png') }}" class="image image-small" style="width: 200px; height: auto;" />
                <h4>Are you sure want to delete?</h4>
                <h4>Data can not be restore after you press Delete Button</h4>

                @if(count($user->industries) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($user->industries) }}-Industries, you need to delete them first before you can delete User. 
                            </div>
                        </div>
                    </div>
                @endif 

                @if(count($user->trainees) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($user->trainees) }}-Trainees, you need to delete them first before you can delete User. 
                            </div>
                        </div>
                    </div>
                @endif 
                
                @if(count($user->enterprises) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> There are {{ count($user->enterprises) }}-Enterprises, you need to delete them first before you can delete User. 
                            </div>
                        </div>
                    </div>
                @endif  
            </div>
            <div class="widget-heading foot">
                <a href="{{ route('user.index') }}" class="btn btn-raised btn-default"><i class="ti-cancel mr-5"></i>បោះបង់ | Cancel</a>
                @if(count($user->industries) == 0 && count($user->trainees) == 0  && count($user->enterprises) == 0)
                    <button type="submit" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</button>
                @endif
            </div>
        </div>
    {!! Form::close() !!}

@endsection