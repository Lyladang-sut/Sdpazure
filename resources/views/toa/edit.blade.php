@extends('app')

@section('title')

EDIT TOA

@endsection

@section('content')

@section('content')
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-views" style="width: 45%;top:10%;background: #FFF">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="gridModalLabel">TOA Training</h4>
        </div>
        <div class="modal-content load-modal-form">
            <div class="form-horizontal tot-modal-form panel-body">
                <div class="form-group required" :class = "{'has-error': errors.has('attendee.Owner or Trainer') }">
                    {!! Form::Label('Owner or Trainer', 'Industry Participant or Trainer', ['class' => 'control-label col-lg-6 ']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Owner or Trainer', $ownerOrTrainers, null, ['data-vv-name'=>'attendee.Owner or Trainer', 'v-validate' => "'required'", 'v-model' => 'attendee["Owner or Trainer"]', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <hr class="style3">
                
                <div v-if="attendee['Owner or Trainer'] === 'Owner'">
                    <h4>If Owner, select</h4>
                    <div class="form-group">
                        {!! Form::Label('Enterprise', 'Enterprise', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Enterprise', $enterpriseOwners, null, [ 'v-model' => 'attendee["Enterprise"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('Owner name', 'Owner name', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            <select id="Owner name" name="Owner name" class="form-control" v-model='attendee["Owner"]'>
                                <option v-for="option in owners[attendee['Enterprise']]" v-bind:value="option['OM at Intake.ID']" >@{{ option['Full Name'] }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div v-else-if="attendee['Owner or Trainer'] === 'Assessor'">
                    <h4>If Assessor, select</h4>
                    <div class="form-group">
                        {!! Form::Label('Organisation', 'Organisation', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Organisation', $trainingProviders, null, [ 'v-model' => 'attendee["Organisation"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('Assessor', 'Assessor name', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            <select id="Assessor" name="Assessor" class="form-control" v-model='attendee["Assessor"]'>
                                <option v-for="option in assessors[attendee['Organisation']]" v-bind:value="option['ID']" >@{{ option['Full Name'] }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div v-else-if="attendee['Owner or Trainer'] === 'Trainer & Assessor'">
                    <h4>If Trainer & Assessor, select</h4>
                    <div class="form-group">
                        {!! Form::Label('Organisation', 'Organisation', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Organisation', $trainingProviders, null, [ 'v-model' => 'attendee["Organisation"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('Owner', 'Industry expert', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            <select id="Trainer" name="Trainer" class="form-control" v-model='attendee["Trainer"]'>
                                <option v-for="option in trainerAssessors[attendee['Organisation']]" v-bind:value="option['ID']" >@{{ option['Full Name'] }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div v-else-if="attendee['Owner or Trainer'] === 'Enterprise Assessor'">
                    <h4>If Enterprise Assessor, select</h4>
                    <div class="form-group">
                        {!! Form::Label('Enterprise', 'Enterprise', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Enterprise', $EntwithAssessors, null, [ 'v-model' => 'attendee["Enterprise"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('EntAssessor', 'EntAssessor', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            <select id="EntAssessor" name="EntAssessor" class="form-control" v-model='attendee["EntAssessor"]'>
                                <option v-for="option in EntAssessors[attendee['Enterprise']]" v-bind:value="option['Asseors.ID']" >@{{ option['Full Name'] }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <hr class="style3">
                <div class="form-group required" :class = "{'has-error': errors.has('attendee.Competent') }">
                    {!! Form::Label('Competent', 'Result ToT', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Competent', $competents, null, ['data-vv-name'=>'attendee.Competent', 'v-validate' => "'required'", 'v-model' => 'attendee["Competent"]', 'class' => 'form-control']) !!}
                    </div>
                </div>
                
                <div class="panel-body text-right">
                    <button data-style="expand-left" @click="saveAttendee" type="button" class="btn btn-raised btn-success ladda-button"><span class="ladda-label">រក្សាទុក | Save</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-horizontal clearfix">
    <div class="widget">
        <div class="widget-heading">
            <a href="{{ route('toa.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជី | TOA List</a>
            <div class="pull-right">
                @if(\Auth::user()->role == 'Administrator')
                    <a href="{{ route('toa.delete', $toa->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</a>
                @endif
                <button type="submit" class="btn btn-raised btn-primary" @click="save"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
            </div>
        </div>
        <div class="widget-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        {!! Form::Label('Training Orginisation', 'Training Orginisation', [ 'class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Training Orginisation', $trainingProviders , null, [ 'v-model' => 'item["Training Orginisation"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
            
                    <div class="form-group">
                        {!! Form::Label('Full Name', 'Full Name', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Full Name', null, [ 'v-model' => 'item["Full Name"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
            
                    <div class="form-group">
                        {!! Form::Label('Intervention', 'Intervention', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Intervention', $Intervention , null, [ 'v-model' => 'item["Intervention"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
            
                    <div class="form-group">
                        {!! Form::Label('Delivery Channel', 'Delivery Channel', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Delivery Channel', $totdc , null, [ 'v-model' => 'item["Delivery Channel"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
            
                    <div class="form-group">
                        {!! Form::Label('Course Trained', 'Course Topic 1', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Course Trained', $course , null, [ 'v-model' => 'item["Course Trained"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            {!! Form::Label('Start Date', 'Start Date', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Date('Start Date', null, [ 'v-model' => 'item["Start Date"]', 'required' => 'required','class' => 'form-control']) !!}
                            </div>
                        </div> 
        
                        <div class="form-group">
                            {!! Form::Label('End Date', 'End Date', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Date('End Date', null, [ 'v-model' => 'item["End Date"]', 'required' => 'required','class' => 'form-control']) !!}
                            </div>
                        </div> 
                    </div>
                    <div class="form-group">
                        {!! Form::Label('Number of sessions', 'Number of sessions', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::text('Number of sessions', null, [ 'v-model' => 'item["Number of sessions"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    
                </div>
            
                <div class="col-lg-12">
                    <h4>Training Attendees</h4>
                    <div class="table-responsive">
                        <table class="table" style="border:1px solid #ddd">
                            <thead>
                                <tr style="background: #1f364f; color: #fff">
                                    <th>Assessor (Ent)</th>
                                    <th>Trainer</th>
                                    <th>Owner</th>
                                    <th>Assessor</th>
                                    <th style="text-align: right"><button type="button" class="btn btn-raised btn-success btn-sm" @click="addItem">Add</button></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, key) in item.attendees" :key="key" >
                                    
                                    <td v-if="item['EntAssessor'] && typeof EntAssessors[item['Enterprise']] == 'object'">
                                        @{{ [].concat(...Object.values(EntAssessors)).find(x => x['Asseors.ID'] == item['EntAssessor'])['Full Name'] }}
                                    </td>
                                    <td v-else>
                                        &nbsp;
                                    </td>

                                    <td v-if="item['Trainer'] && typeof trainerAssessors[item['Organisation']] == 'object'">
                                        @{{ [].concat(...Object.values(trainerAssessors)).find(x => x['ID'] == item['Trainer'])['Full Name'] }}
                                    </td>
                                    <td v-else>
                                        &nbsp;
                                    </td>

                                    <td v-if="item['Owner'] && typeof owners[item['Enterprise']] == 'object'">
                                        @{{ [].concat(...Object.values(owners)).find(x => x['OM at Intake.ID'] == item['Owner'])['Full Name'] }}
                                    </td>
                                    <td v-else>
                                        &nbsp;
                                    </td>

                                    <td v-if="item['Assessor'] && typeof assessors[item['Organisation']] == 'object'">
                                        @{{ [].concat(...Object.values(assessors)).find(x => x['ID'] == item['Assessor'])['Full Name'] }}
                                    </td>
                                    <td v-else>
                                        &nbsp;
                                    </td>
                                    <td style="text-align: right">
                                        <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editItem(item)">Edit</button>
                                        <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteItem(item)">Delete</button>
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

@endsection

@push('scripts')
    <script type="text/javascript">

        var app = new Vue({

            el: '#App',

            data: {
                item: {!! $toa->toJson() !!},
                attendee: {},
                editItems: false,
                enterprises: {!! $enterprises->toJson() !!},
                trainers: {!! $trainers->toJson() !!},
                owners: {!! $owners->toJson() !!},
                assessors: {!! $assessors->toJson() !!},
                trainerAssessors: {!! $trainerAssessors->toJson() !!},
                EntAssessors: {!! $EntAssessors->toJson() !!}
            },

            created() {
            //console.log([].concat(...Object.values(this.owners)).find(x => x['OM at Intake.ID'] == 55)['Full Name'])
            },

            methods: {
                
                initialize: function () {
                    
                },
                saveAttendee: function(){
                    var vm = this;
                    this.$validator.validateAll().then((result) => {
                        if(result){
                            if(!(this.editItems)){
                                this.item.attendees.push(this.attendee);
                            }
                            $("#modal").modal("hide");
                        }
                    });
                },
                addItem: function() {
                    this.attendee = {}
                    this.editItems = false
                    $("#modal").modal("show");
                },

                editItem: function(item) {
                    this.attendee = item
                    this.editItems = true
                    $("#modal").modal("show");
                },

                deleteItem: function(item) {
                    const index = this.item.attendees.indexOf(item)
                    this.item.attendees.splice(index, 1)
                },

                save: function( ){
                    $('#overlay').css('display', 'block');
                    axios.put('{{ route('toa.index') }}/' + this.item.ID, this.item)
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
            },
            
        });

    </script>
@endpush