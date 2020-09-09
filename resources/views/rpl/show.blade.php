@extends('app')

@section('title')

    SHOW RPL LIST

@endsection

@section('content')

    <div class="widget">
        <div class="widget-heading">
            <h4 class="widget-title">
                <a href="{{ route('rpl.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជី | RPL List</a>
                <div class="pull-right">
                    <a href="{{ route('rpl.edit', $rpl->ID) }}" target="_blank" class="btn btn-raised btn-warning"><i class="ti-pencil mr-5"></i>កែប្រែ | Update</a>
                    <a href="{{ route('rpl.delete', $rpl->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</a>
                </div>
            </h4>
        </div>
        <div class="panel-body form-horizontal">
            <div class="row">
                <div class="col-lg-6">

                    <div class="form-group">
                        {!! Form::Label('Date of test', 'Date of test', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            @if($rpl)
                                {{$rpl->{'Date of test'} }}
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('RPL provider', 'RPL provider', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            @if($rpl)
                                {{$rpl->provider{'RPL Enterprise'} }}
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Location Test', 'Location', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                        @if($rpl)
                                {{$rpl->{'Location'} }}
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Assesment Sector', 'Assesment Sector', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            @if($rpl)
                                {{$rpl->course{'Course'} }}
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Occupation', 'Course', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            @if($rpl)
                                {{$rpl{'Assesment Sector'} }}
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Batch ID', 'Batch', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            @if($rpl)
                                {{$rpl->batch{'Batch Code'} }}
                            @endif
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-8">
                    <h4>RPL Test Attendees</h4>
                    
                    <table class="table table-responsive">
                        <thead>
                            <tr style="backgroud-color:	#F5F5DC">
                                <th>Participant Name</th>
                                <th>Monthly Income $</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($rpl->tests))
                                @foreach ($rpl->tests as $test)
                                    <tr>
                                        <td>  
                                            @if(count($test))
                                                {{ $test->industry->{'Full Name'} }}
                                            @endif
                                        </td>
                                        <td>
                                            @if(count($test))
                                                {{ (int) $test->{'Monthly Income  USD'} }}
                                            @endif
                                        </td>
                                        <td>
                                            @if(count($test))
                                                {{ $test->{'Result'} }}
                                            @endif
                                        </td>
                                    </tr>

                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>                           
    </div>


@endsection