@extends('app')

@section('title')

    CREATE PS PARTICIPANT

@endsection

@section('content')

<div class="widget">
    <div class="widget-heading">
        <a href="{{ route('industry.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជីអ្នកចូលរួម | Industry Paticipants List</a>
        <div class="pull-right">
            <button type="button" class="btn btn-raised btn-primary" id='submitButton' @click="save"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
        </div>
    </div>
    <div class="widget-body">
        <div class="tab-content">  
            <form data-vv-scope="basic" class="form-horizontal clearfix">    
                <div class="col-md-6">
                    <h4>Personal Information</h4>
            
                    <div class="form-group required" :class = "{'has-error': errors.has('basic.First Name') }">
                        {!! Form::Label('First Name', '១. នាមខ្លួន/First Name', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('First Name', null, [ 'v-model' => 'item["First Name"]', 'required' => 'required', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                        </div>
                    </div>
            
                    <div class="form-group required" :class = "{'has-error': errors.has('basic.Last Name') }">
                        {!! Form::Label('Last Name', '២. នាមត្រកូល/Family Name', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Last Name', null, [ 'v-model' => 'item["Last Name"]', 'required' => 'required', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    
                    <div id="DateOfBirthGroup"  class="form-group required" :class = "{'has-error': errors.has('basic.Date Of Birth') }">
                        {!! Form::Label('Date Of Birth', 'ថ្ងៃខែឆ្នាំកំណើត/ Date Birth', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Date('Date Of Birth', null, [ 'v-model' => 'item["Date Of Birth"]', 'required' => 'required', '@change' => 'onBirthday', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                        </div>
                        <strong id="DateOfBirthMessage">អ្នកចូលរួមត្រូវមានអាយុចាប់ពី១៥ឆ្នាំ / Participant must be between 15</strong>
                    </div>
            
                    <div class="form-group required" :class = "{'has-error': errors.has('basic.Sex') }">
                        {!! Form::Label('Sex', 'ភេទ/ Sex', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Sex', $sexes, null, [ 'v-model' => 'item["Sex"]', 'required' => 'required', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                        </div>
                    </div>
            
                    <h4>៦ទីលំនៅអចិន្ត្រៃយ៍ សំរាប់ទំនាក់ទំនងសាម៉ីខ្លួន/ Home location</h4>
            
                    <div class="form-group required" :class = "{'has-error': errors.has('basic.Province') }">
                        {!! Form::Label('Province', 'ខេត្ត / Province', ['required' => 'required', 'class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            <select id="Province" name="Province" class="form-control" v-validate="'required'" v-model='item["Province"]'>
                                <option v-for="option in provinces" v-bind:value="option['Province']" >@{{ option['Province'] }}</option>
                            </select>
                        </div>

                    </div>
            
                    <div class="form-group required" :class = "{'has-error': errors.has('basic.District') }">
                        {!! Form::Label('District', ' ស្រុក/ក្រុង/District', ['required' =>'required', 'class' => 'control-label col-lg-6']) !!}
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
                        {!! Form::Label('House number', 'ផ្ទះលេខ / House Number', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('House number', null, [ 'v-model' => 'item["House number"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
            
                    <div class="form-group">
                        {!! Form::Label('Phone Number', 'លេខទូរស័ព្ទ/ Phone No', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Phone Number', null, [ 'v-model' => 'item["Phone Number"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
            
                    <div class="form-group">
                        {!! Form::Label('Email', 'អ៊ីម៉ែល/Email', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Email', null, [ 'v-model' => 'item["Email"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
            
                </div>
            
                <div class="col-md-6">
                    <h4>ព៍ត័មានបន្ថែម</h4>
                    <div class="form-group required" :class = "{'has-error': errors.has('basic.Last year of schooling') }">
                        {!! Form::Label('Last year of Schooling', 'បញ្ជាក់កំរិតសិក្សាខ្ពស់បំផុតដែលអ្នកបានបញ្ចប់/Last grade schooling finished', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Last year of schooling', $grades, null, [ 'v-model' => 'item["Last year of schooling"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                        </div>
                    </div>
            
                    <div class="form-group required" :class = "{'has-error': errors.has('basic.Ethnic Minority') }">
                        {!! Form::Label('Ethnic Minority', 'ជនជាតិ/ Ethnicity', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Ethnic Minority', $ethnic, null, [ 'v-model' => 'item["Ethnic Minority"]', 'v-validate' => "'required'",'class' => 'form-control']) !!}
                        </div>
                    </div>
            
                    <div class="form-group required" v-show="item['Ethnic Minority'] == 'ជនជាតិដើមភាគតិច/Ethnic Minority'">
                        {!! Form::Label('If yes, ethnicity', 'សូមបញ្ជាក់៖/ If Yes, ethnic group', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('If yes, ethnicity', $EthnicGroup, null, [ 'v-model' => 'item["If yes, ethnicity"]', 'required' => 'required', 'class' => 'form-control']) !!}
                        </div>
                    </div>
            
                    <div class="form-group required" :class = "{'has-error': errors.has('basic.Employment Status') }">
                        {!! Form::Label('Employment Status', 'ស្ថានភាពការងារ/Employment Status', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Employment Status', $status, null, [ 'v-model' => 'item["Employment Status"]', 'v-validate' =>  "'required'", 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group required" :class = "{'has-error': errors.has('basic.Enterprise') }">
                        {!! Form::Label('Enterprise', 'Enterprise', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Enterprise', $enterprises, null, [ 'v-model' => 'item["Enterprise"]', 'v-validate' => "'required'",'class' => 'form-control']) !!}
                        </div>
                    </div>
            
                    <div class="form-group">
                        {!! Form::Label('Position', 'តួនាទី/ការងារ/Position', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Position', null, [ 'v-model' => 'item["Position"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
            
                    <div class="form-group required" :class = "{'has-error': errors.has('basic.Differently Abled Person') }">
                        {!! Form::Label('Differently Abled Person', 'មានពិការភាព?/ Differently Abled Person?', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Select('Differently Abled Person', ['បាទ/Yes' => 'បាទ/Yes', 'ទេ/No' => 'ទេ/No'], null, [ 'v-model' => 'item["Differently Abled Person"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group required" :class = "{'has-error': errors.has('basic.Differently Abled Person') }" v-show="item['Differently Abled Person'] == 'បាទ/Yes'">
                        {!! Form::Label('If yes, type of disability', 'បាទ/ចាស បញ្ជាក់/ Yes, specify', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('If yes, type of disability', 'N/A', [ 'v-model' => 'item["If yes, type of disability"]', 'v-validate' => "item['Differently Abled Person'] == 'បាទ/Yes' ? 'required' : ''",'class' => 'form-control']) !!}
                        </div>
                    </div>

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
</div>

@endsection

@push('scripts')
<script type="text/javascript">

    var app = new Vue({

        el: '#App',

        data: {
            item: {
                'If yes, type of disability': 'Able bodied',
                'If yes, ethnicity': 27,
                'Submitter': {!! \Auth::user()->ID !!}
            },
            provinces: {!! $provinces !!},
            districts: {!! $districts !!},
            communes: {!! $communes !!},
            villages: {!! $villages !!},
        },

        watch:{
            'item': {
                handler(val){
                    if(this.item["Ethnic Minority"] == 'ខ្មែរ/Khmer'){
                        this.item["If yes, ethnicity"] = 27
                    }else if(this.item["Ethnic Minority"] == 'ផ្សេងៗ/Non-Asian'){
                        this.item["If yes, ethnicity"] = 28
                    }
                }, deep: true
            }
        },

        created() {
            this.initialize()
        },

        methods: {

            initialize: function() {
                this.item.Submitter = {!! \Auth::user()->ID !!}
            },
            onBirthday(){
                    var before = new Date(new Date().setFullYear(new Date().getFullYear() - 15)).toLocaleDateString("en-GB")
                    // var after = new Date(new Date().setFullYear(new Date().getFullYear() - 30)).toLocaleDateString("en-GB");
                    if(moment(this.item['Date Of Birth']).diff(moment(before, "DD-MM-YYYY"), 'years', true) > 0 || this.item['Date Of Birth'] == ""){
                        $('#DateOfBirthGroup').addClass('has-error');
                        $('#DateOfBirthMessage').html('អ្នកចូលរួមត្រូវមានអាយុចាប់ពី១៥ឆ្នាំ / Participant must be between 15');
                        $('#DateOfBirthMessage').css('color', 'red');
                        $('#submitButton').attr('disabled', 'disabled');
                    }else{
                        $('#DateOfBirthGroup').removeClass('has-error');
                        $('#submitButton').removeAttr('disabled');
                        $('#DateOfBirthMessage').css('color', '#256cb9');
                    }          
                },
            
            save: function( ){
                var vm = this;
                this.$validator.validate('basic.*').then((result) => {
                    if (result) {
                        $('#overlay').css('display', 'block');
                        axios.post('{{ route('industry.index') }}', this.item)
                            .then(function(response){
                                if(response.data.created){
                                    $('#overlay').css('display', 'none');
                                    window.location = '{{ route('industry.index') }}/' + response.data.id + '/edit';
                                }else{
                                    console.log('Failed')
                                }
                            }).catch((err) => {
                                let errors = err.response.data.errors;
                                $('#overlay').css('display', 'none');
                                $('#warning-modal-error-msg').html('ឈ្មោះអ្នកចូលរួមមានរួចហេីយ​/ Participant name already existed!')
                                $('#warning-modal-error').modal('show');
                                if (errors) {
                                    for (let field in errors) {
                                        vm.errors.add(field, errors[field])
                                    }
                                }
                            });
                        
                    }
                })
                
            }
        },
        
    });

</script>

@endpush