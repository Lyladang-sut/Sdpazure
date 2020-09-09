@extends('app')

@section('title')

កែប្រែព័ត៌មានសិក្ខាកាម | EDIT TRIAINEE

@endsection

@section('content')

<form class="form-horizontal clearfix">
    <div class="widget">
        <div class="widget-heading">
            <h3 class="widget-title">
                <a href="{{ route('trainee.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>  បញ្ជីសិក្ខាកាម | All Trainees</a>
                <div class="pull-right">
                    <a href="{{ route('trainee.show', $trainee->ID) }}" target="_blank" class="btn btn-raised btn-warning"><i class="ti-eye mr-5"></i> មើល | View</a>
                    <a href="{{ route('trainee.delete', $trainee->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប​​ | Delete</a>
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
                        <li role="tab" class="current">
                            <a class="wizard-a-link">
                                <span class="number pull-left">2.</span> 
                                <p class="wizard-p">
                                    <span class="wizard-span">គ្រួសារ </span>
                                    </br>Home Visit
                                </p>
                            </a>
                        </li>
                        <li role="tab" class="disabled">
                            <a href="{{ route('trainee.edit.section', ['trainee' => $trainee->ID, 'section' => 'registration']) }}" class="wizard-a-link">
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
                                {!! Form::Label('Type',' ទស្សនកិច្ចផ្ទះ # / Visit #', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Type', $visits , null, [ 'v-model' => 'item["Type"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Interview Date', 'កាលបរិច្ឆេទ / Date visit', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Date('Interview Date', null, [ 'v-model' => 'item["Interview Date"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Institution','អ្នកផ្តល់កាបណ្ដុះបណ្ដាល / Institution', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Institution', $institutions, null, [ 'v-model' => 'item["Institution"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Interviewer','ឈ្មោះអ្នកសំភាសន៍/ Interviewer', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Text('Interviewer', null, [ 'v-model' => 'item["Interviewer"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <h4>Questionnaire/ កម្រងសំណួរ</h4>
            
                            <div class="form-group">
                                {!! Form::Label('Q1','១. តើគ្រួសារអ្នកមានសមាជិកប៉ុន្មាននាក់/Number of household members?', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q1', $householdmembers , null, [ 'v-model' => 'item["Q1"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q2','២. ក្នុងរយៈពេល៧ថ្ងៃចុងក្រោយ តើមានសមាជិកគ្រួសារប៉ុន្មាននាក់ធ្វើការ /Past 7 days,  how many household members worked/ ', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q2',$workmembers, null, [ 'v-model' => 'item["Q2"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q4','៣. តើមានម្តាយអាចអាន និងសរសេរបានទេ(ភាសាអ្វីក៏បានដែរ)/Can the female head read in any language?/', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q4',$languages, null, [ 'v-model' => 'item["Q4"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q5','៤. តើនៅផ្ទះមានបន្ទប់ប៉ុន្មានដែលត្រូវបានប្រើដោយសមាជិកគ្រួសារ /How many rooms in the home?', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q5', $workmembers , null, [ 'v-model' => 'item["Q5"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q6','៥. តើជញ្ជាំងផ្ទះធ្វើពីអ្វីខ្លះ/ Primary construction material of home walls?', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q6', $materials , null, [ 'v-model' => 'item["Q6"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q7','៦. តើដំបូលផ្ទះប្រក់ពីអ្វីខ្លះ/ Primary construction material of home roof?/', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q7', $roofmaterials , null, [ 'v-model' => 'item["Q7"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q8','៧. តើគ្រួសារនេះមានទូខោអាវ ឬទូប៉ុន្មាន/ How many wardrobes or cabinets in the home?', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q8', $workmembers , null, [ 'v-model' => 'item["Q8"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q9','៨. តើគ្រួសារអ្នកមានទូរទស្សន៍ ឬស៊ីឌីវិដេអូ/ ក្បាលឌីសសម្រាប់ចាក់ឌីវិឌី/ប្រដាប់ថតសម្លេងដែរឬទេ/ Own a TV or Video CD DVD player?', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q9', $cdplayers , null, [ 'v-model' => 'item["Q9"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q10','៩. តើគ្រួសារអ្នកមានទូរស័ព្ទដៃប៉ុន្មាន/ How many Cell Phones?', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q10', $workmembers , null, [ 'v-model' => 'item["Q10"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q11','១០. តើគ្រួសារអ្នកមានម៉ូតូ គោយន្ត ឬទូកប្រើម៉ូទ័រប៉ុន្មាន/ How many motorcycles, tractor pulled -vehicle, or motor boats at home?', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q11', $workmembers , null, [ 'v-model' => 'item["Q11"]', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
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
            item: {!! ($household) ? $household : "{'Personal ID': $trainee->ID}" !!},
        },

        methods: {
            save: function(){
                $('#overlay').css('display', 'block');
                axios.put('{{ route('household.update') }}', this.item)
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