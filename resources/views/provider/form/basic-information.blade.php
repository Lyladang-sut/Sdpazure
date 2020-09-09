<div class="col-md-6">
    <div class="form-group required">
        {!! Form::Label('Name organization_institution', 'Orginisation/ Institute', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Text('Name organization_institution', null, ['required' => 'required', 'class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::Label('Type', 'Type', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Select('Type',$type, null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('Sector', 'Sector/ Focus Area', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Select('Sector',$sector, null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('Target learner type', 'Target learner type', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Select('Target learner type',$learner_type, null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <h4>Location</h4>

    <div class="form-group">
        {!! Form::Label('Country', 'Country', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Select('Country',[], null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('Province', 'Province', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Select('Province',[], null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('District', 'District', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Select('District',[], null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('Address', 'Address', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Select('Address',[], null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="col-md-6">
    <h4>Contact Info
    <button type="button" class="btn btn-raised btn-success btn-sm pull-right" data-toggle="modal" data-target="#provider-contact">+</button>
    </h4><br>
    <table class="table" style="border:1px solid #ddd">
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Email</th>
        </tr>
        <tr>
            <td colspan=3>information here</td>
        </tr>
    </table>
</div>