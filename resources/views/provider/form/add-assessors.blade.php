<div class="panel-body">
    <div class="form-horizontal">
        <div class="col-md-5">
            <div class="form-group">
                {!! Form::Label('First name', 'នាម/First name', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('First name', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Date of birth', 'ថ្ងៃ ខែ ឆ្នាំ កំណើត/Date of birth', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::date('Date of birth', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Province', 'ខេត្ត/Province', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Select('Province',[], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Sex', 'ភេទ/Sex', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Select('Sex',[], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            

            <div class="form-group">
                {!! Form::Label('Email', 'អ៊ីម៉ែល/Email', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('Email', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Contact 1', 'អ្នកទំនាក់ទំនង១/Contact 1', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('Contact 1', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Trainer of Assesors', 'Trainer of Assesors', ['class' => 'control-label col-lg-9']) !!}
                <div>
                    {!! Form::checkbox('Trainer of Assesors', null, ['class' => 'form-control']) !!}
                </div>
            </div>

        </div>

         <div class="col-md-5">
            <div class="form-group">
                {!! Form::Label('Last name', 'គោត្តនាម/Last name', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('Last name', null, ['class' => 'form-control']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::Label('Country', 'ប្រទេស/Country', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Select('Country',[], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('District', 'ស្រុក/District', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Select('District',[], null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Last year of School', 'កំរិតវប្បធម៌/Last year of School', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Select('Last year of School',[], null, ['class' => 'form-control']) !!}
                </div>
            </div>
            
            <div class="form-group">
                {!! Form::Label('Phone number', 'លេខទូរសព្ទ/Phone number', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('Phone number', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Contact 1 Number', 'លេខទូរសព្ទ ១/Contact 1 Number', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('Contact 1 Number', null, ['class' => 'form-control']) !!}
                </div>
            </div>


        </div>

        <div class="col-md-2">
            <div class="form-group">                    
                    <div class="col-lg-12">
                        {!! Form::file('Photo', ['class' => 'form-control']) !!}
                    </div>
                </div>
        </div>
    </div>    
        
     {{ Form::close() }}
</div>