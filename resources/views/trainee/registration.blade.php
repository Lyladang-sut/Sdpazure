@extends('app')

@section('title')

កែប្រែព័ត៌មានសិក្ខាកាម | EDIT TRIAINEE

@endsection

@section('content')

<form class="form-horizontal wizard clearfix">
    <div class="widget">
        <div class="widget-heading">
            <h3 class="widget-title">
                <a href="{{ route('trainee.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i> ​បញ្ជីសិក្ខាកាម |​ All trainee</a>
                <div class="pull-right">
                    <a href="{{ route('trainee.show', $trainee->ID) }}" target="_blank" class="btn btn-raised btn-warning"><i class="ti-eye mr-5"></i>មើល | View</a>
                    <a href="{{ route('trainee.delete', $trainee->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</a>
                    <button type="button" class="btn btn-raised btn-success" @click="save"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
                </div>
            </h3>
        </div>
        <div class="widget-body">
            <div class="wizard">
                <div class="steps clearfix">
                    <ul role="tablist">
                        <li role="tab" class="first disabled">
                            <a href="{{ route('trainee.edit', ['trainee' => $trainee->ID]) }}" class="wizard-a-link">
                                <span class="number pull-left">1.</span> 
                                <p class="wizard-p">
                                    <span class="wizard-span">ពាក្យសុំចូលរៀន </span>
                                    <br> Application
                                </p>
                            </a>
                        </li>
                        <li role="tab" class="disabled">
                            <a href="{{ route('trainee.edit.section', ['trainee' => $trainee->ID, 'section' => 'household']) }}" class="wizard-a-link">
                                <span class="number pull-left">2.</span> 
                                <p class="wizard-p">
                                    <span class="wizard-span">គ្រួសារ </span>
                                    </br>Home Visit
                                </p>
                            </a>
                        </li>
                        <li role="tab" class="current">
                            <a class="wizard-a-link">
                                <span class="number pull-left">3.</span> 
                                <p class="wizard-p">
                                    <span class="wizard-span">ពាក្យចុះឈ្មោះចូលរៀន </span>
                                    </br>Registration
                                </p>
                            </a>
                        </li>
                        <li role="tab" class="disabled">
                            <a href="{{ route('trainee.edit.section', ['trainee' => $trainee->ID, 'section' => 'follow']) }}" class="wizard-a-link">
                                <span class="number pull-left">4.</span> 
                                <p class="wizard-p">
                                    <span class="wizard-span">ការតាមដានក្រោយវគ្គ </span>
                                    </br>Follow up
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="content clearfix">
                    <div class="panel-body">
                        <div class="col-md-12">
            
                            <div class="form-group">
                                {!! Form::Label('ID Form', '១. ឯកសារបញ្ជាក់ពីអត្តសញ្ញាណ/ ID Type', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Select('ID Form', $IdTypes, null, [ 'v-model' => 'item["ID Form"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
            
                            <div class="form-group">
                                {!! Form::Label('ID Number', ' លេខអត្តសញ្ញាណប័ណ្ណ/ ID Number', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Text('ID Number', null, [ 'v-model' => 'item["ID Number"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
            
                            <h4>ការងារនាពេលអនាគត/ Future Employment</h4>
            
                            <div class="form-group">
                                {!! Form::Label('Target Job','២. ការងារចង់ធ្វើ/ Target Job', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Select('Target Job', $dimTargetJob, null, [ 'v-model' => 'item["Target Job"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
            
                            <div class="form-group">
                                {!! Form::Label('If other job, specify', ' ប្រសិនបើមានការងារផ្សេងពីជម្រើសខាងលើ​ សូមបញ្ចាក់ / If other job, specify', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Text('If other job, specify', null, [ 'v-model' => 'item["If other job, specify"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
            
                            <div class="form-group">
                                {!! Form::Label('Work after training','៣ តើអ្នកចង់ធ្វើការងារនៅឯណា/ Where to work after', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Select('Work after training', $jobAfters , null, [ 'v-model' => 'item["Work after training"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
            
                            <div class="form-group">
                                {!! Form::Label('Other Province- please specify', 'ប្រសិនបើផ្សេងៗ សូមបញ្ជាក់:/ Other province, specify', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Text('Other Province- please specify', null, [ 'v-model' => 'item["Other Province- please specify"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            
                            <h4>៥. តើអ្នកទទួលបានប្រាក់ចំនូលជាមធ្យមប៉ុន្មាន ក្នុងរយះពេល ៣ខែមុនចុងក្រោយនេះ/ Income</h4>
            
                            <div class="form-group">
                                {!! Form::Label('Total or monthly','សរុប​៣ខែ ឬ ប្រចាំខែ/Total or monthly', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Select('Total or monthly', $totalormonthly , null, [ 'v-model' => 'item["Total or monthly"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                                
                            <div class="form-group">
                                {!! Form::Label('Income last 3 months (month 1 Riel)', 'ប្រាក់ចំណូលក្នុង ១ខែ កន្លងទៅ/ 1 month ago', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Number('Income last 3 months (month 1 Riel)', null, [ 'v-model' => 'item["Income last 3 months (month 1 Riel)"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
            
                            <div class="form-group">
                                {!! Form::Label('Income last 3 months (month 2 Riel)', 'ប្រាក់ចំណូលក្នុង ២ខែ កន្លងទៅ/ 2 months ago', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Number('Income last 3 months (month 2 Riel)', null, [ 'v-model' => 'item["Income last 3 months (month 2 Riel)"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
            
                            <div class="form-group">
                                {!! Form::Label('Income last 3 months (month 3 Riel)', 'ប្រាក់ចំណូលក្នុង ៣ខែ កន្លងទៅ / 3 months ago', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Number('Income last 3 months (month 3 Riel)', null, [ 'v-model' => 'item["Income last 3 months (month 3 Riel)"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                                
                            <div class="form-group">
                                {!! Form::Label('Full Income Manual', 'ចំណូលសរុប(​៣ខែ)/Total income (3 months)', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Number('Full Income Manual', null, [ 'v-model' => 'item["Full Income Manual"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
            
                            <div class="form-group">
                                {!! Form::Label('Tips monthly', 'ជាធម្មតាក្នុងមួយខែ តើអ្នកទទួលបានធីបប៉ុន្មាន / Money for tips a month', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Number('Tips monthly', null, [ 'v-model' => 'item["Tips monthly"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
            
                            <h4>ព័ត៌មានបន្ថែម / Other Information</h4>
            
                            <div class="form-group">
                                {!! Form::Label('Facebook','៦​​. តើអ្នកមានប្រើ ហ្វេសប៊ុក ដែរ ឫទេ?/ Has Facebook?', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Select('Facebook', $yesornos , null, [ 'v-model' => 'item["Facebook"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
            
                            <div class="form-group">
                                {!! Form::Label('Facebook Name', 'បើមាន សូមប្រាប់ឈ្មោះគណនី ហ្វេសប៊ុករបស់អ្នក / Facebook Account Name', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Text('Facebook Name', null, [ 'v-model' => 'item["Facebook Name"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
            
                            <div class="form-group">
                                {!! Form::Label('Differently Abled Person','៧. មានពិការភាព?/ Differently Abled Person?', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Select('Differently Abled Person', $yesornos , null, [ 'v-model' => 'item["Differently Abled Person"]', 'class' => 'form-control']) !!}
                                </div> 
                            </div>
            
                            <div class="form-group">
                                {!! Form::Label('If yes, type of disability','បាទ/ចាស បញ្ជាក់/ Yes, specify', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Text('If yes, type of disability', null, [ 'v-model' => 'item["If yes, type of disability"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-heading foot">
            <h3 class="widget-title">
                <a href="{{ route('trainee.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជីសិក្ខាកាម | All trainee</a>
                <div class="pull-right">
                    <a href="{{ route('trainee.show', $trainee->ID) }}" target="_blank" class="btn btn-raised btn-warning"><i class="ti-eye mr-5"></i>មើល | View</a>
                    <a href="{{ route('trainee.delete', $trainee->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</a>
                    <button type="button" class="btn btn-raised btn-success" @click="save"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
                </div>
            </h3>
        </div>
    </div>
</form>

@endsection

@push('scripts')

<script type="text/javascript">
    var app = new Vue({
        el: '#App',
        data: {
            item: {!! ($registration) ? $registration : "{'Application ID': $trainee->ID, 'Submitter': $trainee->Submitter}" !!},
        },

        methods: {
            save: function(){
                $('#overlay').css('display', 'block');
                axios.put('{{ route('registration.update') }}', this.item)
                    .then(function(response){
                        if(response.data.updated){
                            $('#overlay').css('display', 'none');
                        }else{
                            console.log('Failed')
                        }
                    }).catch((err) => {
                        let errors = err.response.data.errors;
                        if (errors) {
                            for (let field in errors) {
                                vm.errors.add(field, errors[field])
                            }
                        }
                    });
            }
        }
    });

</script>

@endpush