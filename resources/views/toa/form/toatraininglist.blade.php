{{ Form::open(array('url' => 'foo/bar',"class"=>"form-horizontal")) }}
<div class="widget">
    <div class="panel-body">
                
                <div class="form-group">
                    {!! Form::Label('Owner or Trainer', 'Owner or Trainer', ['class' => 'control-label col-md-5']) !!}
                    <div class="col-md-7">
                        {!! Form::Select('Owner or Trainer', $trainers , null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <h5 style="color:#32CD32 ; font-size: 18px;">If trainer & Assessor</h5>
                <hr>
                <div class="form-group">
                    {!! Form::Label('Organisation', 'Organisation', ['class' => 'control-label col-lg-5']) !!}
                    <div class="col-lg-7">
                        {!! Form::Select('Organisation', $nameOrganisation , null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Trainer', 'Trainer Name', ['class' => 'control-label col-lg-5']) !!}
                    <div class="col-lg-7">
                        {!! Form::Select('Trainer', $trainers , null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <h5 style="color:#F08080 ; font-size: 18px;">If Owner</h5>
                <hr>    
                <div class="form-group">
                    {!! Form::Label('Enterprise', 'Enterprise', ['class' => 'control-label col-lg-5']) !!}
                    <div class="col-lg-7">
                        {!! Form::Select('Enterprise', $enterprises , null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Owner', 'Owner Name', ['class' => 'control-label col-lg-5']) !!}
                    <div class="col-lg-7">
                        {!! Form::Select('Owner', [], null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <h5 style="color:#800000 ; font-size: 18px;">If Assessor</h5>
                <hr>
                <div class="form-group">
                    {!! Form::Label('Organisation', 'Organisation', ['class' => 'control-label col-lg-5']) !!}
                    <div class="col-lg-7">
                        {!! Form::Select('Organisation', $nameOrganisation , null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Assessor', 'Assessor Name', ['class' => 'control-label col-lg-5']) !!}
                    <div class="col-lg-7">
                        {!! Form::Select('Assessor',[], null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                
                <h5 style="color:#FFA07A ; font-size: 18px;">If Enterprise Assessor</h5>
                <hr>
                <div class="form-group">
                    {!! Form::Label('Enterprise', 'Enterprise', ['class' => 'control-label col-lg-5']) !!}
                    <div class="col-lg-7">
                        {!! Form::Select('Enterprise', $enterprises , null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('EntAssessor', 'Assessor Name', ['class' => 'control-label col-lg-5']) !!}
                    <div class="col-lg-7">
                        {!! Form::Select('EntAssessor', ['1' => '1' , '2' => '2'] , null, ['class' => 'form-control']) !!} 
                    </div>
                </div>

                <h5 style="color:#778899 ; font-size: 18px;">Training Result </h5>
                <div class="form-group required">
                    {!! Form::Label('Competent', 'Competent', ['class' => 'control-label col-lg-5']) !!}
                    <div class="col-lg-7">
                        {!! Form::Select('Competent', $competent , null, ['required' => 'required', 'class' => 'form-control']) !!}
                    </div>
                </div>
       
    </div>
</div>    
{!! Form::close() !!}