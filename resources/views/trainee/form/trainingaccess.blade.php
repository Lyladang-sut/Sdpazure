{{ Form::open(array('url' => 'foo/bar',"class"=>"form-horizontal")) }}
<div class="widget">
    <div class="widget-heading">
        <h4 class="widget-title">Training Access</h4>
    </div>
    <div class="panel-body">
        
        <div class="row">

            <div class="col-lg-6">
                <h4>វគ្គបណ្តុះបណ្តាលដែលបានចុះឈ្មោះ/Course Accessed</h4>
                <div class="form-group">
                    {!! Form::Label('Course Topic', 'ឈ្មោះវគ្គបណ្តុះបណ្តាល/Course Name', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Course Topic', $cousetopics, null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            
                <div class="form-group">
                    {!! Form::Label('Course id (IADC)', 'លេខសំគាល់វគ្គសិក្សា/ Course id (IADC)', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Course id (IADC)',[1 => 'ONE', 2 => 'TWO'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Location', 'ខេត្ត / Province', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Location',[1 => 'ONE', 2 => 'TWO'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Batch Number', 'លេខសំគាល់ជំនាន់សិក្សា/ Batch Number', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Batch Number',[1 => 'ONE', 2 => 'TWO'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Date of Enrolment_start date', 'ថ្ងៃខែឆ្នាំចាប់ផ្តើមបណ្តុះបណ្តាល/ Start Date', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Date('Date of Enrolment_start date', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Training Provider', 'អ្នកផ្តល់កាបណ្ដុះបណ្ដាល/ Institution providing training', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Training Provider',[1 => 'ONE', 2 => 'TWO'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <h4>សូមប្ដូរ ស្ថានភាព ទៅតាមស្ថានការបច្ចុប្បន្ន /Please change status according to current situation</h4>

                <div class="form-group">
                    {!! Form::Label('Status', 'ស្ថានភាព/Status', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Status', $employmentStatuses , null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Number of Absences during course', ' អវត្តមាន/ Absences during course', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Text('Number of Absences during course', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

            </div>
        
            <div class="col-lg-6">
                <h4>ឈ្មោះសហគ្រាសដែលសិក្ខាកាមបានហាត់ការជាមួយ បើមាន/Enter the name of the enterprise for on-the-job training when available</h4>

                <div class="form-group">
                    {!! Form::Label('Found enterprise', 'តើសិស្សរកឃើញសហគ្រាសដែរឬទេ?/Did the learner find an enterprise?', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Found enterprise', $yesornos , null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Enterprise', 'ឈ្មោះសហគ្រាស/ Enterprise name', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Text('Enterprise', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Enterprise Supervisor', 'ឈ្មោះអ្នកគ្រប់គ្រងសិក្ខាកាម/ Supervisor name (Enterprise)', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Text('Enterprise Supervisor', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <hr>
                <h5 style="color:red">ផ្នែកត្រូវបំពេញ(ពេលចុងបញ្ចប់វគ្គប៉ុណ្ណោះ)/Section to be filled ONLY at the end of training</h5>
                <h4>បញ្ចប់វគ្គបណ្តុះបណ្តា/End Of Training</h4>

                <div class="form-group">
                    {!! Form::Label('End of classes date', 'ថ្ងៃខែឆ្នាំចុងក្រោយនៃវគ្គសិក្សា/ End of classes date', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Date('End of classes date', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Did learner attend final skills assessment', 'ចូលរួមការតេស្តជំនាញ/Attended skills test?/ ', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Did learner attend final skills assessment', $chooses , null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                
                <div class="form-group">
                    {!! Form::Label('If yes, result skills assessment', 'ប្រសិន សូមជ្រើសរើសចម្លើយ/ If yes, select result ', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('If yes, result skills assessment', $abilities , null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <h4>វិញ្ញាបនប័ត្រ/Certificate</h4>

                <div class="form-group">
                    {!! Form::Label('Certificate Received', 'វិញ្ញាបនប័ត្រដែលទទួលបាន/ Certificate Received', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Certificate Received', $dimCertificateRecieved , null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Reason for Drop-Out', 'មូលហេតុនៃការបោះបង់/Reason for Drop-Out', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Text('Reason for Drop-Out', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}