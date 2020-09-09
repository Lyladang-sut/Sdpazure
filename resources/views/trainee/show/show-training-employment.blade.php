<div class="widget">
    <div class="widget-heading">
        <h4 class="widget-title">Show Post Training Employment</h4>
    </div>
    <div class="panel-body form-horizontal">

        <div class="row">
            <div class="col-lg-6">
                
                <div class="form-group">
                    {!! Form::Label('Employment status', 'ស្ថានភាពការងារក្នុងរយះពេល/ Employment status', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        @if($trainee->trainingEmployment->employmentstatus)
                            {{ $trainee->trainingEmployment->employmentstatus->{'combined'} }}
                        @endif
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
                        @if($trainee->trainingEmployment->enterprisename)
                            {{ $trainee->trainingEmployment->enterprisename{'Name of enterprise'} }}
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Date', 'ថ្ងៃខែឆ្នាំចូលបម្រើការងារ/Date got employed', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->trainingEmployment->{'Date'} }}
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                
                <div class="form-group">
                    {!! Form::Label('If self-emp, business type', 'If self-employed, enter business type', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->trainingEmployment->{'If self-emp, business type'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Location business', 'If self employed, enter business location', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->trainingEmployment->{'Location business'} }}
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
                            {{ $trainee->trainingEmployment->{'Commission per client'} }}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('If comission, describe', 'ប្រសិនបើទទួលបានភាគរយ សូមបញ្ជាក់ចំនួន/ភាគរយ/ If yes, please enter amount or percentage received', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ $trainee->trainingEmployment->{'If comission, describe'} }}
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
                            {{ (int)$trainee->trainingEmployment->{'Salary (Riel)'} }}
                        </div>
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {!! Form::Label('Salary (USD)', 'ប្រាក់ខែ  ដុល្លា/ Monthly Income (USD)', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ (int)$trainee->trainingEmployment->{'Salary (USD)'} }}
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
                            {{ $trainee->trainingEmployment->{'Accommodation support'} }}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Food support', 'ទទួលបានការឧបត្ថម្ភលើអាហារ?/Receive food support?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ $trainee->trainingEmployment->{'Food support'} }}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Transport support', 'ទទួលបានការឧបត្ថម្ភលើការធ្វើដំណើរ?/Receive transport support?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ $trainee->trainingEmployment->{'Transport support'} }}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Free days a week', 'មានថ្ងៃឈប់សំរាកក្នុងមួយអាទិត្យ?/Gets free days during the week?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ $trainee->trainingEmployment->{'Free days a week'} }}
                        </div>
                    </div>


                    <div class="form-group">
                        {!! Form::Label('How many off days', 'ប្រសិនបើមាន  តើប៉ុន្មានថ្ងៃIf yes, how many off days', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ (int)$trainee->trainingEmployment->{'How many off days'} }}
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        {!! Form::Label('Comments', 'ប្រសិនបើសិស្សអត់មានការងារ សូមជួយសរសេរពីមូលហេតុខាងក្រោម/ If trainee does not have or want to get a job, please write comments why', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            @if(count($trainee->trainingEmployment->{'Comments'}))
                                {{ $trainee->trainingEmployment->{'Comments'} }}
                            @else
                                <p>There's no comment</p>   
                            @endif 
                        </div>
                    </div>
                
                
                
                </div>   
            </div>
        </div>

    </div>
</div>
