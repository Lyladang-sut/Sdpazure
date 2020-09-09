{{ Form::open(array('url' => 'foo/bar',"class"=>"form-horizontal")) }}

<div class="widget">

    <div class="panel-body">
        <div class="form-group">
            {!! Form::Label('Position', 'មុខតំណែង/Position', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Text('Position', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::Label('How Many', 'How Many', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Text('How Many', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::Label('Comments', 'មតិយោបល់/Comments', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Text('Comments', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="panel-body text-right">
        <button type="button" data-style="expand-down" class="btn btn-raised btn-default ladda-button" data-dismiss="modal"><span class="ladda-label">Cancel</span><span class="ladda-spinner"></span></button>
        <button data-style="expand-left" class="btn btn-raised btn-success ladda-button"><span class="ladda-label">Submit Data</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
    </div>
</div>

{{ Form::close() }}