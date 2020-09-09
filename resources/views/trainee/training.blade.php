@extends('app')

@section('title')

កែប្រែព័ត៌មានសិក្ខាកាម | EDIT TRIAINEE

@endsection

@section('content')

<div class="modal fade" id="modalTraining" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  modal-dialog-centered" style="width: 90%; max-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">SDP Training</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form  class="row form-horizontal" data-vv-scope="training">
                    <div class="col-lg-6">
                        <h4>វគ្គបណ្តុះបណ្តាលដែលបានចុះឈ្មោះ/Course Accessed</h4>
                        <div class="form-group required" :class = "{'has-error': errors.has('training.Course Topic') }">
                            {!! Form::Label('Course Topic', 'ឈ្មោះវគ្គបណ្តុះបណ្តាល/Course Name', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select name="Course Topic" class="form-control" v-model='training["Course Topic"]' v-validate = "'required'">
                                    <option v-for="(option, key) in coursetopics" v-bind:value="key" >@{{ option }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group required" :class = "{'has-error': errors.has('training.Course id (IADC)') }">
                            {!! Form::Label('Course id (IADC)', 'លេខសំគាល់វគ្គសិក្សា/ Course id (IADC)', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select name="Course id (IADC)" class="form-control" v-model='training["Course id (IADC)"]' v-validate = "'required'">
                                    <option v-for="option in coursecodes[training['Course Topic']]" v-bind:value="option['ID']" >@{{ option['CourseCode'] }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group required" :class = "{'has-error': errors.has('training.Location') }">
                            {!! Form::Label('Location', 'ខេត្ត / Province', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select name="Location" class="form-control" v-model='training["Location"]' v-validate = "'required'">
                                    <option v-for="option in courselocations[training['Course id (IADC)']]" v-bind:value="option['Total']" >@{{ option['Location'] }}</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group required" :class = "{'has-error': errors.has('training.Batch Number') }">
                            {!! Form::Label('Batch Number', 'លេខសំគាល់ជំនាន់សិក្សា/ Batch Number', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select name="Batch Number" class="form-control" v-model='training["Batch Number"]' v-validate = "'required'">
                                    <option v-for="option in batchopens[training['Location']]" v-bind:value="option['ID']" >@{{ option['Batch Code'] }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group required" :class = "{'has-error': errors.has('training.Date of Enrolment_start date') }">
                            {!! Form::Label('Date of Enrolment_start date', 'ថ្ងៃខែឆ្នាំចាប់ផ្តើមបណ្តុះបណ្តាល/ Start Date', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Date('Date of Enrolment_start date', null, [ 'v-model' => 'training["Date of Enrolment_start date"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group required" :class = "{'has-error': errors.has('training.Training Provider') }">
                            {!! Form::Label('Training Provider', 'អ្នកផ្តល់កាបណ្ដុះបណ្ដាល/ Institution providing training', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select name="Training Provider" class="form-control" v-model='training["Training Provider"]' v-validate = "'required'">
                                    <option v-for="option in providers" v-bind:value="option['ID']" >@{{ option['Name organization_institution'] }}</option>
                                </select>
                            </div>
                        </div>

                        <div style="margin-top: 50px; background: #eee; padding: 10px">
                            <h4>សូមប្ដូរ ស្ថានភាព ទៅតាមស្ថានការបច្ចុប្បន្ន /Please change status according to current situation</h4>

                            <div class="form-group required" :class = "{'has-error': errors.has('training.Status') }">
                                {!! Form::Label('Status', 'ស្ថានភាព/Status', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Select('Status', $statuses , null, ['@change'=>'onChangeStatus','v-model' => 'training["Status"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group" v-show="training['Status'] == 'បោះបង់់ការសិក្សា/Dropped out'">
                                {!! Form::Label('Reason for Drop-Out', 'មូលហេតុនៃការបោះបង់/Reason for Drop-Out', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                {!! Form::Select('Status', $reasonDropOut , null, ['@change'=>'onChangeReason', 'v-model' => 'training["Reason for Drop-Out"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group" v-show="training['Status'] == 'បោះបង់់ការសិក្សា/Dropped out'">
                                {!! Form::Label('Detail description', 'មូលហេតុលម្អិត/Detail description', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::TextArea('Reason description', null, [ 'v-model' => 'training["Reason description"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group" v-show="training['Status'] == 'មរណភាព/Passed away'">
                                {!! Form::Label('Reason for Passed away', 'មូលហេតុនៃមរណភាព/Reason for Passed away', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6" >
                                    {!! Form::Text('Reason for Passed away', null, [ 'v-model' => 'training["Reason for Drop-Out"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            
                            <div class="form-group" v-show="training['Status'] == 'ព្យួរការសិក្សា/Suspended'">
                                {!! Form::Label('Reason Suspended', 'មូលហេតុព្យួរការសិក្សា/Reason Suspended', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6" >
                                    {!! Form::Text('Reason Suspended', null, [ 'v-model' => 'training["Reason suspended"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::Label('Number of Absences during course', ' អវត្តមាន/ Absences during course', ['class' => 'control-label col-lg-6']) !!}
                                <div class="col-lg-6">
                                    {!! Form::Text('Number of Absences during course', null, [ 'v-model' => 'training["Number of Absences during course"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <h4>ឈ្មោះសហគ្រាសដែលសិក្ខាកាមបានហាត់ការជាមួយ បើមាន/Enter the name of the enterprise for on-the-job training when available</h4>

                        <div class="form-group required" :class = "{'has-error': errors.has('training.Found enterprise') }">
                            {!! Form::Label('Found enterprise', 'តើសិស្សរកឃើញសហគ្រាសដែរឬទេ?/Did the learner find an enterprise?', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Found enterprise', $yesornos , null, [ 'v-model' => 'training["Found enterprise"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group required" :class = "{'has-error': errors.has('training.Province') }" v-show="training['Found enterprise'] == 'បាទ/Yes'">
                            {!! Form::Label('Province', 'ខេត្ត / Province', ['required' => 'required', 'class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select id="Province" name="Province" class="form-control" v-validate="'required'" v-model='training["Province"]'>
                                    <option v-for="option in provinces" v-bind:value="option['Province']" >@{{ option['Province'] }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group required"  :class = "{'has-error': errors.has('training.Enterprise') }" v-show="training['Found enterprise'] == 'បាទ/Yes'">
                            {!! Form::Label('Enterprise', 'ឈ្មោះសហគ្រាស/ Enterprise name', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select name="Enterprise" class="form-control" v-model='training["Enterprise"]' v-validate = "'required'">
                                    <option v-for="option in enterprises[training['Province']]" v-bind:value="option['ID']" >@{{ option['Name of enterprise'] }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group required" :class = "{'has-error': errors.has('training.Enterprise Supervisor') }" v-show="training['Found enterprise'] == 'បាទ/Yes'">
                            {!! Form::Label('Enterprise Supervisor', 'ឈ្មោះអ្នកគ្រប់គ្រងសិក្ខាកាម/ Supervisor name (Enterprise)', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select name="Enterprise Supervisor" class="form-control" v-model='training["Enterprise Supervisor"]' v-validate = "'required'">
                                    <option v-for="option in industries[training['Enterprise']]" v-bind:value="option['ID']" >@{{ option['Full Name'] }}</option>
                                </select>
                            </div>
                        </div>

                        <hr>
                        <h5 style="color:red">ផ្នែកត្រូវបំពេញ(ពេលចុងបញ្ចប់វគ្គប៉ុណ្ណោះ)/Section to be filled ONLY at the end of training</h5>
                        <h4>បញ្ចប់វគ្គបណ្តុះបណ្តាល/End Of Training</h4>

                        <div class="form-group">
                            {!! Form::Label('End of classes date', 'ថ្ងៃខែឆ្នាំចុងក្រោយនៃវគ្គសិក្សា/ End of classes date', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Date('End of classes date', null, [ 'v-model' => 'training["End of classes date"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Did learner attend final skills assessment', 'ចូលរួមការតេស្តជំនាញ/Attended skills test?/ ', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Did learner attend final skills assessment', $chooses , null, [ 'v-model' => 'training["Did learner attend final skills assessment"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('If yes, result skills assessment', 'ប្រសិន សូមជ្រើសរើសចម្លើយ/ If yes, select result ', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('If yes, result skills assessment', $abilities , null, [ 'v-model' => 'training["If yes, result skills assessment"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <h4>វិញ្ញាបនប័ត្រ/Certificate</h4>

                        <div class="form-group required" :class = "{'has-error': errors.has('training.Certificate Received') }">
                            {!! Form::Label('Certificate Received', 'វិញ្ញាបនប័ត្រដែលទទួលបាន/ Certificate Received', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Certificate Received', $dimCertificateRecieved , null, [ 'v-model' => 'training["Certificate Received"]', 'v-validate' => '"required"', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-primary" @click="saveTraining(training.index)">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<form class="form-horizontal clearfix">
    <div class="widget">
        <div class="widget-heading">
            <h3 class="widget-title">
                <a href="{{ route('trainee.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>  បញ្ជីសិក្ខាកាម | All Trainees</a>
            </h3>
        </div>
        <div class="widget-body">
            <div class="wizard">
                <div class="steps clearfix">
                    <ul role="tablist">
                        <li role="tab" class="first disabled">
                            <a href="{{ route('trainee.edit', ['trainee' => $trainee]) }}" class="wizard-a-link">
                                <span class="number pull-left">1.</span> 
                                <p class="wizard-p">
                                    <span class="wizard-span">ប្រវត្តិរូប </span>
                                    <br> Profile
                                </p>
                            </a>
                        </li>
                        <li role="tab" class="current">
                            <a class="wizard-a-link">
                                <span class="number pull-left">2.</span> 
                                <p class="wizard-p">
                                    <span class="wizard-span">វគ្គបណ្តុះបណ្តាល </span>
                                    </br>Training Course
                                </p>
                            </a>
                        </li>
                        <li role="tab" class="disabled">
                            <a href="{{ route('trainee.edit.section', ['trainee' => $trainee, 'section' => 'support']) }}" class="wizard-a-link">
                                <span class="number pull-left">3.</span> 
                                <p class="wizard-p">
                                    <span class="wizard-span">ការគាំទ្រក្រោយវគ្គ </span>
                                    </br>Post Training Support
                                </p>
                            </a>
                        </li>
                        @if(\Auth::user()->role == "Administrator")
                        <li role="tab" class="disabled">
                            <a href="{{ route('trainee.edit.section', ['trainee' => $trainee, 'section' => 'follow']) }}" class="wizard-a-link">
                                <span class="number pull-left">4.</span> 
                                <p class="wizard-p">
                                    <span class="wizard-span">ការតាមដានក្រោយវគ្គ </span>
                                    </br>Follow up
                                </p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="content clearfix">
                    <div class="table-responsive">
                        <table class="table">
                            <thead style="background: #1f364f; color: #fff">
                                <tr>
                                    <th colspan="4">
                                        វគ្គបណ្តុះបណ្តាល SDP/ SDP Training
                                    </th>
                                    <th colspan="4" style="border-left: 1px solid #fff; border-right: 1px solid #fff">
                                        បញ្ចប់វគ្គបណ្តុះបណ្តា/ End Of Training
                                    </th>
                                    <th colspan="2">
                                        វិញ្ញាបនប័ត្រ/ Certificate
                                    </th>
                                </tr>
                                <tr>
                                    <th>Course id (IADC)</th>
                                    <th>Batch Number</th>
                                    <th width="200">Course Topic</th>
                                    <th style="border-right: 1px solid #fff">Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Attend test?</th>
                                    <th style="border-right: 1px solid #fff">Result</th>
                                    <th>Certificate Received</th>
                                    <th  style="text-align: right"><button type="button" class="btn btn-raised btn-success btn-sm" @click="addTraining">Add</button></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, key) in trainings" :key="key">
                                    <td v-if="item['Course id (IADC)'] && typeof coursecodes[item['Course Topic']] == 'object'">
                                        @{{ [].concat(...Object.values(coursecodes)).find(x => x['ID'] == item['Course id (IADC)'])['CourseCode'] }}
                                    </td>
                                    <td v-else>
                                        &nbsp;
                                    </td>
                                    <td v-if="item['Course id (IADC)'] && item['Location'] && item['Batch Number'] && typeof batchopens[item['Location']] == 'object'">
                                        {{--  @{{ [].concat(...Object.values(batchopens)).find(x => x['Batch No'] == item['Batch Number'])['Batch Code'] }}  --}}
                                    </td>
                                    <td v-else>
                                        &nbsp;
                                    </td>
                                    <td>
                                        @{{ coursetopics[item['Course Topic']] }}
                                    </td>
                                    <td  style="border-right: 1px solid #ccc">
                                        @{{ item['Date of Enrolment_start date'] }}
                                    </td>
                                    <td>
                                        @{{ item['End of classes date'] }}
                                    </td>
                                    <td>
                                        @{{ item['Status'] }}
                                    </td>
                                    <td>
                                        @{{ item['Did learner attend final skills assessment'] }}
                                    </td>
                                    <td style="border-right: 1px solid #ccc">
                                        @{{ item['If yes, result skills assessment'] }}
                                    </td>
                                    <td>
                                        @{{ item['Certificate Received'] }}
                                    </td>
                                    <td style="text-align: right">
                                        <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editTraining(item)">Edit</button>
                                        <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteTraining(item)">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')

    <script type="text/javascript">

        var app = new Vue({
            el: '#App',
            data: {
                training: {},
                provinces: {!! $provinces !!},
                trainings: {!! $trainings !!},
                coursetopics: {!! $coursetopics !!},
                coursecodes: {!! $coursecodes !!},
                courselocations: {!! $courselocations !!},
                batchopens: {!! $batchopens !!},
                providers: {!! $providers !!},
                enterprises: {!! $enterprises !!},
                industries: {!! $industries !!},
                reasonDropExisted: '',
            },

            created() {
                this.initialize();
            },
            watch:{
                'training': {
                    handler(val){
                        if(this.training['Found enterprise'] == "ទេ/No"){
                            this.training["Enterprise"] = 61 ;
                            this.training["Enterprise Supervisor"] = 144;
                            this.training["Province"] = "Stung_Treng";
                        }
                    }, deep: true
                }
            },
            methods: {

                initialize: function() {
                    this.training = {}
                    this.training["Personal ID"] = {!! $trainee !!}
                    this.reasonDropExisted = this.trainings[0]["Reason for Drop-Out"]
                },
               
                onChangeStatus: function() {
                    if(this.training['Status'] != 'បោះបង់់ការសិក្សា/Dropped out'){
                            this.training["Reason description"] = "";
                    }
                    if(this.training['Status'] == 'មរណភាព/Passed away'){
                        var dropOutReason = ['01','02','03','04','05','06','07','08','09'];
                        if(dropOutReason.includes(this.reasonDropExisted)){
                            this.training["Reason for Drop-Out"] = null
                            this.training["Reason description"] = null
                        }else{
                            this.training["Reason for Drop-Out"] = this.reasonDropExisted
                        }
                    }else{
                        this.training["Reason for Drop-Out"] = this.reasonDropExisted
                    }
                },

                onChangeReason: function() {
                        this.training["Reason description"] = "";
                },

                addTraining: function() {
                    $('#modalTraining').modal('show');
                },

                editTraining: function(item) {
                    const index = this.trainings.indexOf(item)
                    this.training = item
                    this.training["index"] = index
                    $("#modalTraining").modal("show");
                },

                deleteTraining: function(item) {
                    var vm = this;
                
                    if (confirm('Are you sure you want to delete this item?')) {
                        axios.delete('{{ route('trainingaccess.index') }}/' + item.ID)
                        .then(function(response){
                            if(response.data.deleted){
                                console.log('deleted')
                                const index = vm.trainings.indexOf(item)
                                vm.trainings.splice(index, 1)
                                
                            }else{
                                console.log('Failed')
                            }
                        }).catch(function () {
                            console.log('Cached Error')
                        })
                    } 
                },

                saveTraining: function(index){
                    var vm = this;
                    this.$validator.validate('training.*').then((result) => {
                        if (result) {
                            if(this.training.index != undefined){
                                $('#overlay').css('display', 'block');
                                axios.put('{{ route('trainingaccess.index') }}/' + vm.training.ID, vm.training)
                                    .then(function(response){
                                        if(response.data.updated){
                                            $("#modalTraining").modal("hide");
                                            $('#overlay').css('display', 'none');
                                            Object.assign(vm.trainings[vm.training.index], response.data.data)
                                            vm.initialize();
                                        }else{
                                            console.log('Failed')
                                        }
                                    }).catch((err) => {
                                        console.log('Catched Error' + err)
                                    });
                            } else {
                                $('#overlay').css('display', 'block');
                                axios.post('{{ route('trainingaccess.store') }}', vm.training)
                                    .then(function(response){
                                        if(response.data.created){
                                            $("#modalTraining").modal("hide");
                                            $('#overlay').css('display', 'none');
                                            vm.trainings.push(response.data.data);
                                            vm.initialize();
                                        }else{
                                            console.log('Failed')
                                        }
                                    }).catch((err) => {
                                        console.log('Catched Error' + err)
                                    });
                            }
                        }
                    });
                },
            },
        });

    </script>

@endpush