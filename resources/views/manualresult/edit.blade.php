@extends('app')

@section('title')

    EDIT MANUAL RESULT ENTRY

@endsection

@section('content')
{!! Form::model($manualResult, ['route' => ['manual-result.update', $manualResult->ID], '@submit' => 'save',  'method' => 'PUT', 'class' => 'form-horizontal clearfix']) !!}
<div class="widget">
    <div class="widget-heading">
        <h3 class="widget-title">
            <a href="{{ route('manual-result.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជី | Manual Result Entry List</a>
            <div class="pull-right">
                <button type="submit" class="btn btn-raised btn-primary"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
            </div>
        </h3>
    </div>
    <div class="widget-body">
        <div class="wizard">
            <div class="content clearfix">
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::Label('Entry date', 'Entry date', ['class' => 'control-label col-lg-2']) !!}
                            <div class="col-lg-10">
                                {!! Form::date('Entry date', null , ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Indicator', 'Indicator', ['class' => 'control-label col-lg-2']) !!}
                            <div class="col-lg-10">
                                {!! Form::Select('Indicator', $indicators, null , ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group required" :class = "{'has-error': errors.has('Result') }">
                            {!! Form::Label('Result', 'Result', ['class' => 'control-label col-lg-2']) !!}
                            <div class="col-lg-10">
                                {!! Form::Number('Result', (int) $manualResult->Result, [ 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Sex', 'Sex', ['class' => 'required control-label col-lg-2']) !!}
                            <div class="col-lg-10">
                                {!! Form::Select('Sex', $sexes, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Notes', 'Notes', ['class' => 'control-label col-lg-2']) !!}
                            <div class="col-lg-10">
                                {!! Form::TextArea('Notes', null, ['class' => 'form-control', 'rows' => 3, 'cols' => 30]) !!}
                            </div>
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