{{ Form::open(array('url' => 'foo/bar',"class"=>"form-horizontal")) }}

<div class="widget">

    <div class="panel-body">
        <div class="form-group">
            {!! Form::Label('Family Name', 'តោត្តនាម/Family Name', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Text('Family Name', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::Label('First Name', 'នាម/First Name', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Text('First Name', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::Label('Position', 'មុខតំណែង/Position', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Text('Position', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::Label('Phone Number', 'លេខទូរសព្ទ/hone Number', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Text('Phone Number', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::Label('Email', 'អ៊ីម៉ែល/Email', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Text('Email', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="panel-body text-right">
        <button type="button" data-style="expand-down" class="btn btn-raised btn-default ladda-button" data-dismiss="modal"><span class="ladda-label">Cancel</span><span class="ladda-spinner"></span></button>
        <button data-style="expand-left" class="btn btn-raised btn-success ladda-button"><span class="ladda-label">Submit Data</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
    </div>
</div>

{{ Form::close() }}