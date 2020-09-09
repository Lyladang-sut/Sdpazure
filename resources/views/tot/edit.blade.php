@extends('app')

@push('styles')

    <style>
        .tot-modal-form label{
            padding-left:15px !important;
        }
        .btn-group-sm>.btn, .btn-sm {
            padding: 2px 8px;
            font-size: 12px;
        }
    </style>

@endpush

@section('title')

    Training of Trainer

@endsection

@section('content')
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-views" style="width: 45%;top:10%;background: #FFF">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="gridModalLabel">TOT Training</h4>
        </div>
        <div class="modal-content load-modal-form">
            <div class="form-horizontal tot-modal-form panel-body">
                <div class="form-grouprequired" :class = "{'has-error': errors.has('attendee.Owner or Trainer') }">
                    {!! Form::Label('Owner or Trainer', 'Industry Participant or Trainer', ['class' => 'control-label col-lg-6 ']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Owner or Trainer', $owner_trainer, null, ['data-vv-name'=>'attendee.Owner or Trainer', 'v-validate' => "'required'", 'v-model' => 'attendee["Owner or Trainer"]',  'class' => 'form-control']) !!}
                    </div>
                </div>

                <hr class="style3">
                
                <div v-if="attendee['Owner or Trainer'] === 'Trainer'">
                    <h4>If trainers, select</h4>
                    <div class="form-group">
                        {!! Form::Label('Organisation', 'Organisation', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Organisation', $organisations, null, [ 'v-model' => 'attendee["Organisation"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('Trainer', 'Trainer', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            <select id="Trainer" name="Trainer" class="form-control" v-model='attendee["Trainer"]'>
                                <option v-for="option in trainers[attendee['Organisation']]" v-bind:value="option.ID" >@{{ option.Name }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div v-else-if="attendee['Owner or Trainer'] === 'Industry Expert'">
                    <h4>If industry participant, select</h4>
                    <div class="form-group">
                        {!! Form::Label('Enterprise', 'Enterprise', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Enterprise', $enterprises, null, [ 'v-model' => 'attendee["Enterprise"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('Owner', 'Industry expert', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            <select id="Owner" name="Owner" class="form-control" v-model='attendee["Owner"]'>
                                <option v-for="option in owners[attendee['Enterprise']]" v-bind:value="option['Full Name']" >@{{ option['Full Name'] }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <hr class="style3">
                <div class="form-group required" :class = "{'has-error': errors.has('attendee.Competent') }">
                    {!! Form::Label('Competent', 'Result ToT', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Competent', $result_tot, null, ['data-vv-name'=>'attendee.Competent', 'v-validate' => "'required'", 'v-model' => 'attendee["Competent"]', 'class' => 'form-control']) !!}
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
            <h3 class="widget-title">
                <a href="{{ route('tot.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជី | TOT List</a>
                <div class="pull-right">
                    @if(\Auth::user()->role == 'Administrator')
                        <a href="{{ route('tot.delete', $tot->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</a>
                    @endif
                    <button type="submit" class="btn btn-raised btn-primary" @click="save"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
                </div>
            </h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::Label('Training Orginisation', 'Training Orginisation', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Training Orginisation', $organisations, null, [ 'v-model' => 'item["Training Orginisation"]' ,'required' => 'required','class' => 'form-control']) !!}
                    </div>
                </div> 

                <div class="form-group">
                    {!! Form::Label('Full Name', 'Full Name', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        <select id="Full Name" name="Full Name" class="form-control" v-model='item["Full Name"]'>
                            <option v-for="option in trainers[item['Training Orginisation']]" v-bind:value="option.ID" >@{{ option.Name }}</option>
                        </select>
                    </div>
                </div> 

                <div class="form-group">
                    {!! Form::Label('Intervention', 'Intervention', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Intervention', $intervention, null, [ 'v-model' => 'item["Intervention"]', 'required' => 'required','class' => 'form-control']) !!}
                    </div>
                </div> 

                <div class="form-group">
                    {!! Form::Label('Delivery Channel', 'Delivery Channel', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Delivery Channel', $dc, null, [ 'v-model' => 'item["Delivery Channel"]', 'required' => 'required','class' => 'form-control']) !!}
                    </div>
                </div> 

                <div class="form-group">
                    {!! Form::Label('Course Trained', 'Course Topic 1', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Course Trained', $courses, null, [ 'v-model' => 'item["Course Trained"]', 'required' => 'required','class' => 'form-control']) !!}
                    </div>
                </div> 

                <div class="form-group">
                    {!! Form::Label('Course trained 2', 'Course Topic 2', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Course trained 2', $courses, null, [ 'v-model' => 'item["Course trained 2"]', 'required' => 'required', 'class' => 'form-control']) !!}
                    </div>
                </div> 

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

                <div class="form-group">
                    {!! Form::Label('Number of sessions', 'Number of sessions', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Text('Number of sessions', null, [ 'v-model' => 'item["Number of sessions"]' ,'required' => 'required', 'class' => 'form-control']) !!}
                    </div>
                </div>   
            </div>

            <div class="col-md-12">
                <h4>Training Attendees
                </h4><br>
                <div class="table-responsive">
                    <table class="table" style="border:1px solid #ddd">
                        <thead>
                            <tr style="background: #1f364f; color: #fff">
                                <th>Organisation</th>
                                <th>Trainer</th>
                                <th>Owner/Manager</th>
                                <th>Competent</th>
                                <th style="text-align: right"><button type="button" class="btn btn-raised btn-success btn-sm" @click="addItem">Add</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, key) in item.attendees" :key="key">
                                <td>@{{ organisations[item['Organisation']] }}</td>
                                <td>@{{ trainerss[item['Trainer']] }}</td>
                                <td>@{{ item['Owner or Trainer'] }}</td>
                                <td>@{{ item['Competent'] }}</td>
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

   
@endsection

@push('scripts')

    <script>

        var App = new Vue({

            el: '#App',
            
            data: {
                item: {!! $tot->toJson() !!},
                attendee: {},
                organisations: {!! $organisations->toJson() !!},
                trainers: {!! $trainers->toJson() !!},
                trainerss: {!! $trainerss->toJson() !!},
                enterprises: {!! $enterprises->toJson() !!},
                owners: {!! $owners !!},
            },
            
            methods : {

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
                    axios.put('{{ route('tot.index') }}/' + this.item.ID, this.item)
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