@extends('app')

@push('styles')
    <style type="text/css">
        h4{
            padding-top:15px;
            padding-bottom:15px;
        }
        btn-primary{
            padding-top:15px;
            padding-bottom:15px;
        }
    </style>
@endpush

@section('title')
    Create Trainee
@endsection

@section('content')

    <div class="model-controler">
        <!-- Modal -->
        <div class="modal fade" id="traniningaccess" tabindex="-1" role="dialog" aria-labelledby="trainingaccess" aria-hidden="true">
            <div class="modal-dialog" style="width:1500px;"> 
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        @include('trainee.form.trainingaccess')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="posttraining" tabindex="-1" role="dialog" aria-labelledby="posttraining" aria-hidden="true">
            <div class="modal-dialog" style="width:1250px;"> 
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        @include('trainee.form.posttrainingsupport1')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="trainingemployment" tabindex="-1" role="dialog" aria-labelledby="posttraining" aria-hidden="true">
            <div class="modal-dialog" style="width:1250px;"> 
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        @include('trainee.form.post-traning-employment')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>    
        

    </div>
    


    <div class="row">
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-heading">
                    <h3 class="widget-title">New Trainee</h3>
                </div>
                <div class="widget-body"> 
                    {!! Form::open(['url' => 'foo/bar', 'class' => 'form-horizontal panel-body personal_data2', 'files' => true]) !!}
                        <div class="tabbable">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#basic-tab1" data-toggle="tab"> Application Form</a></li>
                                <li><a href="#basic-tab2" data-toggle="tab">Training Access</a></li>
                                <li><a href="#basic-tab3" data-toggle="tab">Post Training Employment</a></li>
                                
                                <li><a href="#basic-tab4" data-toggle="tab">វគ្គបណ្ដុះបណ្ដាល / Training Coures</a></li>
                                <li><a href="#basic-tab5" data-toggle="tab">ការគាំទ្រក្រោយវគ្គ / Post Training Support</a></li>
                                <li><a href="#basic-tab6" data-toggle="tab">វគ្គបណ្ដុះបណ្ដាល / Training Coures</a></li>
                            </ul>
                            <div class="tab-content">
                                
                                <div class="tab-pane active" id="basic-tab1">
                                    @include('trainee.form.application')                    
                                </div>

                                <div class="tab-pane" id="basic-tab2">
                                    @include('trainee.form.trainingaccess')
                                </div>

                                <div class="tab-pane" id="basic-tab3">
                                    @include('trainee.form.post-traning-employment')
                                </div>

                                <div class="tab-pane" id="basic-tab4">
                                    @include('trainee.form.home-visit')
                                </div>

                                <div class="tab-pane" id="basic-tab5">
                                    @include('trainee.form.posttrainingsupport1')
                                </div>

                                <div class="tab-pane" id="basic-tab6">
                                    @include('trainee.form.registration-fom-employed')
                                </div>

                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-lg-12">
                                <button data-style="expand-down" class="btn btn-raised btn-default ladda-button"><span class="ladda-label">Cancel</span><span class="ladda-spinner"></span></button>
                                <button data-style="expand-left" class="btn btn-raised btn-success ladda-button"><span class="ladda-label">Submit Data</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                            </div>
                        </div>

                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('#Province').change(function(e){
                e.preventDefault();
                if($(this).val() != 0){
                    $("#District").empty();
                    $.getJSON("/address/province/"+ $(this).val() , function(jsonData){
                        select = '<option disabled selected>Choose</option>';
                            $.each(jsonData, function(i,data)
                            {
                                select +='<option value="'+data.District+'">'+data.District+'</option>';
                            });
                        $("#District").html(select);
                    });
                }else{
                $("#District").empty();
                $("#Commune").empty();
                $("#Village").empty();
            }
            });

            $('#District').change(function(e){
                e.preventDefault();
                $("#Commune").empty();
                $.getJSON("/address/province/"+ $('#Province').val() +"/district/" + $(this).val() , function(jsonData){
                    select = '<option disabled selected>Choose</option>';
                        $.each(jsonData, function(i,data)
                        {
                            select +='<option value="'+data.Commune+'">'+data.Commune+'</option>';
                        });
                    $("#Commune").html(select);
                });
                $("#Village").empty();
            });

            $('#Commune').change(function(e){
                e.preventDefault();
                $("#Village").empty();
                $.getJSON("/address/province/"+ $('#Province').val() +"/district/" + $('#District').val() + '/commune/' + $(this).val() , function(jsonData){
                //$.getJSON("{{ route('address.village', ['province' =>" + $('#Province').val() + " , 'district' =>" + $('#District').val() + ", 'commune' => "+ $(this).val() +"]) }}" , function(jsonData){
                    select = '<option disabled selected>Choose</option>';
                        $.each(jsonData, function(i,data)
                        {
                            select +='<option value="'+data.Village+'">'+data.Village+'</option>';
                        });
                    $("#Village").html(select);
                });
            });

        });
    </script>
@endpush