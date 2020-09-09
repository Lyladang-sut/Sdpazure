
<div class="col-md-8">
    <table class="table table-bordered table-responsive">
        <tr>
            <td>8</td>
            <td>{!! Form::Label('', 'How many SDP graduates did your enterprise hire?') !!}</td>
            <td colspan="3">{!! Form::Select('', [] ,null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>9</td>
            <td colspan="3">{!! Form::Label('', 'How do you/ your enterprise usually find new employees?') !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Label('', 'a. Advertisement of vacancies in newspapers, internet, posters, etc.') !!}</td>
            <td colspan="3">{!! Form::Checkbox('', null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Label('', 'b. Direct contact with employees') !!}</td>
            <td colspan="3">{!! Form::Checkbox('', null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Label('', 'c. Employment agencies') !!}</td>
            <td colspan="3">{!! Form::Checkbox('', null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Label('', 'd. Direct contact to training institutions') !!}</td>
            <td colspan="4">{!! Form::Checkbox('', null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Label('', 'e. Other') !!}</td>
            <td>{!! Form::Checkbox('', null , false) !!}</td>
            <td colspan="2">{!! Form::Text('' ,null , ['class' => 'form-control', 'placeholder' => 'Other please specific...' ]) !!}</td>
        </tr>
        <tr>
            <td>10</td>
            <td colspan="4">{!! Form::Label('', 'Please give the name(s) of the SDP graduates and the date (month/year) that you hired:') !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
            <td>{!! Form::Date('', null , ['class' => 'form-control']) !!}</td>
            <td width="20%">{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
            <td>{!! Form::Date('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
            <td>{!! Form::Date('', null , ['class' => 'form-control']) !!}</td>
            <td width="20%">{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
            <td>{!! Form::Date('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
            <td>{!! Form::Date('', null , ['class' => 'form-control']) !!}</td>
            <td width="20%">{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
            <td>{!! Form::Date('', null , ['class' => 'form-control']) !!}</td>
        </tr>
    </table>
</div>
