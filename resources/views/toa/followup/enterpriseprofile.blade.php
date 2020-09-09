<div class="col-lg-8">
    <h4>Enterprise Profile</h4>
    
    <div class="form-group">
        {!! Form::Label('', 'Name of Interview( Owner / Manager )', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Text('', null , ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::Label('', 'Position', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Text('', null , ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::Label('', 'Phone', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Text('', null , ['class' => 'form-control']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::Label('', '1. Name of Enterprise', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Text('', null , ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('', '2. Date that business started?', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Date('', null , ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('', '3. Business has license?', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Checkbox('' , 1 , false ) !!}   Licensed
            &nbsp;&nbsp;&nbsp;&nbsp;
            {!! Form::Checkbox('', 0 ,false ) !!}   Not Licensed
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('', '4. Type of Business (restaurant, repair workshop, beauty salon, etc)', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Date('', null , ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('', '5. What is the business sector of your enterprise? Please select only ONE', ['class' => 'control-label col-lg-6']) !!}
    </div>
    <div class="col-lg-10">
        <div class="col-lg-2">Beauty</div>
        <div class="col-lg-1">{!! Form::Checkbox('', null , false ) !!}</div>

        <div class="col-lg-2">Handicrafts </div>
        <div class="col-lg-1">{!! Form::Checkbox('', null , false) !!}</div>

        <div class="col-lg-2">Mechanic</div>
        <div class="col-lg-1">{!! Form::Checkbox('', null , false) !!}</div>

        <div class="col-lg-2">Construction</div>
        <div class="col-lg-1">{!! Form::Checkbox('', null , false) !!}</div>

        <div class="col-lg-2">Hospitality </div>
        <div class="col-lg-1">{!! Form::Checkbox('', null , false) !!}</div>

        <div class="col-lg-2">Travel Service</div>
        <div class="col-lg-1">{!! Form::Checkbox('', null , false) !!}</div>

        <div class="col-lg-2">Footwear</div>
        <div class="col-lg-1">{!! Form::Checkbox('', null , false) !!}</div>

        <div class="col-lg-2">Massage & Spa</div>
        <div class="col-lg-1">{!! Form::Checkbox('', null , false) !!}</div>

        <div class="col-lg-2">Garment</div>
        <div class="col-lg-1">{!! Form::Checkbox('', null , false) !!}</div>

        <div class="col-lg-2">Other </div>
        <div class="col-lg-1">{!! Form::Checkbox('', null , false) !!}</div>
    </div>
    <!--Other field need to add texx box-->

    <div class="form-group">
        {!! Form::Label('', '6. Location: Province', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Date('', null , ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('', 'District', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">{!! Form::Text('', null , ['class' => 'form-control']) !!}</div>
    </div>

    <div class="form-group">
        {!! Form::Label('', 'Commune', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">{!! Form::Text('', null , ['class' => 'form-control']) !!}</div>
    </div>

    <div class="form-group">
        {!! Form::Label('', 'Village', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">{!! Form::Text('', null , ['class' => 'form-control']) !!}</div>
    </div>

    <div class="form-group">
        {!! Form::Label('', 'House number', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">{!! Form::Text('', null , ['class' => 'form-control']) !!}</div>
    </div>

    <div class="form-group">
        {!! Form::Label('', '7. Please provide two contacts at the enterprise', ['class' => 'control-label col-lg-6']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::Label('', 'Name', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Text('', null , ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::Label('', 'Position', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Text('', null , ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('', 'Phone Number', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Text('', null , ['class' => 'form-control']) !!}
        </div>
    </div>
</div>