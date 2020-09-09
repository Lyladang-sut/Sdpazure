<div class="panel-body form-horizontal">
    <h4>សូមបំពេញទិន្នន័យជាភាសាអង់គ្លេស/ Fill the information in English</h4>
    <div class="row">
        <div class="col-lg-10">

            <div class="form-group">
                {!! Form::Label('ID Form', '១. ឯកសារបញ្ជាក់ពីអត្តសញ្ញាណ/ ID Type', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($trainee->registration)
                        {{ $trainee->registration->{'ID Form'} }}
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('ID Number', ' លេខអត្តសញ្ញាណប័ណ្ណ/ ID Number', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($trainee->registration)
                        {{ $trainee->registration->{'ID Number'} }}
                    @endif
                </div>
            </div>

            <h4 class="col-lg-10">ការងារនាពេលអនាគត/ Future Employment</h4>

            <div class="form-group">
                {!! Form::Label('Target Job','២. ការងារចង់ធ្វើ/ Target Job', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($trainee->registration)
                        @if($trainee->registration->targetJob)
                            {{ $trainee->registration->targetJob->{'Combined Job'} }}
                        @endif
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('If other job, specify', ' ប្រសិនបើមានការងារផ្សេងពីជម្រើសខាងលើ​ សូមបញ្ចាក់ / If other job, specify', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($trainee->registration)
                        {{ $trainee->registration->{'If other job, specify'} }}
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Work after training','៣ តើអ្នកចង់ធ្វើការងារនៅឯណា/ Where to work after', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($trainee->registration)
                        {{ $trainee->registration->{'Work after training'} }}
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Other Province- please specify', 'ប្រសិនបើផ្សេងៗ សូមបញ្ជាក់:/ Other province, specify', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($trainee->registration)
                        {{ $trainee->registration->{'Other Province- please specify'} }}
                    @endif
                </div>
            </div>
            
            <h4>៥. តើអ្នកទទួលបានប្រាក់ចំនូលជាមធ្យមប៉ុន្មាន ក្នុងរយះពេល ៣ខែមុនចុងក្រោយនេះ/ Income</h4>

            <div class="form-group">
                {!! Form::Label('Total or monthly','សរុប​៣ខែ ឬ ប្រចាំខែ/Total or monthly', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    
                </div>
            </div>
                
            <div class="form-group">
                {!! Form::Label('Income last 3 months (month 1 Riel)', 'ប្រាក់ចំណូលក្នុង ១ខែ កន្លងទៅ/ 1 month ago', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($trainee->registration)
                        {{ (int)$trainee->registration->{'Income last 3 months (month 1 Riel)'} }}
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Income last 3 months (month 2 Riel)', 'ប្រាក់ចំណូលក្នុង ២ខែ កន្លងទៅ/ 2 months ago', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($trainee->registration)
                        {{ (int)$trainee->registration->{'Income last 3 months (month 1 Riel)'} }}
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Income last 3 months (month 3 Riel)', 'ប្រាក់ចំណូលក្នុង ៣ខែ កន្លងទៅ / 3 months ago', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($trainee->registration)
                        {{ (int)$trainee->registration->{'Income last 3 months (month 3 Riel)'} }}
                    @endif
                </div>
            </div>
                
            <div class="form-group">
                {!! Form::Label('Full Income Manual', 'ចំណូលសរុប(​៣ខែ)/Total income (3 months)', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($trainee->registration)
                        {{ (int)$trainee->registration->{'Full Income Manual'} }}
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Tips monthly', 'ជាធម្មតាក្នុងមួយខែ តើអ្នកទទួលបានធីបប៉ុន្មាន / Money for tips a month', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($trainee->registration)
                        {{ (int)$trainee->registration->{'Tips monthly'} }}
                    @endif
                </div>
            </div>

            <h4>ព័ត៌មានបន្ថែម / Other Information</h4>

            <div class="form-group">
                {!! Form::Label('Facebook','៦​​. តើអ្នកមានប្រើ ហ្វេសប៊ុក ដែរ ឫទេ?/ Has Facebook?', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($trainee->registration)
                        {{ $trainee->registration->{'Facebook'} }}
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Facebook Name', 'បើមាន សូមប្រាប់ឈ្មោះគណនី ហ្វេសប៊ុករបស់អ្នក / Facebook Account Name', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($trainee->registration)
                        {{ $trainee->registration->{'Facebook Name'} }}
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Differently Abled Person','៧. មានពិការភាព?/ Differently Abled Person?', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($trainee->registration)
                        {{ $trainee->registration->{'Differently Abled Person'} }}
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('If yes, type of disability','បាទ/ចាស បញ្ជាក់/ Yes, specify', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    @if($trainee->registration)
                        {{ $trainee->registration->{'If yes, type of disability'} }}
                    @endif
                </div>
            </div>
            
        </div>

        <div class="col-lg-2"></div>
    </div>
</div>                           
