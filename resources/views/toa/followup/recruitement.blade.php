<div class="col-lg-8">
    <h4>Recruitement</h4>

    <div class="form-group">
        {!! Form::Label('', '8. How many SDP graduates did your enterprise hire?', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Select('', [] ,null , ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('', '9. How do you/ your enterprise usually find new employees?', ['class' => 'control-label col-lg-6']) !!}
    </div>

    <div class="col-lg-10">
        <div class="form-group">
            {!! Form::Label('', 'a. Advertisement of vacancies in newspapers, internet, posters, etc.', ['class' => 'control-label col-lg-7']) !!}
            <div class="col-lg-1">
                {!! Form::Checkbox('', null , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::Label('', 'b. Direct contact with employees', ['class' => 'control-label col-lg-7']) !!}
                <div class="col-lg-1">
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::Label('', 'c. Employment agencies', ['class' => 'control-label col-lg-7']) !!}
                    <div class="col-lg-1">
                        {!! Form::Checkbox('', null , ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::Label('', 'd. Direct contact to training institutions', ['class' => 'control-label col-lg-7']) !!}
                        <div class="col-lg-1">
                            {!! Form::Checkbox('', null , ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::Label('', 'e. Other', ['class' => 'control-label col-lg-7']) !!}
                            <div class="col-lg-1">
                                {!! Form::Checkbox('', null , ['class' => 'form-control']) !!}
                                <!--Other field need to add texx box-->
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('', '10. Please give the name(s) of the SDP graduates and the date (month/year) that you hired:', ['class' => 'control-label col-lg-12']) !!}
                        </div>
                        <table>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>{!! Form::Date('', null , ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::Date('', null , ['class' => 'form-control']) !!}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>{!! Form::Date('', null , ['class' => 'form-control']) !!}</td>
                                <td>{!! Form::Date('', null , ['class' => 'form-control']) !!}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>