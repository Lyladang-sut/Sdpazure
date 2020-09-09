<div class="panel-body form-horizontal">

    <div class="form-group required">
        {!! Form::Label('Area expertise om', 'Area expertise', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Select('Area expertise om', $DimOMAreaExp, null, ['required'=>'required', 'class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('If other, Specify', 'If other, Specify', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Text('If other, Specify', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('Years experience', 'Years experience', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Text('Years experience', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group required">
        {!! Form::Label('Certificate received', 'Certificate received', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Select('Certificate received',$yes_no, null, ['required'=>'required', 'class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('Type Certificate related received', 'Type Certificate received', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Text('Type Certificate related received', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="panel-body text-right">
        <button type="button" data-style="expand-down" class="btn btn-raised btn-default ladda-button" data-dismiss="modal"><span class="ladda-label">Cancel</span><span class="ladda-spinner"></span></button>
        <button data-style="expand-left" class="btn btn-raised btn-success ladda-button"><span class="ladda-label">Submit Data</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
    </div>
</div>


