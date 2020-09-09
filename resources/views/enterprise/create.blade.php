@extends('app') 
@push('styles')
    <style>
        .enterprise-checkBox label {
            padding-left: 0 !important;
        }
    </style>
@endpush 

@section('title') 

    Enterprise 

@endsection 

@section('content')

    <div class="widget">
        <div class="widget-heading">
            <a href="{{ route('enterprise.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជីសហគ្រាស | All Enterprise</a>
            <div class="pull-right">
                <button type="button" class="btn btn-raised btn-primary" @click="save"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
            </div>
        </div>
        <div class="widget-body">
            <form class="form-horizontal clearfix" data-vv-scope="basic">
                <div class="col-md-12"> 
                    <h4> ព័ត៌មានមូលដ្ឋាន/ Basic Information </h4>
                    <div class="form-group required" :class = "{'has-error': errors.has('basic.Name of enterprise') }">
                        {!! Form::Label('Name of enterprise', '១​.​ ឈ្មោះសហគ្រាស​/Name of enterprise', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Name of enterprise', null, [ 'v-model' => 'item["Name of enterprise"]', 'required' => 'required', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group" :class = "{'has-error': errors.has('basic.Name of enterprise kh') }">
                        {!! Form::Label('Name of enterprise kh', '២​.​ ឈ្មោះសហគ្រាស(ខ្មែរ)/Enterprise name (Khmer)', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Name of enterprise kh', null, [ 'v-model' => 'item["Name of enterprise kh"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group" :class = "{'has-error': errors.has('basic.Date of start of business') }">
                        {!! Form::Label('Date of start of business', '៣. ថ្ងៃទីខែឆ្នាំចាប់ផ្តើមអាជីវកម្ម/Date start business', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Date('Date of start of business', null, [ 'v-model' => 'item["Date of start of business"]', 'v-validate' => "''", 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group" :class = "{'has-error': errors.has('basic.Has license') }">
                        {!! Form::Label('Has license', '៤. ឯកសារចុះបញ្ជិអាជីវកម្ម/Has license?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Has license', $licenses, null, [ 'v-model' => 'item["Has license"]', 'v-validate' => "''", 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group required" :class = "{'has-error': errors.has('basic.Activity') }">
                        {!! Form::Label('Activity', '៥. ប្រភេទអាជីវកម្ម /Type of business', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Activity', $activities, null, [ 'v-model' => 'item["Activity"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group required" :class = "{'has-error': errors.has('basic.Sector') }">
                        {!! Form::Label('Sector', 'វិស័យ/Sector of the business', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Sector', $sectors, null, [ 'v-model' => 'item["Sector"]', 'required' => 'required', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <hr>
                    <h4>៦. ទីតាំង​/Location</h4>

                    <div class="form-group required" :class = "{'has-error': errors.has('basic.Province') }">
                        {!! Form::Label('Province', 'ខេត្ត / Province', ['required' => 'required', 'class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            <select id="Province" name="Province" class="form-control" v-validate="'required'" v-model='item["Province"]'>
                                <option v-for="option in provinces" v-bind:value="option['Province']" >@{{ option['Province'] }}</option>
                            </select>
                        </div>

                    </div>
            
                    <div class="form-group required" :class = "{'has-error': errors.has('basic.District') }">
                        {!! Form::Label('District', ' ស្រុក / ក្រុង / District', ['required' =>'required', 'class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            <select id="District" name="District" class="form-control" v-validate="'required'" v-model='item["District"]'>
                                <option v-for="option in districts[item['Province']]" v-bind:value="option['District']" >@{{ option['District'] }}</option>
                            </select>
                        </div>
                    </div>
            
                    <div class="form-group required" :class = "{'has-error': errors.has('basic.Commune') }">
                        {!! Form::Label('Commune', 'ឃុំ/សង្កាត់ / Commune', ['required' => 'required', 'class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            <select id="Commune" name="Commune" class="form-control" v-validate="'required'" v-model='item["Commune"]'>
                                <option v-for="option in communes[item['District']]" v-bind:value="option['Commune']" >@{{ option['Commune'] }}</option>
                            </select>
                        </div>
                    </div>
            
                    <div class="form-group required" :class = "{'has-error': errors.has('basic.Village') }">
                        {!! Form::Label('Village', 'ភូមិ / Village', [ 'class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            <select id="Village" name="Village" class="form-control" v-validate="'required'" v-model='item["Village"]'>
                                <option v-for="option in villages[item['Commune']]" v-bind:value="option['ID']" >@{{ option['Village'] }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Address', 'ផ្ទះលេខ/House number', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Address', null, [ 'v-model' => 'item["Address"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                </div>

                <div class="col-md-12">
                    <hr>
                    <h4>៧. ចំនួនបុគ្គលិក/Employment (optional)</h4>

                    <div class="form-group">
                        {!! Form::Label('Number women employees', '# ស្រីសរុប/ women employees', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Number('Number women employees', null, [ 'v-model' => 'item["Number women employees"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Number men employees', '# ប្រុសសរុប/ men employees', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Number('Number men employees', null, [ 'v-model' => 'item["Number men employees"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <hr>
                    <h4>ទំនាក់ទំនងសហគ្រាសជាមួយកម្មវិធីSDP /Enterprise Connection with SDP</h4>
                    <p class="text-danger">ក្នុងផ្នែកនេះយើងចង់ដឹងចា សហគ្រាសមានទំនាន់ទំនងដូចម៉្ដេចជាមួយ SDP /In this section we want to know how the enterprise is connected to SDP</p>
                    <div class="form-group">
                        {!! Form::Label('Enterprise involved in SDP training', '៨. តើសហគ្រាសបណ្តុះបណ្តាលជំនាញសម្រាប់កម្មវិធីSDPទេ?/ Is enterprise offering skills training in SDP?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Enterprise involved in SDP training', ['បាទ/Yes' => 'បាទ/Yes', 'ទេ/No' => 'ទេ/No'], null, ['v-model' => 'item["Enterprise involved in SDP training"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group" v-show="item['Enterprise involved in SDP training'] == 'បាទ/Yes'">
                        {!! Form::Label('If Yes, Which', 'ប្រសិនមាន សូមវាយលេខសម្គាល់/ If yes, please select the Intervention Area and Delivery Channel (IADC) the enterprise is engaged with', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('If Yes, Which', $interventions, null, ['v-model' => 'item["If Yes, Which"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Hired graduates', '៩. តើសហគ្រាសត្រូវការជួលសិក្ខាកាមដែលបានបញ្ចប់ការសិក្សាដែរឬទេ/Did enterprise hire a graduate?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Hired graduates', ['បាទ/Yes' => 'បាទ/Yes', 'ទេ/No' => 'ទេ/No'], null, ['v-model' => 'item["Hired graduates"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('RPL participant', 'តើបុគ្គលិកបានចូលរួមក្នុងការវាយតម្លៃ RPL ដែលឬទេ?/Did staff member(s) participate in RPL assessment?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('RPL participant', ['បាទ/Yes' => 'បាទ/Yes', 'ទេ/No' => 'ទេ/No'], null, ['v-model' => 'item["RPL participant"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <hr>

                    <div class="form-group required" :class = "{'has-error': errors.has('basic.Submitter') }">
                        {!! Form::Label('Submitter', 'បញ្ជូលទិន្នន័យដោយ/ Submitter', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Submitter', $submitters, null, [ 'v-model' => 'item["Submitter"]', 'v-validate' => "'required'",'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection 

@push('scripts')

<script type="text/javascript">
    var app = new Vue({

        el: '#App',

        data: {
            allEnterprices: {!! $allEnterprices !!},
            item: {},
            provinces: {!! $provinces !!},
            districts: {!! $districts !!},
            communes: {!! $communes !!},
            villages: {!! $villages !!},
        },
        
        created() {
            this.initialize()
        },

        methods: {

            initialize: function() {
                this.item.Submitter = {!! \Auth::user()->ID !!}
            },
            
            save: function() {
                var vm = this;  var nameValid = true;
                this.$validator.validate('basic.*').then((result) => {
                    if (result) {
                        for (let index = 1; index < this.allEnterprices.length; index++) {
                            if(this.allEnterprices[index]["Name of enterprise"] == (this.item["Name of enterprise"]).trimLeft().trimRight()){
                                $('#warning-modal-error-msg').html('ឈ្មោះសហគ្រាសមានរួចហេីយ​/ Enterprise name already existed!')
                                $('#warning-modal-error').modal('show');
                                nameValid = false; break;
                            }
                        }
                        if(nameValid){
                            $('#overlay').css('display', 'block');
                                axios.post('{{ route('enterprise.index') }}', this.item)
                                    .then(function(response) {
                                        if (response.data.created) {
                                            $('#overlay').css('display', 'none');
                                            window.location = '{{ route('enterprise.index') }}/' + response.data.id + '/edit';
                                        } else {
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
                })
            }
        },

    });
</script>
@endpush