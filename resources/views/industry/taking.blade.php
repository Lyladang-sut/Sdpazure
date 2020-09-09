@extends('app')

@section('title')

   កែប្រែ វិស័យឯកជន | EDIT PS INDUSTRY

@endsection

@section('content')

    <div class="modal fade" id="modalTraining" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-views">
            <div class="modal-content load-modal-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="gridModalLabel">OMTrainerExperience</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal tot-modal-form" data-vv-scope="training">
                        <div class="form-group required" :class = "{'has-error': errors.has('training.Start Date') }">
                            {!! Form::Label('Start Date', 'កាលបរិច្ឆេទចាប់ផ្ដើម/Start Date', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Date('Start Date', null, [ 'v-model' => 'training["Start Date"]', 'v-validate' => "'required'" ,'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group required" :class = "{'has-error': errors.has('training.Training Provider') }">
                            {!! Form::Label('Training Provider', 'អ្នកផ្ដល់ការបណ្ដុះបណ្ដាលTraining Provider', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Training Provider', $providers, null, [ 'v-model' => 'training["Training Provider"]', 'v-validate' => "'required|numeric'", 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group required" :class = "{'has-error': errors.has('training.Course') }">
                            {!! Form::Label('Course', 'វគ្គសិក្សា/Course', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Course', $courses, null, [ 'v-model' => 'training["Course"]', 'v-validate' => "'required|numeric'", 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group required" :class = "{'has-error': errors.has('training.Batch') }">
                            {!! Form::Label('Batch', 'លេខសម្គាល់/Batch', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select id="Batch" name="Batch" class="form-control" v-validate="'required'" v-model='training["Batch"]'>
                                    <option v-for="option in batches[training['Course']]" v-bind:value="option['ID']" >@{{ option['Name'] }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group required" :class = "{'has-error': errors.has('training.Status') }">
                            {!! Form::Label('Status', 'ស្ថានភាព/Status', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Status', [ 'កំពុងសិក្សា/Studying' => 'កំពុងសិក្សា/Studying', 'បោះបង់់ការសិក្សា/Dropped out' => 'បោះបង់់ការសិក្សា/Dropped out', 'រៀនចប់ហើយ/Finished' => 'រៀនចប់ហើយ/Finished' ,  'មរណភាព/Passed away' => 'មរណភាព/Passed away'], null, ['@change'=>'onChangeStatus', 'v-model' => 'training["Status"]', 'v-validate' => "'required'",'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group" v-show="training['Status'] == 'មរណភាព/Passed away'">
                            {!! Form::Label('Reason for Passed away', 'មូលហេតុនៃមរណភាព/Reason for Passed away', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Text('Reason for Passed away', null, [ 'v-model' => 'training["Reason for Drop-Out"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group" v-show="training['Status'] == 'បោះបង់់ការសិក្សា/Dropped out'">
                            {!! Form::Label('Reason for Drop-Out', 'មូលហេតុនៃការបោះបង់/Reason for Drop-Out', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Status', $reasonDropOut , null, [ 'v-model' => 'training["Reason for Drop-Out"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group" :class = "{'has-error': errors.has('training.End Date') }">
                            {!! Form::Label('End Date', 'កាលបរិច្ឆេទបញ្ចប់/End Date', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Date('End Date', null, [ 'v-model' => 'training["End Date"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="text-align: center">
                    <button type="button" class="btn btn-primary" @click="saveTraining(training.index)">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="form-horizontal clearfix">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">
                    <a href="{{ route('industry.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>វិស័យឯកជន | PS Participant List</a>
                </h3>
            </div>
            <div class="widget-body">
                <div class="wizard">
                    <div class="steps clearfix">
                        <ul role="tablist">
                            <li role="tab" class="first disabled">
                                <a href="{{ route('industry.edit.section', ['industry' => $industry->ID, 'section' => null]) }}" class="wizard-a-link">
                                    <span class="number pull-left">1.</span> 
                                    <p class="wizard-p">
                                        <span class="wizard-span">ព័ត៌មានផ្ទាល់ខ្លួន </span>
                                        <br> Personal Information
                                    </p>
                                </a>
                            </li>
                            <li role="tab" class="disabled">
                                <a href="{{ route('industry.edit.section', ['industry' => $industry->ID, 'section' => 'giving']) }}" class="wizard-a-link">
                                    <span class="number pull-left">2.</span> 
                                    <p class="wizard-p">
                                        <span class="wizard-span">ការផ្តល់វគ្គបណ្តុះបណ្តាល </span>
                                        </br>Giving Training
                                    </p>
                                </a>
                            </li>
                            <li role="tab" class="current last">
                                <a class="wizard-a-link">
                                    <span class="number pull-left">3.</span> 
                                    <p class="wizard-p">
                                        <span class="wizard-span">ការទទួលយកវគ្គបណ្តុះបណ្តាល</span>
                                        </br>Taking Hospitality Training
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane"> 
                        <div class="table-responsive">           
                            <table class="table">
                                <thead style="background: #1f364f; color: #fff">
                                    <th>កាលបរិច្ឆេទចាប់ផ្ដើម/Start Date</th>
                                    <th>អ្នកផ្ដល់ការបណ្ដុះបណ្ដាល/Training Provider</th>
                                    <th>វគ្គសិក្សា/Course</th>
                                    <th>លេខសម្គាល់/Batch</th>
                                    <th>ស្ថានភាព/Status</th>
                                    <th>កាលបរិច្ឆេទបញ្ចប់/End Date</th>
                                    <th class="pull-right"><button type="button" class="btn btn-raised btn-success btn-sm" @click="addTraining">Add</button></th>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, key) in item.trainings">
                                        <td>@{{ item["Start Date"]}}</td>
                                        <td>@{{ providers[item["Training Provider"]] }}</td>
                                        <td>@{{ courses[item["Course"]] }}</td>
                                        <td><p v-if="item['Batch']">@{{ [].concat(...Object.values(batches)).find(x => x['ID'] == item['Batch'])['Name'] }}</p></td>
                                        <td>@{{ item["Status"]}}</td>
                                        <td>@{{ item["End Date"]}}</td>
                                        <td class="pull-right">
                                            <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editTraining(item)">Edit</button>
                                            <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteTraining(item)">Delete</button>
                                        </td>
                                    </tr>
                                    <tr v-if="item.trainings.length == 0">
                                        <td colspan="10" class="text-center">There are no data</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
   

@endsection

@push('scripts')

<script type="text/javascript">
    var errors =  {};
    var app = new Vue({

        el: '#App',

        data: {
            item: {!! $industry !!},
            training: {},
            providers: {!! $providers !!},
            batches: {!! $batches !!},
            courses: {!! $courses !!},
            reasonDropExisted: '',
        },

        created() {
        //console.log([].concat(...Object.values(this.owners)).find(x => x['OM at Intake.ID'] == 55)['Full Name'])
            this.initialize();
        },

        methods: {
            
            initialize: function () {
                // this.reasonDropExisted = this.trainings[0]["Reason for Drop-Out"]
            },
        
            onChangeStatus: function() {    
                    if(this.training['Status'] == 'មរណភាព/Passed away'){
                        var dropOutReason = ['01','02','03','04','05','06','07','08','09'];
                        if(dropOutReason.includes(this.reasonDropExisted)){
                            this.training["Reason for Drop-Out"] = null
                        }else{
                            this.training["Reason for Drop-Out"] = this.reasonDropExisted
                        }
                    }else{
                        this.training["Reason for Drop-Out"] = this.reasonDropExisted
                    }
                },

            addTraining: function() {
                this.training = {}
                this.training['OM ID'] = this.item.ID
                $("#modalTraining").modal("show");
            },

            editTraining: function(item) {
                const index = this.item.trainings.indexOf(item)
                this.training = item
                this.training["index"] = index
                $("#modalTraining").modal("show");
            },

            deleteTraining: function(item) {
                var vm = this;
                
                if (confirm('Are you sure you want to delete this item?')) {
                    axios.delete('{{ route('industrytraining.index') }}/' + item.ID)
                    .then(function(response){
                        if(response.data.deleted){
                            console.log('deleted')
                            const index = vm.item.trainings.indexOf(item)
                            vm.item.trainings.splice(index, 1)
                            
                        }else{
                            console.log('Failed')
                        }
                    }).catch(function () {
                        console.log('Cached Error')
                    })
                } 
            },

            saveTraining(){
                var vm = this;
                this.$validator.validate('training.*').then((result) => {
                    if (result) {
                        if(this.training.index != undefined){
                            $('#overlay').css('display', 'block');
                            axios.put('{{ route('industrytraining.index') }}/' + vm.training.ID, vm.training)
                                .then(function(response){
                                    if(response.data.updated){
                                        $("#modalTraining").modal("hide");
                                        $('#overlay').css('display', 'none');
                                        Object.assign(vm.item.trainings[vm.training.index], response.data.data)
                                        vm.initialize();
                                    }else{
                                        console.log('Failed')
                                    }
                                }).catch((err) => {
                                    console.log('Catched Error' + err)
                                });
                        } else {
                            $('#overlay').css('display', 'block');
                            axios.post('{{ route('industrytraining.store') }}', vm.training)
                                .then(function(response){
                                    if(response.data.created){
                                        $("#modalTraining").modal("hide");
                                        $('#overlay').css('display', 'none');
                                        vm.item.trainings.unshift(response.data.data);
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