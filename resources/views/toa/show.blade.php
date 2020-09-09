@extends('app')

@push('styles')
    <style type="text/css">
        
    </style>
@endpush

@section('title')

SHOW TOA 

@endsection

@section('content')
    {!! Form::open(['url' => 'foo/bar', 'class' => 'form-horizontal clearfix', 'files' => true]) !!}
        <div class="widget">
            <div class="widget-heading">
                <h4 class="widget-title">
                    <a href="{{ route('toa.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជី | TOA List</a>
                    <div class="pull-right">
                        <a href="{{ route('toa.edit', $toa->ID) }}" target="_blank" class="btn btn-raised btn-warning"><i class="ti-pencil mr-5"></i>កែប្រែ | Update</a>
                        <a href="{{ route('toa.delete', $toa->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</a>
                    </div>
                </h4>
            </div>
            <div class="panel-body">
        
                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::Label('Training Orginisation', 'Training Orginisation', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            @if($toa->provider)
                                {{ $toa->provider{'Name organization_institution'} }}
                            @endif
                        </div> 
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Full Name', 'Full Name', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            @if($toa->name)
                                {{ $toa->name{'Full Name1'} }}
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Intervention', 'Intervention', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                        
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Delivery Channel', 'Delivery Channel', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            @if($toa->deliveryChannel)
                                {{ $toa->deliveryChannel{'Delviery Channel'} }}
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Course Trained', 'Course Topic 1', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            @if($toa->course)
                                {{ $toa->course{'Course'} }}
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Start Date', 'Start Date', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ $toa->{'Start Date'} }}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('End Date', 'End Date', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ $toa->{'End Date'} }}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Number of sessions', 'Number of sessions', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ $toa->{'Number of sessions'} }}
                        </div>
                    </div>
                    
                </div>

                <div class="col-lg-6">
                    <h4>Training Attendees</h4>
                    <table class="table table-bordered table-resposive">
                        <thead>
                            <tr style="background-color:#E6E6FA">
                                <th>Organisation</th>
                                <th>Trainer</th>
                                <th>Owner/Manager</th>
                                <th>Competent</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($toa->trainings))
                                @foreach($toa->trainings as $training)
                                    <tr>
                                        <td>
                                            @if($training->provider)
                                                {{ $training->provider->{'Name organization_institution'} }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($training->trainer)
                                                {{ $training->trainer->{'Full Name'} }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($training->owner)
                                                {{ $training->owner->{'Full Name'} }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $training->Competent }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>                           
        </div>
    {!! Form::close() !!}
@endsection

@push('scripts')
    <script>
        
    </script>
@endpush

