@extends('app')

@section('title')

   កែប្រែ វិស័យឯកជន | EDIT PS INDUSTRY

@endsection

@section('content')

    <div class="form-horizontal clearfix">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">
                    <a href="{{ route('industry.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>វិស័យឯកជន | PS Participant List</a>
                    <div class="pull-right">
                    @if(\Auth::user()->role == 'Administrator')
                        <a href="{{ route('industry.delete', $industry->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</a>
                    @endif  

                        <button type="button" class="btn btn-raised btn-primary" @click="save"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
                    </div>
                </h3>
            </div>
            <div class="widget-body">
                <div class="wizard">
                    <div class="steps clearfix">
                        <ul role="tablist">
                            <li role="tab" class="first current">
                                <a class="wizard-a-link">
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
                        <form data-vv-scope="basic">    
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
                                
                                <div class="form-group required input-daterange" :class = "{'has-error': errors.has('basic.Date Of Birth') }">
                                    {!! Form::Label('Date Of Birth', 'ថ្ងៃខែឆ្នាំកំណើត/ Date Birth', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Date Of Birth', null, [ 'v-model' => 'item["Date Of Birth"]', 'required' => 'required', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                        
                                <div class="form-group required" :class = "{'has-error': errors.has('basic.Sex') }">
                                    {!! Form::Label('Sex', 'ភេទ/ Sex', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Sex', $sexes, null, [ 'v-model' => 'item["Sex"]', 'required' => 'required', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                        
                                <hr>
                                <h4>ទីលំនៅអចិន្ត្រៃយ៍ សំរាប់ទំនាក់ទំនងសាម៉ីខ្លួន/ Home location</h4>
                        
                                <div class="form-group required">
                                    {!! Form::Label('Province', 'ខេត្ត / Province', ['required' => 'required', 'class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        <select id="Province" name="Province" class="form-control" v-validate="'required'" v-model='item["Province"]'>
                                            <option v-for="option in provinces" v-bind:value="option['Province']" >@{{ option['Province'] }}</option>
                                        </select>
                                    </div>

                                </div>
                        
                                <div class="form-group required">
                                    {!! Form::Label('District', ' ស្រុក / ក្រុង / District', ['required' =>'required', 'class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        <select id="District" name="District" class="form-control" v-validate="'required'" v-model='item["District"]'>
                                            <option v-for="option in districts[item['Province']]" v-bind:value="option['District']" >@{{ option['District'] }}</option>
                                        </select>
                                    </div>
                                </div>
                        
                                <div class="form-group required">
                                    {!! Form::Label('Commune', 'ឃុំ/សង្កាត់ / Commune', ['required' => 'required', 'class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        <select id="Commune" name="Commune" class="form-control" v-validate="'required'" v-model='item["Commune"]'>
                                            <option v-for="option in communes[item['District']]" v-bind:value="option['Commune']" >@{{ option['Commune'] }}</option>
                                        </select>
                                    </div>
                                </div>
                        
                                <div class="form-group required">
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
                                <div class="form-group">
                                    <div class="control-label col-lg-6" style="max-height: 40%;">
                                        @if($image!=null)
                                        <img src="{{'data:image/png;base64,'.$image}}" class='avatar img-thumbnail' style='width:150px; height: auto;' id="imagePreview"/>
                                        @else
                                        <img src="{{\URL::to('').'/images/default.png'}}" class='avatar img-thumbnail' style='width:150px; height: auto;' id="imagePreview"/>
                                        @endif
                                        <div class="text-center">
                                            <br>
                                            <a class="btn btn-default btn-file" @click="onPickFile">
                                                <span>Browse</span>
                                            </a>
                                            <a class="btn btn-default btn-file" @click="removeFile">
                                                <span>Remove</span>
                                            </a>
                                            <input style="display: none;" type="file" ref="image" name="image" @change="onFilePicked" />
                                        </div>
                                    </div>
                                </div>
                                <h4>ព៍ត័មានបន្ថែម</h4>
                                <div class="form-group required" :class = "{'has-error': errors.has('basic.Last year of schooling') }">
                                    {!! Form::Label('Last year of Schooling', 'បញ្ជាក់កំរិតសិក្សាខ្ពស់បំផុតដែលអ្នកបានបញ្ចប់/Last grade schooling finished', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Last year of schooling', $grades, null, [ 'v-model' => 'item["Last year of schooling"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                        
                                <div class="form-group required">
                                    {!! Form::Label('Ethnic Minority', 'ជនជាតិ/ Ethnicity', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Ethnic Minority', $ethnic, null, [ 'v-model' => 'item["Ethnic Minority"]', 'required' => 'required','class' => 'form-control']) !!}
                                    </div>
                                </div>
                        
                                <div class="form-group required" v-show="item['Ethnic Minority'] == 'ជនជាតិដើមភាគតិច/Ethnic Minority'">
                                    {!! Form::Label('If yes, ethnicity', 'សូមបញ្ជាក់៖/ If Yes, ethnic group', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('If yes, ethnicity', $EthnicGroup, null, [ 'v-model' => 'item["If yes, ethnicity"]', 'required' => 'required', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                        
                                <div class="form-group required">
                                    {!! Form::Label('Employment Status', 'ស្ថានភាពការងារ/Employment Status', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Employment Status', $status, null, [ 'v-model' => 'item["Employment Status"]', 'required' => 'required', 'class' => 'form-control']) !!}
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
        </div>
    </div>

@endsection

@push('scripts')

<script type="text/javascript">
    var errors =  {};
    var app = new Vue({

        el: '#App',

        data: {
            item: {!! $industry->toJson() !!},
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

        methods: {
            
            save: function( ){
                var vm = this;
                this.$validator.validate('basic.*').then((result) => {
                    if (result) {
                        if(this.item.ID != undefined){
                            $('#overlay').css('display', 'block');
                            axios.put('{{ route('industry.index') }}/' + this.item.ID, this.item)
                                .then(function(response){
                                    console.log(response.data.datas);
                                    if(response.data.updated){
                                        $('#overlay').css('display', 'none');
                                        location.reload();
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
                })
                
            },
                onPickFile() {
                    this.$refs.image.click();
                },
    
                onFilePicked(event) {
                    const files = event.target.files || event.dataTransfer.files;

                    vm = this;
    
                    if (files && files[0]) {
                        let filename = files[0].name;
                        if (filename && filename.lastIndexOf('.') <= 0) {
                            return //return alert('Please add a valid image!')
                        }
    
                        const fileReader = new FileReader()

                        fileReader.onload = (e) => {
                            vm.item.Image = e.target.result;
                            $('#imagePreview').attr('src', fileReader.result);
                        };
                        fileReader.readAsDataURL(files[0]);
    
                        this.$emit('input', files[0])
                    }
                },
    
                removeFile() {
                    $('#imagePreview').attr('src', "{{\URL::to('').'/images/default.png'}}");
                    this.item.Image = "reset";
                }
        },
        
    });

</script>

@endpush