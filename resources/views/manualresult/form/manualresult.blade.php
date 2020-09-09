<div class="col-md-12" style="margin-top:30px">
    <div class="form-group">
        {!! Form::Label('Entry date', 'Entry date', ['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::Date('Entry date', null , ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('Indicator', 'Indicator', ['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::Select('Indicator', $indicator , null , ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group required" :class = "{'has-error': errors.has('Result') }">
        {!! Form::Label('Result', 'Result', ['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::Number('Result', null , ['v-validate' => "'required'", 'class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('Sex', 'Sex', ['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10">
            {!! Form::Select('Sex', $sex , null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('Notes', 'Notes', ['class' => 'control-label col-lg-2']) !!}
        <div class="col-lg-10" style="margin-top:10px; margin-bottom:10px;">
            {!! Form::TextArea('Notes', null, ['class' => 'form-control', 'rows' => 3, 'cols' => 30]) !!}
        </div>
    </div>
</div>