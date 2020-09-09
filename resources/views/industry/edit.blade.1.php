@extends('app')

@push('styles')

    //Style 

@endpush

@section('title')

    EDIT INDUSTRY

@endsection

@section('content')
<div class="widget">
    <div class="widget-heading">
        <h3 class="widget-title">
            <a href="{{ route('industry.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជីអ្នកចូលរួម | ALL Industry Paticipants</a>
            <div class="pull-right">
                <a href="{{ route('industry.show', $industry->ID) }}" target="_blank" class="btn btn-raised btn-warning"><i class="ti-eye mr-5"></i>មើល | View</a>
                <a href="{{ route('industry.delete', $industry->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</a>
                <button type="submit" class="btn btn-raised btn-success"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
            </div>
        </h3>
    </div>
    <div class="widget-body">
    {!! Form::model($industry, ['route' => ['industry.update', $industry->ID], 'method' => 'PUT', 'class' => 'form-horizontal clearfix']) !!}
        <div class="panel-body">
            <div class="tabbable wizard">
                <ul class="nav nav-tabs steps">
                <li class="active col-md-2">                        
                    <a class="wizard-a-link" href="#basic-tab1" data-toggle="tab" aria-expanded="true">
                        <span class="number pull-left">1.</span> 
                        <p class="wizard-p" style="min-width: 200px;">
                        <span class="wizard-span">ប្រវត្ដិរូប</span><br>
                            <span>Profile</span>                                
                        </p>
                    </a>
                </li>
                <li class=" col-md-2">                        
                    <a class="wizard-a-link" href="#basic-tab2" data-toggle="tab" aria-expanded="true">
                        <span class="number pull-left">2.</span> 
                        <p class="wizarsd-p" style="min-width: 200px;">
                        <span class="wizard-span">ផ្តល់ការបណ្តុះបណ្តាល</span><br>
                            <span >Giving Training</span>                                
                        </p>
                    </a>
                </li>
                <li class=" col-md-2">                        
                    <a class="wizard-a-link" href="#basic-tab3" data-toggle="tab" aria-expanded="true">
                        <span class="number pull-left">3.</span> 
                        <p class="wizard-p" style="min-width: 200px;">
                        <span class="wizard-span">ការបណ្តុះបណ្តាល</span><br>
                            <span >Taking Training</span>                                
                        </p>
                    </a>
                </li>
            </ul>
                
                <div class="tab-content">
         
                    <div class="tab-pane active" id="basic-tab1">
                        <div class="enterprise">
                            <div class="widget">
                                <div class="panel-body">
                                    @include('industry.form.profile');
                                </div>
                            </div>                           
                        </div>
                    </div>

                    <div class="tab-pane" id="basic-tab2">
                        <div class="tab-pane active" id="basic-tab2">
                            <div class="enterprise">
                                <div class="widget">
                                    <div class="panel-body">
                                        @include('industry.form.giving-training')
                                    </div>
                                </div>                           
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="basic-tab3">
                        <div class="tab-pane active" id="basic-tab3">
                            <div class="enterprise">
                                <div class="widget">
                                    <div class="panel-body">
                                        @include('industry.form.taking-training')
                                    </div>
                                </div>                           
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>

@endsection

@push('scripts')

    

@endpush