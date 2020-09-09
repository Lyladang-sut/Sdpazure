@extends('app')

@push('styles')

    //Style 

@endpush

@section('title')

    SHOW MANUAL RESULT LISTS

@endsection

@section('content')
<div class="modal fade" id="provider-contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-views" style="width: 35%;top:10%;background: #FFF">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="gridModalLabel">OMTrainerExperience</h4>
        </div>
        <div class="modal-wait text-center">
            <div class="wait-text">

            </div>
        </div>
        <div class="modal-content load-modal-form">
            @include('provider.form.add-contact')
        </div>
    </div>
</div>

<div class="modal fade" id="provider-trainers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-views" style="width: 65%;top:10%;background: #FFF">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="gridModalLabel">Trainers</h4>
        </div>
        <div class="modal-wait text-center">
            <div class="wait-text">

            </div>
        </div>
        <div class="modal-content load-modal-form">
            @include('provider.form.add-trainers')
        </div>
    </div>
</div>

<div class="modal fade" id="provider-assessors" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-views" style="width: 65%;top:10%;background: #FFF">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="gridModalLabel">assessors</h4>
        </div>
        <div class="modal-wait text-center">
            <div class="wait-text">

            </div>
        </div>
        <div class="modal-content load-modal-form">
            @include('provider.form.add-assessors')
        </div>
    </div>
</div>

<div class="modal fade" id="add-area-of-exp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-views" style="width: 35%;top:10%;background: #FFF">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="gridModalLabel">Area of exp</h4>
        </div>
        <div class="modal-wait text-center">
            <div class="wait-text">

            </div>
        </div>
        <div class="modal-content load-modal-form">
            @include('provider.form.add-area-of-exp')
        </div>
    </div>
</div>

<div class="modal fade" id="course-taught-list" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-views" style="width: 35%;top:10%;background: #FFF">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="gridModalLabel">Course Taught List</h4>
        </div>
        <div class="modal-wait text-center">
            <div class="wait-text">

            </div>
        </div>
        <div class="modal-content load-modal-form">
            @include('provider.form.add-course-taught-list')
        </div>
    </div>
</div>

<div class="tabbable">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#basic-tab1" data-toggle="tab" aria-expanded="true">Basic Information</a></li>
            <li><a href="#basic-tab2" data-toggle="tab" aria-expanded="true">Trainers</a></li>
            <li><a href="#basic-tab3" data-toggle="tab" aria-expanded="true">Assessors</a></li>

        </ul>

        <div class="tab-content">
            {{ Form::open(array('url' => 'foo/bar',"class"=>"form-horizontal")) }}

                <div class="tab-pane active" id="basic-tab1">
                    <div class="provider">
                        <div class="widget">
                            <div class="widget-heading">
                                <h4 class="widget-title">Training Providers</h4>
                            </div>
                            <div class="panel-body">
                                @include('provider.form.basic-information')
                            </div>
                        </div>                        
                    </div>
                </div>

                <div class="tab-pane" id="basic-tab2">
                    <div class="provider">
                        <div class="widget">
                            <div class="widget-heading">
                                <h4 class="widget-title">Training Providers</h4>
                            </div>
                            <div class="panel-body">
                                @include('provider.form.trainers')
                            </div>
                        </div>                        
                    </div>
                </div>

                <div class="tab-pane" id="basic-tab3">
                    <div class="provider">
                        <div class="widget">
                            <div class="widget-heading">
                                <h4 class="widget-title">Training Providers</h4>
                            </div>
                            <div class="panel-body">
                            @include('provider.form.assessors')
                            </div>
                        </div>                        
                    </div>

                </div>
                <button data-style="expand-down" class="btn btn-raised btn-default ladda-button"><span class="ladda-label">Cancel</span><span class="ladda-spinner"></span></button>
                <button data-style="expand-left" class="btn btn-raised btn-success ladda-button"><span class="ladda-label">Submit Data</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
            {{ Form::close() }}
        </div>
    </div>
@endsection

@push('scripts')

    //scripts

@endpush