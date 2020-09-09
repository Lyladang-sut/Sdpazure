@extends('app')

@push('styles')
    <style type="text/css">
       td {
            padding: 5px;
        }
    </style>
@endpush

@section('title')
    Manual Result Entry
@endsection

@section('content')

{!! Form::open(['route' => 'manual-result.store', '@submit' => 'save', 'class' => 'form-horizontal']) !!}
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">
                    <a href="{{ route('manual-result.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជី | Manual Result Entry List</a>
                    <div class="pull-right">
                        <button data-style="expand-left" class="btn btn-raised btn-primary ladda-button"><span class="ladda-label">រក្សាទុក | Save</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                    </div>
                </h3>
            </div>
            <div class="widget-body"> 
                
                <div class="tabbable">
                    <div class="tab-content panel-body" style="padding-left:0px">
                        
                        <div class="tab-pane active" id="basic-tab1">
                            @include('manualresult.form.manualresult')                    
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection

@push('scripts')

<script type="text/javascript">
    var app = new Vue({

        el: '#App',

        data: {
          
        },
        methods: {
                save: function(e){
                    var vm = this;
                    this.$validator.validateAll().then((result) => {
                        if (!result) {
                            console.log(result);
                            e.preventDefault();
                        }
                    })
                },
            }
    });

</script>

@endpush