@extends('app')

@section('title')

    CREATE TRAINING PROVIDER

@endsection

@section('content')

    <div class="modal fade" id="provider-contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-views" style="width: 50%;top:10%;background: #FFF">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="gridModalLabel">TPP Contact</h4>
            </div>
            <div class="modal-wait text-center">
                <div class="wait-text">

                </div>
            </div>
            <div class="modal-content load-modal-form">
                @include('provider.form.contact')
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


    {!! Form::open(['route' => 'provider.store', 'class' => 'form-horizontal clearfix']) !!}
        <div class="widget">
            <div class="widget-heading">
                <a href="{{ route('provider.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i> All Enterprise</a>
                <div class="pull-right">
                    <button type="submit" class="btn btn-raised btn-primary"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
                </div>
            </div>
            <div class="widget-body">
                <div class="wizard">
                    <div class="steps clearfix">
                        <ul role="tablist">
                            <li role="tab" class="first current">
                                <a class="wizard-a-link">
                                    <span class="number pull-left">1.</span> 
                                    <p class="wizard-p">
                                        <span class="wizard-span">Contact Info </span>
                                       
                                    </p>
                                </a>
                            </li>
                            <li role="tab" class="disabled">
                                <a href="#" class="wizard-a-link">
                                    <span class="number pull-left">2.</span> 
                                    <p class="wizard-p">
                                        <span class="wizard-span"> Trainers</span>
                                      
                                    </p>
                                </a>
                            </li>
                            <li role="tab" class="disabled">
                                <a href="#" class="wizard-a-link">
                                    <span class="number pull-left">3.</span> 
                                    <p class="wizard-p">
                                        <span class="wizard-span">Assessors</span>
                                       
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

               
            
                    <div class="panel-body">
                        {{ Form::open(array('url' => 'foo/bar',"class"=>"form-horizontal")) }}
                             @include('provider.form.basic-information')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}

@endsection

@push('scripts')

    //scripts

@endpush