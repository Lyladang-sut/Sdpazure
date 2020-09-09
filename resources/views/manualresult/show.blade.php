@extends('app')

@push('styles')
    
@endpush

@section('title')
    Manual Result Entry
@endsection

@section('content')
{!! Form::open(['url' => 'foo/bar', 'class' => 'form-horizontal panel-body personal_data2', 'files' => true]) !!}
<div class="widget">
    <div class="widget-heading">
        <h4 class="widget-title">
            <a href="{{ route('manual-result.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i> បញ្ជី |Manual Result Entry List</a>
            <div class="pull-right">
                <a href="{{ route('manual-result.edit', $manualResult->ID) }}" target="_blank" class="btn btn-raised btn-warning"><i class="ti-pencil mr-5"></i> Update</a>
                <a href="{{ route('manual-result.delete', $manualResult->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i> Delete</a>
            </div>
        </h4>
    </div>

    <div class="panel-body">
        <div class="col-md-8" style="margin-top:10px">
        
            <div class="form-group">
                {!! Form::Label('Entry date', 'Entry date', ['class' => 'control-label col-lg-2']) !!}
                <div class="col-lg-6">
                    {{ $manualResult->{'Entry date'} }}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Indicator', 'Indicator', ['class' => 'control-label col-lg-2']) !!}
                <div class="col-lg-6">
                    @if($manualResult->indicator)
                        {{ $manualResult->indicator{'Indicator Short'} }}
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Result', 'Result', ['class' => 'control-label col-lg-2']) !!}
                <div class="col-lg-6">
                    {{ $manualResult->{'Result'} }}   
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Sex', 'Sex', ['class' => 'control-label col-lg-2']) !!}
                <div class="col-lg-6">
                    {{ $manualResult->{'Sex'} }}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Notes', 'Notes', ['class' => 'control-label col-lg-2']) !!}
                <div class="col-lg-6" style="margin-top:10px; margin-bottom:10px;">
                    {{ $manualResult->{'Notes'} }}
                </div>
            </div>
        </div>
    </div> 
</div>       
    {!! Form::close() !!}
@endsection

@push('scripts')
    
@endpush