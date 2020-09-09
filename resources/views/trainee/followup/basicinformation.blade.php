
<div class="col-md-8">
    <table class="table table-bordered table-responsive">
        <tr>
            <td>1</td>                        
            <td><b>Family Name</b></td>
            <td>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>2</td>                       
            <td><b>Name</b></td>
            <td>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>3</td>                       
            <td><b>Course code graduate participate in</b></td>
            <td>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>4</td>                      
            <td><b>Date follow up</b></td>
            <td>{!! Form::Date('Date Follow Up', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>5</td>                      
            <td><b>Are you able to contact the graduate?</b></td>
            <td>
                <div class="col-md-3">
                    Yes {!! Form::Checkbox('Able to contact graduate', false) !!}
                </div>
                <div class="col-md-3">
                    No {!! Form::Checkbox('Able to contact graduate', false) !!}
                </div>
            </td>
        </tr>

        <tr>
            <td></td>
            <td><b>If not able to reach, give reason why</b></td>
            <td>{!! Form::Text('No contact, reason', null , ['class' => 'form-control']) !!}</td>
        </tr>   
    </table>
</div>