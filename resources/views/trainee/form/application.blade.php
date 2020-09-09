{{ Form::open(array('url' => 'foo/bar',"class"=>"form-horizontal")) }}
<div class="widget">
    <div class="widget-heading">
        <h4 class="widget-title">Application</h4>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <h4 style="color:red">សូមបំពេញទិន្នន័យជាភាសាអង់គ្លេស</h4>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::Label('Family Name', '១. នាមត្រកូល / Family Name', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Family Name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('First Name', '២​​. នាមខ្លួន​ / First Name', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('First Name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Date Of Birth', '៣​​​. ថ្ងៃខែឆ្នាំកំណើត​ / Date Of Birth', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Date('Date Of Birth', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Sex', '៤.​ ភេទ/ Sex', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Sex', $sexes , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                
                </div>

                <div class="col-lg-4">
                    
                    <div class="form-group">
                        {!! Form::Label('Family nameKH', 'នាមត្រកូល (អក្សរខ្មែរ)', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Family nameKH', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('First nameKH', 'នាមខ្លួន(អក្សរខ្មែរ)', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('First nameKH', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                
                </div>
                <div class="col-lg-4">
            
                </div>
            </div>
            
            <div class="row">
                
                <div class="col-lg-6">
                    <h4 style="color:red">៦. ទីលំនៅអចិន្ត្រៃយ៍ សំរាប់ទំនាក់ទំនងសាម៉ីខ្លួន / Home location</h4>
                    <hr>
                    <div class="form-group">
                        {!! Form::Label('Province', 'ខេត្ត / Province', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Province', $provinces, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('District', ' ស្រុក / ក្រុង / District', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('District', [], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Commune', 'ឃុំ/សង្កាត់ / Commune', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Commune', [], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Village', 'ភូមិ / Village', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Village', [], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('House Number', 'ផ្ទះលេខ / House Number', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('House Number', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Phone No', '៧. លេខទូរស័ព្ទ / Phone No', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Phone No', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Last year of Schooling', '៨. បញ្ជាក់កំរិតសិក្សាខ្ពស់បំផុតដែលអ្នកបានបញ្ចប់/ Last grade schooling', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Last year of Schooling', $educationlevels , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Maritial Status', '៩. ស្ថានភាពគ្រួសារ / Maritial Status', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Maritial Status', $maritals, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Have Children', '១១. តើអ្នកមានកូនក្នុងបន្ទុកឬទេ / Have Children?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Have Children', $childs , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('How many between 0 and 10', 'បើមានតើកូនប៉ុន្មាននាក់ដែល/ How many?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('How many between 0 and 10', $numchildrens , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Ethnic Minority', '១០. ជនជាតិ / Ethnicity', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Ethnic Minority', $ethnics, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::Label('If Yes EMG', 'ប្រសិនបើពិតជាក្រុមជនជាតិភាគតិច សូមបញ្ជាក់ក្រុម / If Yes, specify ethnic minority group', ['class' => 'control-label col-lg-9']) !!}
                        <div class="col-lg-3">
                            {!! Form::Select('If Yes EMG', $ethnicGroups, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('ID Poor Card', '១២ តើគ្រួសារអ្នកមានប័ណ្ណក្រីក្រដែរទេ / ID Poor Card', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('ID Poor Card', $poorid , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h4 style="color:red">៧. សូមផ្តល់លេខទូរស័ព្ទ របស់សមាជិកគ្រួសារអ្នក យ៉ាងហោចណាស់ ២ បន្ថែមទៀត/ Contacts</h4>
                    <hr>
                    
                    <div class="form-group">
                        {!! Form::Label('Guardian', 'ឈ្មោះអាណាព្យាបាល / Guardian', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Guardian', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Contact number 1', 'លេខទូរស័ព្ទទី​/ Contact number', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Contact number 1', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Village chief', 'ឈ្មោះប្រធានភូមិ / Village chief', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Village chief', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Contact number 2', 'លេខទូរស័ព្ទទី​២/ Contact chief', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Contact number 2', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Relationship', 'ត្រូវជា ៖ / Relationship', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Relationship', $relationships , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <h4 style="color:red">ព័ត៌មានទាក់ទងនឹងការងារ/ Employment</h4>
                    <hr>

                    <div class="form-group">
                        {!! Form::Label('Employment Status', '១៣ស្ថានភាពការងារក្នុងរយះពេល ៣ខែចុងក្រោយ/Employment Status Last 3 months', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Employment Status', $employmentStatuses, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <h4 style="color:red">តើមានមូលហេតុចម្បងអ្វីខ្លះ ដែលបណ្តាលឲ្យអ្នកគ្មានការងារធ្វើ (អាចជ្រើសរើសចម្លើយបានច្រើនជាងមួយ)/ If unemployed, please tick all reasons that apply</h4>
                    
                    <div class="form-group">
                        {!! Form::Label('Lack of job opportunities at my residence location', 'ខ្វះឱកាសការងារនៅជិតកន្លែងរស់នៅ / Lack of job opportunities near home', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            
                            {{ Form::checkbox('Lack of job opportunities at my residence location') }}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Lack of skills to get a job', 'ខ្វះជំនាញសំរាប់ធ្វើការងារ / Lack of skills to get a job', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ Form::checkbox('Lack of skills to get a job') }}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Lack of contacts', 'មិនស្គាល់/មិនមានបណ្តាញការងារ / Lack of contacts ', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ Form::checkbox('Lack of contacts') }}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Student_Just finished studying', 'ជាសិស្សកំពុងសិក្សា/ទើបតែរៀនចប់ / Student- just finished studying ', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ Form::checkbox('Student_Just finished studying') }}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Disability', 'ពិការភាព/ Disability', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ Form::checkbox('Disability') }}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Lack of employment information', 'ខ្វះព័ត៌មានពីការងារ/ Lack of employment information', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ Form::checkbox('Lack of employment information') }}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Seasonal job ended in the last 3 months', 'ការងារតាមរដូវទើបតែចប់ ៣ខែមុន/ Seasonal job ended in the last 3 months', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ Form::checkbox('Seasonal job ended in the last 3 months') }}
                        </div>
                    </div>
                        
                    <div class="form-group">
                        {!! Form::Label('Family_social duties', 'ជាប់កាតព្វកិច្ចថែរក្សាគ្រួសារ/កាតព្វកិច្ចសង្គម/ Family_social duties', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {{ Form::checkbox('Family_social duties') }}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Unemployment_Other', 'ប្រសិនបើផ្សេងៗ សូមបញ្ជាក់:/ If other, specify', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Unemployment_Other', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::Label('Employment Type', 'បើមានការងារធ្វើ បញ្ជាក់ប្រភេទការងាររបស់អ្នក/ If Employed,type?y', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Employment Type', $employmentTypes, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('What was your job', 'ប្រសិនបើ អ្នកមានការងារធ្វើ តើអ្នកធ្វើការក្នុងផ្នែកអ្វី?ធ្វើការនៅឯណា/ What was your job?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('What was your job', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                
                </div>

                <div class="row" style="margin-top:10px; margin-bottom:10px">
                    <div class="col-lg-12">
                    <h4>នៅក្នុងផ្នែកនេះ សូមបញ្ចូលព័ត៌មានអំពីវគ្គសិក្សាដែលអ្នកបានចុះឈ្មោះ/ In this section, enter information about the course learners enrolled in</h4>
                    <br>
                        <h4>វគ្គបណ្តុះបណ្តាល SDP/ SDP Training</h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#traniningaccess">
                                Add SDP Training
                            </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr style="background-color:#E6E6FA">
                                        <th>Organisation</th>
                                        <th>Trainer</th>
                                        <th>Owner/Manager</th>
                                        <th>Competent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="text-center">There's no data</td>
                                    </tr>
                                </tbody>
                            </table>

                            <h4>ផ្នែកព័ត៌មានគាំទ្រក្រោយការបណ្តុះបណ្តាល / Section for post-training information</h4>
                            <h5>សូមបំពេញនៅរាល់ពេលដែលការគាំទ្រត្រូវបានផ្តល់ជូន/ Please fill in every time support is provided</h5>
                            <h4>ការគាំទ្រការបណ្តុះបណ្តាលដែលបានចូលប្រើ/ Post-training Support Accessed </h4><br>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#posttraining">
                                Add Post Training Support Access
                            </button><br><br>

                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr style="background-color:#E6E6FA">
                                        <th>Date Support</th>
                                        <th>Type Support</th>
                                        <th>Amount</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3" class="text-center">There's no data</td>
                                    </tr>
                                </tbody>
                            </table>

                            <h5>សូមបញ្ចូលព័ត៌មាននៅពេលអ្នកជួយសិស្សទទួលបានការងារ/ Please enter information when trainees get employment </h5>
                            <h4>ការទទួលបានការគាំទ្រផ្នែកការងារ/Post- Training Employment</h4>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#trainingemployment">
                                Add Training Employment
                            </button><br><br>

                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr style="background-color:#E6E6FA">
                                        <th>Date Support</th>
                                        <th>Type Support</th>
                                        <th>Amount</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3" class="text-center">There's no data</td>
                                    </tr>
                                </tbody>
                            </table>

                    </div>
                </div>
            </div>
        </div>

    </div>                           
</div>

{!! Form::close() !!}

