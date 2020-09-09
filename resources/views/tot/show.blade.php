@extends('app')

@push('styles')

    <style>
        .tot-modal-form label{
            padding-left:15px !important;
        }
    </style>

@endpush

@section('title')

   Show Training of Training

@endsection
@section('content')
{!! Form::open(['url' => 'foo/bar', 'class' => 'form-horizontal panel-body personal_data2', 'files' => true]) !!}

<div class="widget">
    <div class="widget-heading">
        <h4 class="widget-title">
            <a href="{{ route('tot.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជី | TOT List</a>
            <div class="pull-right">
                <a href="{{ route('tot.edit', $tot->ID) }}" target="_blank" class="btn btn-raised btn-warning"><i class="ti-pencil mr-5"></i>កែប្រែ | Update</a>
                <a href="{{ route('tot.delete', $tot->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</a>
            </div>
        </h4>
    </div>
    <div class="panel-body">
        <div class="col-md-5">
            <div class="form-group">
                {!! Form::Label('Full Name', 'Training Orginisation', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($tot)
                        {{ $tot->trainingProvider->{'Name organization_institution'} }}
                    @endif
                </div>
            </div> 

            <div class="form-group">
                {!! Form::Label('Training Orginisation', 'Full Name', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($tot->trainers)
                        {{ $tot->trainers->{'Full Name'} }}
                    @endif
                </div>
            </div> 

            <div class="form-group">
                {!! Form::Label('Intervention', 'Intervention', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {{ $tot->{'Intervention'} }}
                </div>
            </div> 

            <div class="form-group">
                {!! Form::Label('Delivery Channel', 'Delivery Channel', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($tot)
                        {{ $tot->deliveryChannel->{'Delivery Channel'} }}
                    @endif
                </div>
            </div> 

            <div class="form-group">
                {!! Form::Label('Course Trained', 'Course Topic 1', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($tot)
                        {{ $tot->course->{'Course'} }}
                    @endif
                </div>
            </div> 

            <div class="form-group">
                {!! Form::Label('Course trained 2', 'Course Topic 2', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($tot)
                        {{ $tot->course->{'Course'} }}
                    @endif
                </div>
            </div> 

            <div class="form-group">
                {!! Form::Label('Start Date', 'Start Date', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {{ $tot->{'Start Date'} }}
                </div>
            </div> 

            <div class="form-group">
                {!! Form::Label('End Date', 'End Date', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {{ $tot->{'End Date'} }}
                </div>
            </div> 

            <div class="form-group">
                {!! Form::Label('Number of sessions', 'Number of sessions', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {{ $tot->{'Number of sessions'} }}
                </div>
            </div>   
        </div>

        <div class="col-md-6 col-md-offset-1">
            <h4>Training Attendees
            </h4><br>
            <table class="table" style="border:1px solid #ddd">

                <tr style="background:#f3f3f3">
                    <th>Organisation</th>
                    <th>Trainer</th>
                    <th>Owner/Manager</th>
                    <th>Competent</th>
                </tr>
                <tr>
                    <td colspan=4>No Data...</td>
                </tr>
            </table>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection
