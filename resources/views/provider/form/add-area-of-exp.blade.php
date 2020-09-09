<div class="panel-body form-horizontal">
    <div class="form-group">
        {!! Form::Label('Sector', 'វិស័យ/Sector', ['class' => 'control-label col-lg-4']) !!}
        <div class="col-lg-6">
            {!! Form::Select('Sector',[], null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('Division', 'ផ្នែក/ Division', ['class' => 'control-label col-lg-4']) !!}
        <div class="col-lg-6">
            {!! Form::Select('Division',[], null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('Occupation', 'មុខរបរ/Occupation', ['class' => 'control-label col-lg-4']) !!}
        <div class="col-lg-6">
            {!! Form::Select('Occupation',[], null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('Other', 'ផ្សេងៗ/Other', ['class' => 'control-label col-lg-4']) !!}
        <div class="col-lg-6">
            {!! Form::Text('Other', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>