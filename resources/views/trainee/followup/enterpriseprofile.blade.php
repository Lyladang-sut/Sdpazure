
<div class="col-md-8">
    <table class="table table-responsive table-bordered">
        <tr>
            <td></td>
            <td>{!! Form::Label('', 'Name of Interview( Owner / Manager )') !!}</td>
            <td colspan="4">{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Label('', 'Position') !!}</td>
            <td>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
            <td>{!! Form::Label('', 'Phone', ['class' => 'control-label col-lg-6']) !!}</td>
            <td colspan="2">{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>1</td>
            <td>{!! Form::Label('', 'Name of Enterprise') !!}</td>
            <td colspan="4">{!! Form::Text('', null , ['class' => 'form-control']) !!}</td> 
        </tr>
        <tr>
            <td>2</td>
            <td>{!! Form::Label('', 'Date that business started?') !!}</td>
            <td colspan="4">{!! Form::Date('', null , ['class' => 'form-control']) !!}</td> 
        </tr>
        <tr>
            <td>3</td>
            <td>{!! Form::Label('', 'Business has license?') !!}</td>
            <td>{!! Form::Label('', ' Licensed') !!}</td>
            <td>{!! Form::Checkbox('' , null , false ) !!}</td>
            <td>{!! Form::Label('', 'No Licensed') !!}</td>
            <td>{!! Form::Checkbox('' , null , false ) !!}</td>
        </tr>
        <tr>
            <td>4</td>
            <td>{!! Form::Label('', 'Type of Business (restaurant, repair workshop, beauty salon, etc)') !!}</td>
            <td colspan="4">{!! Form::Date('', null , ['class' => 'form-control']) !!}</td> 
        </tr>
        <tr>
            <td>5</td>
            <td colspan="5">{!! Form::Label('', ' What is the business sector of your enterprise? Please select only ONE') !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>Beauty</td>
            <td>{!! Form::Checkbox('', null , false ) !!}</</td>
            <td>Handicrafts</td>
            <td colspan="2">{!! Form::Checkbox('', null , false) !!}</</td>
        </tr>
        <tr>
            <td></td>
            <td>Mechanic</td>
            <td>{!! Form::Checkbox('', null , false) !!}</</</td>
            <td>Construction</td>
            <td colspan="2">{!! Form::Checkbox('', null , false) !!}</</td>
        </tr>
        <tr>
            <td></td>
            <td>Hospitality </td>
            <td>{!! Form::Checkbox('', null , false ) !!}</</td>
            <td>Travel Service</td>
            <td colspan="2">{!! Form::Checkbox('', null , false) !!}</</td>
        </tr>
        <tr>
            <td></td>
            <td>Footwear</td>
            <td>{!! Form::Checkbox('', null , false ) !!}</</td>
            <td>Massage & Spa</td>
            <td colspan="2">{!! Form::Checkbox('', null , false) !!}</</td>
        </tr>
        <tr>
            <td></td>
            <td>Garment</td>
            <td>{!! Form::Checkbox('', null , false ) !!}</</td>
            <td>Other</td>
            <td>{!! Form::Checkbox('', null , false) !!}</</td>
            <td>{!! Form::Text('', null , ['class' => 'form-control', 'placeholder' => 'Other Please specific...']) !!}</td>
        </tr>
        <tr>
            <td>6</td>
            <td>{!! Form::Label('', 'Location: Province') !!}</td>
            <td colspan="4">{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Label('', 'District') !!}</td>
            <td>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
            <td>{!! Form::Label('', 'Commune') !!}</td>
            <td colspan="2">{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Label('', 'Village') !!}</td>
            <td>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
            <td>{!! Form::Label('', 'House number') !!}</td>
            <td colspan="2">{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        
        
    </table>
</div>