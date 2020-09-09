<div class="col-lg-12">
    <div class="form-group">
        {!! Form::Label('Participant Name', 'Participant Name', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::select('Participant Name', $participantName , null, ['required' => 'required','class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('income USD or Riel', 'income USD or Riel', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::select('income USD or Riel', $incomes , null, ['required' => 'required','class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('Monthly Income  USD', 'Monthly Income  USD', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Text('Monthly Income  USD' , null, ['required' => 'required','class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('Monthly Income riel', 'Monthly Income riel', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Text('Monthly Income riel' , null, ['required' => 'required','class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('Result', 'Result', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::select('Result' , $results , null, ['required' => 'required','class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('Enterprise', 'Enterprise Assessee Work At', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::text('Enterprise' , null, ['required' => 'required','class' => 'form-control']) !!}
        </div>
    </div>

</div>