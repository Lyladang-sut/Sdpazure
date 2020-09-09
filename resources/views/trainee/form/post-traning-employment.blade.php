{{ Form::open(array('url' => 'foo/bar',"class"=>"form-horizontal")) }}
<div class="widget">
    <div class="widget-heading">
        <h4 class="widget-title">Post Training Employment</h4>
    </div>
    <div class="panel-body">

        <div class="row">
            <div class="col-lg-6">
                
                <div class="form-group">
                    {!! Form::Label('Employment status', 'ស្ថានភាពការងារក្នុងរយះពេល/ Employment status', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                    {!! Form::Select('Employment status', $employmentStatuses , null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-6"></div>
        </div>
        <div class="row">
            
            <div class="col-lg-6">
            
                <div class="form-group">
                    {!! Form::Label('Enterprise Name', 'ឈ្មោះសហគ្រាស​/Name of enterprise', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Text('Enterprise Name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Date', 'ថ្ងៃខែឆ្នាំចូលបម្រើការងារ/Date got employed', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Date('Date', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                
                <div class="form-group">
                    {!! Form::Label('If self-emp, business type', 'If self-employed, enter business type', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Text('If self-emp, business type', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Location business', 'If self employed, enter business location', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Text('Location business', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h4 style="padding-top:10px; padding-bottom:10px; padding-left:5px">Please enter the monthly income that graduates make. If they receive a commission, ask the graduate how much he/she has received in the past months in average</h4>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-6">
                    
                    <div class="form-group">
                        {!! Form::Label('Commission per client', 'តើសិក្ខាកាមទទួលបានភាគរយ ជំនួសប្រាក់ខែទេ?​ Does graduate receive commission as their monthly income?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Commission per client', $yesornos , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('If comission, describe', 'ប្រសិនបើទទួលបានភាគរយ សូមបញ្ជាក់ចំនួន/ភាគរយ/ If yes, please enter amount or percentage received', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('If comission, describe', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-6"></div>
            </div>
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::Label('Salary (Riel)', 'ប្រាក់ខែ  រៀល/ Monthly Income (Riel)', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Salary (Riel)', null, ['class' => 'form-control']) !!}
                        </div>
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::Label('Salary (USD)', 'ប្រាក់ខែ  ដុល្លា/ Monthly Income (USD)', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                        {!! Form::Text('Salary (Riel)', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>    
                </div>
            </div>

            <div class="row">
                
                <div class="col-lg-12">
                    <hr>
                    <div class="form-group">
                        {!! Form::Label('Accommodation support', 'ទទួលបានការឧបត្ថម្ភលើការស្នាក់នៅ?/Receive accommodation support?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Accommodation support', $yesornos , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Food support', 'ទទួលបានការឧបត្ថម្ភលើអាហារ?/Receive food support?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Food support', $yesornos , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Transport support', 'ទទួលបានការឧបត្ថម្ភលើការធ្វើដំណើរ?/Receive transport support?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Transport support', $yesornos , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Free days a week', 'មានថ្ងៃឈប់សំរាកក្នុងមួយអាទិត្យ?/Gets free days during the week?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Free days a week', $yesornos , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>


                    <div class="form-group">
                        {!! Form::Label('How many off days', 'ប្រសិនបើមាន  តើប៉ុន្មានថ្ងៃIf yes, how many off days', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('How many off days', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        {!! Form::Label('Comments', 'ប្រសិនបើសិស្សអត់មានការងារ សូមជួយសរសេរពីមូលហេតុខាងក្រោម/ If trainee does not have or want to get a job, please write comments why', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::TextArea('Comments', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                
                
                
                </div>   
            </div>
        </div>

    </div>
</div>
{!! Form::close() !!}