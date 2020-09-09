<div class="col-lg-6">

    <div class="form-group required">
        {!! Form::Label('Date of test', 'Date of test', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::date('Date of test', null, ['required' => 'required','class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group required">
        {!! Form::Label('RPL provider', 'RPL provider', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::select('RPL provider', $rplprovider , null, ['required' => 'required','class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group required">
        {!! Form::Label('Location Test', 'Location', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::select('Location', $rpllocation , null, ['required' => 'required','class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group required">
        {!! Form::Label('Assesment Sector', 'Assesment Sector', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::select('Assesment Sector', $rplsector , null, ['required' => 'required','class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group required">
        {!! Form::Label('Occupation', 'Course', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::select('Course', $rplcourse , null, ['required' => 'required','class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group required">
        {!! Form::Label('Batch ID', 'Batch', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::select('Batch', $rplbatch , null, ['required' => 'required','class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="col-lg-8">
    <h4>RPL Test Attendees</h4>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add New RPL Test Attendees
    </button>
    <table class="table table-responsive">
        <thead>
            <tr style="backgroud-color:	#F5F5DC">
                <th>Participant Name</th>
                <th>Monthly Income $</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

