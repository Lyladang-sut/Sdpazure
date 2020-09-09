
<div class="widget">
    <div class="widget-heading">
        <h4 class="widget-title">Show Training Access</h4>
    </div>
    <div class="panel-body form-horizontal">
        
        <div class="row">

            <div class="col-lg-6">
                <h4>វគ្គបណ្តុះបណ្តាលដែលបានចុះឈ្មោះ/Course Accessed</h4>
                <div class="form-group">
                    {!! Form::Label('Course Topic', 'ឈ្មោះវគ្គបណ្តុះបណ្តាល/Course Name', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        @if($trainee->trainingaccess->courses)
                            {{ $trainee->trainingaccess->courses->{'Course combined'} }}
                        @endif
                    </div>
                </div>
            
                <div class="form-group">
                    {!! Form::Label('Course id (IADC)', 'លេខសំគាល់វគ្គសិក្សា/ Course id (IADC)', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        @if($trainee->trainingaccess->coursescode)
                            {{ $trainee->trainingaccess->coursescode->{'CourseCode'} }}
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Location', 'ខេត្ត / Province', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->trainingaccess->{'Location'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Batch Number', 'លេខសំគាល់ជំនាន់សិក្សា/ Batch Number', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        @if($trainee->trainingaccess->batchnumber)
                            {{ $trainee->trainingaccess->batchnumber->{'Batch Code'} }}
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Date of Enrolment_start date', 'ថ្ងៃខែឆ្នាំចាប់ផ្តើមបណ្តុះបណ្តាល/ Start Date', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->trainingaccess->{'Date of Enrolment_start date'} }} 
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Training Provider', 'អ្នកផ្តល់កាបណ្ដុះបណ្ដាល/ Institution providing training', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        @if($trainee->trainingaccess->institutionproviding)
                            {{ $trainee->trainingaccess->institutionproviding->{'Name organization_institution'} }}
                        @endif
                    </div>
                </div>

                <h4>សូមប្ដូរ ស្ថានភាព ទៅតាមស្ថានការបច្ចុប្បន្ន /Please change status according to current situation</h4>

                <div class="form-group">
                    {!! Form::Label('Status', 'ស្ថានភាព/Status', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->trainingaccess->{'Status'} }} 
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Number of Absences during course', ' អវត្តមាន/ Absences during course', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->trainingaccess->{'Number of Absences during course'} }}
                    </div>
                </div>

            </div>
        
            <div class="col-lg-6">
                <h4>ឈ្មោះសហគ្រាសដែលសិក្ខាកាមបានហាត់ការជាមួយ បើមាន/Enter the name of the enterprise for on-the-job training when available</h4>

                <div class="form-group">
                    {!! Form::Label('Found enterprise', 'តើសិស្សរកឃើញសហគ្រាសដែរឬទេ?/Did the learner find an enterprise?', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->trainingaccess->{'Found enterprise'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Enterprise', 'ឈ្មោះសហគ្រាស/ Enterprise name', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        @if($trainee->trainingaccess->enterprise)
                            {{ $trainee->trainingaccess->enterprise->{'Name of enterprise'} }}
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Enterprise Supervisor', 'ឈ្មោះអ្នកគ្រប់គ្រងសិក្ខាកាម/ Supervisor name (Enterprise)', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        @if($trainee->trainingaccess->omatintake)
                            {{ $trainee->trainingaccess->omatintake->{'Full Name'} }}
                        @endif
                    </div>
                </div>

                <hr>
                <h5 style="color:red">ផ្នែកត្រូវបំពេញ(ពេលចុងបញ្ចប់វគ្គប៉ុណ្ណោះ)/Section to be filled ONLY at the end of training</h5>
                <h4>បញ្ចប់វគ្គបណ្តុះបណ្តា/End Of Training</h4>

                <div class="form-group">
                    {!! Form::Label('End of classes date', 'ថ្ងៃខែឆ្នាំចុងក្រោយនៃវគ្គសិក្សា/ End of classes date', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->trainingaccess->{'End of classes date'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Did learner attend final skills assessment', 'ចូលរួមការតេស្តជំនាញ/Attended skills test?/ ', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->trainingaccess->{'Did learner attend final skills assessment'} }}
                    </div>
                </div>
                
                <div class="form-group">
                    {!! Form::Label('If yes, result skills assessment', 'ប្រសិន សូមជ្រើសរើសចម្លើយ/ If yes, select result ', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->trainingaccess->{'If yes, result skills assessment'} }}   
                    </div>
                </div>

                <h4>វិញ្ញាបនប័ត្រ/Certificate</h4>

                <div class="form-group">
                    {!! Form::Label('Certificate Received', 'វិញ្ញាបនប័ត្រដែលទទួលបាន/ Certificate Received', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        @if($trainee->trainingaccess->certificatereceived)
                            {{ $trainee->trainingaccess->certificatereceived->{'Combined'} }}
                        @endif
                    
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Reason for Drop-Out', 'មូលហេតុនៃការបោះបង់/Reason for Drop-Out', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->trainingaccess->{'Reason for Drop-Out'} }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}