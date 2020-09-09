
<div class="panel-body form-horizontal">
    <div class="col-md-12">
        <h4 style="color:red">សូមបំពេញទិន្នន័យជាភាសាអង់គ្លេស</h4>
        <hr>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    {!! Form::Label('Family Name', '១. នាមត្រកូល / Family Name', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Family Name'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('First Name', '២​​. នាមខ្លួន​ / First Name', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'First Name'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Date Of Birth', '៣​​​. ថ្ងៃខែឆ្នាំកំណើត​ / Date Of Birth', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Date Of Birth'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Sex', '៤.​ ភេទ/ Sex', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Sex'} }}   
                    </div>
                </div>
            
            </div>

            <div class="col-lg-4">
                
                <div class="form-group">
                    {!! Form::Label('Family nameKH', 'នាមត្រកូល (អក្សរខ្មែរ)', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Family nameKH'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('First nameKH', 'នាមខ្លួន(អក្សរខ្មែរ)', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'First nameKH'} }}
                    </div>
                </div>
            
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="control-label col-lg-6">
                        @if($trainee->Photo !== NULL)
                            @php 
                                $image = base64_encode($trainee->image->Image);
                            @endphp
                            <img src="data:image/jpeg;base64,{{ $image }}" class='avatar img-thumbnail' style='width:150px; height: auto;'/>
                        @else 
                            <img src="{{ asset('images/default.png') }}" class='avatar img-thumbnail' style='width:150px; height: auto;'/>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-lg-6">
                <h4 style="color:red">៦. ទីលំនៅអចិន្ត្រៃយ៍ សំរាប់ទំនាក់ទំនងសាម៉ីខ្លួន / Home location</h4>
                <hr>
                <div class="form-group">
                    {!! Form::Label('Province', 'ខេត្ត / Province', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Province'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('District', ' ស្រុក / ក្រុង / District', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'District'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Commune', 'ឃុំ/សង្កាត់ / Commune', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Commune'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Village', 'ភូមិ / Village', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Village'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('House Number', 'ផ្ទះលេខ / House Number', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'House Number'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Phone No', '៧. លេខទូរស័ព្ទ / Phone No', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Phone No'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Last year of Schooling', '៨. បញ្ជាក់កំរិតសិក្សាខ្ពស់បំផុតដែលអ្នកបានបញ្ចប់/ Last grade schooling', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Last year of Schooling'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Maritial Status', '៩. ស្ថានភាពគ្រួសារ / Maritial Status', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Maritial Status'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Have Children', '១១. តើអ្នកមានកូនក្នុងបន្ទុកឬទេ / Have Children?', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Have Children'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('How many between 0 and 10', 'បើមានតើកូនប៉ុន្មាននាក់ដែល/ How many?', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'How many between 0 and 10'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Ethnic Minority', '១០. ជនជាតិ / Ethnicity', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Ethnic Minority'} }}
                    </div>
                </div>
                
                <div class="form-group">
                    {!! Form::Label('If Yes EMG', 'ប្រសិនបើពិតជាក្រុមជនជាតិភាគតិច សូមបញ្ជាក់ក្រុម / If Yes, specify ethnic minority group', ['class' => 'control-label col-lg-9']) !!}
                    <div class="col-lg-3">
                        {{ $trainee->{'If Yes EMG'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('ID Poor Card', '១២ តើគ្រួសារអ្នកមានប័ណ្ណក្រីក្រដែរទេ / ID Poor Card', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'ID Poor Card'} }}
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <h4 style="color:red">៧. សូមផ្តល់លេខទូរស័ព្ទ របស់សមាជិកគ្រួសារអ្នក យ៉ាងហោចណាស់ ២ បន្ថែមទៀត/ Contacts</h4>
                <hr>
                
                <div class="form-group">
                    {!! Form::Label('Guardian', 'ឈ្មោះអាណាព្យាបាល / Guardian', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Guardian'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Contact number 1', 'លេខទូរស័ព្ទទី​/ Contact number', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Contact number 1'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Village chief', 'ឈ្មោះប្រធានភូមិ / Village chief', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Village chief'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Contact number 2', 'លេខទូរស័ព្ទទី​២/ Contact chief', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Contact number 2'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Relationship', 'ត្រូវជា ៖ / Relationship', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Relationship'} }}
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
                        {{ $trainee->{'Employment Status'} }}
                    </div>
                </div>

                <h4 style="color:red">តើមានមូលហេតុចម្បងអ្វីខ្លះ ដែលបណ្តាលឲ្យអ្នកគ្មានការងារធ្វើ (អាចជ្រើសរើសចម្លើយបានច្រើនជាងមួយ)/ If unemployed, please tick all reasons that apply</h4>
                
                <div class="form-group">
                    {!! Form::Label('Lack of job opportunities at my residence location', 'ខ្វះឱកាសការងារនៅជិតកន្លែងរស់នៅ / Lack of job opportunities near home', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Lack of job opportunities at my residence location'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Lack of skills to get a job', 'ខ្វះជំនាញសំរាប់ធ្វើការងារ / Lack of skills to get a job', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Lack of skills to get a job'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Lack of contacts', 'មិនស្គាល់/មិនមានបណ្តាញការងារ / Lack of contacts ', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Lack of contacts'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Student_Just finished studying', 'ជាសិស្សកំពុងសិក្សា/ទើបតែរៀនចប់ / Student- just finished studying ', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Student_Just finished studying'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Disability', 'ពិការភាព/ Disability', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Disability'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Lack of employment information', 'ខ្វះព័ត៌មានពីការងារ/ Lack of employment information', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Lack of employment information'} }}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Seasonal job ended in the last 3 months', 'ការងារតាមរដូវទើបតែចប់ ៣ខែមុន/ Seasonal job ended in the last 3 months', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Seasonal job ended in the last 3 months'} }}
                    </div>
                </div>
                    
                <div class="form-group">
                    {!! Form::Label('Family_social duties', 'ជាប់កាតព្វកិច្ចថែរក្សាគ្រួសារ/កាតព្វកិច្ចសង្គម/ Family_social duties', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Family_social duties'} }}    
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Unemployment_Other', 'ប្រសិនបើផ្សេងៗ សូមបញ្ជាក់:/ If other, specify', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'Unemployment_Other'} }}
                    </div>
                </div>
                
                <div class="form-group">
                    {!! Form::Label('Employment Type', 'បើមានការងារធ្វើ បញ្ជាក់ប្រភេទការងាររបស់អ្នក/ If Employed,type?y', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        @if($trainee->employmenttype)
                            {{ $trainee->employmenttype->{'Combined'} }}
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('What was your job', 'ប្រសិនបើ អ្នកមានការងារធ្វើ តើអ្នកធ្វើការក្នុងផ្នែកអ្វី?ធ្វើការនៅឯណា/ What was your job?', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {{ $trainee->{'What was your job'} }}
                    </div>
                </div>
            
            </div>

        </div>
    </div>

</div>                           





