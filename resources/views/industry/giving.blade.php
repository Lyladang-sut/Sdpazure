@extends('app')

@section('title')

កែប្រែ វិស័យឯកជន | EDIT PS INDUSTRY

@endsection

@section('content')

<div class="modal fade" id="modalTrainer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-views">
		<div class="modal-content load-modal-form">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="gridModalLabel">OMTrainerExperience</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal tot-modal-form" data-vv-scope="trainer">
					<div class="form-group required" :class = "{'has-error': errors.has('trainer.Training provided') }">
						{!! Form::Label('Training provided', 'Training Provided', ['class' => 'control-label col-lg-6']) !!}
						<div class="col-lg-6">
							{!! Form::Text('Training provided', null, [ 'v-model' => 'trainer["Training provided"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer" style="text-align: center">
				<button type="button" class="btn btn-primary" @click="saveTrainer(trainer.index)">Save changes</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalExpert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-views">
		<div class="modal-content load-modal-form">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="gridModalLabel">OMTrainerExperience</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal tot-modal-form" data-vv-scope="expert">
					<div class="form-group required" :class = "{'has-error': errors.has('expert.Area expertise om') }">
						{!! Form::Label('Area expertise om', 'Area expertise om', ['class' => 'control-label col-lg-6']) !!}
						<div class="col-lg-6">
							{!! Form::Select('Area expertise om', $DimOMAreaExp, null, [ 'v-model' => 'expert["Area expertise om"]', 'v-validate' => "'required|numeric'", 'class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::Label('If other, Specify', 'If other, Specify', ['class' => 'control-label col-lg-6']) !!}
						<div class="col-lg-6">
							{!! Form::Text('If other, Specify', null, [ 'v-model' => 'expert["If other, Specify"]', 'class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::Label('Years experience', 'Years experience', ['class' => 'control-label col-lg-6']) !!}
						<div class="col-lg-6">
							{!! Form::number('Years experience', null, [ 'v-model' => 'expert["Years experience"]', 'class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group required" :class = "{'has-error': errors.has('expert.Certificate received') }">
						{!! Form::Label('Certificate received', 'Certificate received', ['class' => 'control-label col-lg-6']) !!}
						<div class="col-lg-6">
							{!! Form::Select('Certificate received', $experiences, null, [ 'v-model' => 'expert["Certificate received"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group">
						{!! Form::Label('Type Certificate related received', 'Type Certificate related received', ['class' => 'control-label col-lg-6']) !!}
						<div class="col-lg-6">
							{!! Form::text('Type Certificate related received', null, [ 'v-model' => 'expert["Type Certificate related received"]', 'class' => 'form-control']) !!}
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer" style="text-align: center">
				<button type="button" class="btn btn-primary" @click="saveExpert(expert.index)">Save changes</button>
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
				<div class="pull-right">
					<a href="{{ route('industry.delete', $industry->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</a>
					<button type="button" class="btn btn-raised btn-primary" @click="save"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
				</div>
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
						<li role="tab" class="current">
							<a class="wizard-a-link">
								<span class="number pull-left">2.</span> 
								<p class="wizard-p">
									<span class="wizard-span">ការផ្តល់វគ្គបណ្តុះបណ្តាល </span>
								</br>Giving Training
							</p>
						</a>
					</li>
					<li role="tab" class="disabled last">
						<a href="{{ route('industry.edit.section', ['industry' => $industry->ID, 'section' => 'taking']) }}" class="wizard-a-link">
							<span class="number pull-left">3.</span> 
							<p class="wizard-p">
								<span class="wizard-span">ការទទួលយកវគ្គបណ្តុះបណ្តាល</span>
							</br>Taking Hospitality Training
						</p>
					</a>
				</li>
			</ul>
		</div>
		<div class="tab-content">
			<div class="col-md-12">
				<h4>Training provided at Enterprise</h4>
				<p class="text-danger">Please enter the Intervantion Area (IA) & Delivery Channel (DC) the owner/manager is providing skill training for</p>

				<div class="form-group required" :class = "{'has-error': errors.has('items.ownermanager.IADC Training') }">
					{!! Form::Label('IADC Training', 'IADC Training', ['class' => 'control-label col-lg-6']) !!}
					<div class="col-lg-6">
						{!! Form::Select('IADC Training', $Intervention, null, [ 'v-model' => 'item.ownermanager["IADC Training"]', 'data-vv-name'=>'items.ownermanager.IADC Training', 'v-validate' => "'required'", 'required' => 'required', 'class' => 'form-control']) !!}
					</div>
				</div>

				<hr>
				<h4>បទពិសោធមុន និងចំនេះដឹង/ Previous Experience & Knowledge</h4>

				<div class="form-group required" :class = "{'has-error': errors.has('items.ownermanager.Is Assessor') }">
					{!! Form::Label('Is Assessor', 'Is Owner/Manager an Assessor?', ['class' => 'control-label col-lg-6']) !!}
					<div class="col-lg-6">
						{!! Form::Select('Is Assessor', $yes_no, null, [ 'v-model' => 'item.ownermanager["Is Assessor"]', 'data-vv-name'=>'items.ownermanager.Is Assessor', 'v-validate' => "'required'", 'required' => 'required', 'class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group required" :class = "{'has-error': errors.has('items.ownermanager.Is Assessor') }" style="padding: 15px 0">
					{!! Form::Label('Experience trainer', 'តើអ្នកធ្លាប់បានផ្តល់ការបណ្តុះបណ្តាលដល់បុគ្គលិករបស់អ្នកដោយផ្ទាល់ដែរឬទេ/ Have you ever given training to your staff?', ['class' => 'control-label col-lg-6']) !!}
					<div class="col-lg-6">
						{!! Form::Select('Experience trainer', $experiences, null, [ 'v-model' => 'item.ownermanager["Experience trainer"]',  'data-vv-name'=>'items.ownermanager.Experience trainer', 'v-validate' => "'required'", 'required' => 'required','class' => 'form-control']) !!}
					</div>
				</div>

				<hr>
				<div class="row" style="padding: 15px 0">
					<div class="col-md-4">
						<h4>វគ្គបណ្តុះបណ្តាលគ្រូបង្ហាត់/ Trainer Experience</h4>
						<p>សូមចង្អុលបង្ហាញពីជម្រើសខាងក្រោម វគ្គបណ្តុះបណ្តាលគ្រូបង្ហាត់/ Trainer Experience</p>
						<div class="table-responsive">
							<table class="table">
								<thead style="background: #1f364f; color: #fff">
									<th>Training Provided</th>
									<th><button type="button" class="btn btn-raised btn-success btn-sm pull-right" @click="addTrainer">Add</button></th>
								</thead>
								<tbody>
									<tr v-for="(item, key) in item.ownermanager.trainers">
										<td>
											@{{ item["Training provided"] }}
										</td>
										<td style="text-align: right">
											<button type="button" class="btn btn-raised btn-warning btn-sm" @click="editTrainer(item)">Edit</button>
											<button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteTrainer(item)">Delete</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-8">
						<h4>Knowledge & Expertise</h4>
						<p>សូមចង្អុលបង្ហាញពីជម្រើសខាងក្រោម តើអ្នកមានជំនាញអ្វីខ្លះ/ Enter the owner Areas of expertise</p>
						<div class="table-responsive">
							<table class="table">
								<thead style="background: #1f364f; color: #fff">
									<th>Area expertise on</th>
									<th>If other, Specify</th>
									<th>Years experience</th>
									<th>Certificate received</th>
									<th>Type Certificate related received</th>
									<th><button type="button" class="btn btn-raised btn-success btn-sm pull-right" @click="addExpert">Add</button></th>
								</thead>
								<tbody>
									<tr v-for="(item, key) in item.ownermanager.experts">
										<td>@{{ DimOMAreaExp[item["Area expertise om"]] }}</td>
										<td>@{{ item["If other, Specify"] }}</td>
										<td>@{{ item["Years experience"] }}</td>
										<td>@{{ item["Certificate received"] }}</td>
										<td>@{{ item["Type Certificate related received"] }}</td>
										<td style="text-align: right">
											<button type="button" class="btn btn-raised btn-warning btn-sm" @click="editExpert(item)">Edit</button>
											<button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteExpert(item)">Delete</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
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
            trainer: {},
                expert: {},
                    DimOMAreaExp: {!! $DimOMAreaExp !!}
                },
                
                created() {
                    this.initialize();
                },
                
                methods: {
                    
                    initialize: function () {
                        if(this.item.ownermanager == null){
                            this.item.ownermanager = {
                                'OM ID': {!! $industry->ID !!},
                                'Submitter': {!! $industry->Submitter !!},
                                'trainers': [],
                                'experts': [],
                            }
                        }
                    },
                    
                    addExpert: function() {
                        if(this.item.ownermanager.ID == undefined){
                            alert('Please create Training Provided First.');
                            return false;
                        }
                        
                        this.expert = {}
                            this.expert['OWMA ID'] = this.item.ownermanager.ID
                            $("#modalExpert").modal("show");
                        },
                        
                        editExpert: function(item) {
                            const index = this.item.ownermanager.experts.indexOf(item)
                            this.expert = item
                            this.expert["index"] = index
                            $("#modalExpert").modal("show");
                        },
                        
                        deleteExpert: function(item) {
                            const index = this.item.ownermanager.experts.indexOf(item)
                            this.item.ownermanager.experts.splice(index, 1)
                        },
                        
                        saveExpert(){
                            var vm = this;
                            this.$validator.validate('expert.*').then((result) => {
                                if (result) {
                                    if(this.expert.index != undefined){
                                        $('#overlay').css('display', 'block');
                                        axios.put('{{ route('emptrain.index') }}/' + vm.expert.ID, vm.expert)
                                        .then(function(response){
                                            if(response.data.updated){
                                                $("#modalExpert").modal("hide");
                                                $('#overlay').css('display', 'none');
                                                Object.assign(vm.item.ownermanager.experts[vm.expert.index], response.data.data)
                                                vm.initialize();
                                            }else{
                                                console.log('Failed')
                                            }
                                        }).catch((err) => {
                                            console.log('Catched Error' + err)
                                        });
                                    } else {
                                        $('#overlay').css('display', 'block');
                                        axios.post('{{ route('emptrain.store') }}', vm.expert)
                                        .then(function(response){
                                            if(response.data.created){
                                                $("#modalExpert").modal("hide");
                                                $('#overlay').css('display', 'none');
                                                vm.item.ownermanager.experts.push(response.data.data);
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
                        
                        // Trainer
                        addTrainer: function() {
                            if(this.item.ownermanager.ID == undefined){
                                alert('Please create Training Provided First.');
                                return false;
                            }
                            this.trainer = {}
                                this.trainer['OWMA id'] = this.item.ownermanager.ID
                                $("#modalTrainer").modal("show");
                            },
                            
                            editTrainer: function(item) {
                                const index = this.item.ownermanager.trainers.indexOf(item)
                                this.trainer = item
                                this.trainer["index"] = index
                                $("#modalTrainer").modal("show");
                            },
                            
                            deleteTrainer: function(item) {
                                const index = this.item.trainers.indexOf(item)
                                this.item.ownermanager.trainers.splice(index, 1)
                            },
                            
                            saveTrainer(){
                                var vm = this;
                                this.$validator.validate('trainer.*').then((result) => {
                                    if (result) {
                                        if(this.trainer.index != undefined){
                                            $('#overlay').css('display', 'block');
                                            axios.put('{{ route('omtrainer.index') }}/' + vm.trainer.ID, vm.trainer)
                                            .then(function(response){
                                                if(response.data.updated){
                                                    $("#modalTrainer").modal("hide");
                                                    $('#overlay').css('display', 'none');
                                                    Object.assign(vm.item.ownermanager.trainers[vm.trainer.index], response.data.data)
                                                    vm.initialize();
                                                }else{
                                                    console.log('Failed')
                                                }
                                            }).catch((err) => {
                                                console.log('Catched Error' + err)
                                            });
                                        } else {
                                            $('#overlay').css('display', 'block');
                                            axios.post('{{ route('omtrainer.store') }}', vm.trainer)
                                            .then(function(response){
                                                if(response.data.created){
                                                    $("#modalTrainer").modal("hide");
                                                    $('#overlay').css('display', 'none');
                                                    vm.item.ownermanager.trainers.push(response.data.data);
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
                            
                            save: function() {
                                var vm = this;
                                this.$validator.validateAll().then((result) => {
                                    if (result) {
                                        if(this.item.ownermanager.ID != undefined){
                                            $('#overlay').css('display', 'block');
                                            axios.put('{{ route('ownermanager.index') }}/' + vm.item.ownermanager.ID, vm.item.ownermanager)
                                            .then(function(response){
                                                if(response.data.updated){
                                                    $('#overlay').css('display', 'none');
                                                    vm.initialize();
                                                    vm.item.ownermanager = response.data.data
                                                }else{
                                                    console.log('Failed')
                                                }
                                            }).catch((err) => {
                                                console.log('Catched Error' + err)
                                            });
                                        } else {
                                            $('#overlay').css('display', 'block');
                                            axios.post('{{ route('ownermanager.store') }}', vm.item.ownermanager)
                                            .then(function(response){
                                                if(response.data.created){
                                                    $('#overlay').css('display', 'none');
                                                    vm.initialize();
                                                    vm.item.ownermanager = response.data.data
                                                }else{
                                                    console.log('Failed')
                                                }
                                            }).catch((err) => {
                                                console.log('Catched Error' + err)
                                            });
                                        }
                                    }
                                    
                                });
                            }
                        },
                        
                    });
                    
                    </script>
                    
                    @endpush