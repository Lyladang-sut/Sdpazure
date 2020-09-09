@extends('app')

@section('title')
    CREATE TRAINEE / HOUSEHOLD
@endsection

@section('content')
    {!! Form::open(['route' => 'trainee.store', 'class' => 'form-horizontal clearfix']) !!}
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">
                    <a href="{{ route('trainee.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i> All trainee</a>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-raised btn-success"><i class="ti-save mr-5"></i> Save</button>
                    </div>
                </h3>
            </div>
            <div class="widget-body">
                <div class="wizard">
                    <div class="steps clearfix">
                        <ul role="tablist">
                            <li role="tab" class="first disabled">
                                <a class="wizard-a-link">
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
                                <a class="wizard-a-link">
                                    <span class="number pull-left">3.</span> 
                                    <p class="wizard-p">
                                        <span class="wizard-span">ពាក្យចុះឈ្មោះចូលរៀន </span>
                                        </br>Registration
                                    </p>
                                </a>
                            </li>
                            <li role="tab" class="disabled">
                                <a class="wizard-a-link">
                                    <span class="number pull-left">4.</span> 
                                    <p class="wizard-p">
                                        <span class="wizard-span">ការតាមដានក្រោយវគ្គ </span>
                                        </br>Follow up
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="content clearfix">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::Label('Type',' ទស្សនកិច្ចផ្ទះ # / Visit #', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Type', $visits , null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Interview Date', 'កាលបរិច្ឆេទ / Date visit', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Date('Interview Date', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Institution','អ្នកផ្តល់កាបណ្ដុះបណ្ដាល / Institution', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Institution', $institutions, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Interviewer','ឈ្មោះអ្នកសំភាសន៍/ Interviewer', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Text('Interviewer', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <h4>Questionnaire/ កម្រងសំណួរ</h4>
            
                            <div class="form-group">
                                {!! Form::Label('Q1','១. តើគ្រួសារអ្នកមានសមាជិកប៉ុន្មាននាក់/Number of household members?', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q1', $householdmembers , null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q2','២. ក្នុងរយៈពេល៧ថ្ងៃចុងក្រោយ តើមានសមាជិកគ្រួសារប៉ុន្មាននាក់ធ្វើការ /Past 7 days,  how many household members worked/ ', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q2',$workmembers, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q4','៣. តើមានម្តាយអាចអាន និងសរសេរបានទេ(ភាសាអ្វីក៏បានដែរ)/Can the female head read in any language?/', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q4',$languages, null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q5','៤. តើនៅផ្ទះមានបន្ទប់ប៉ុន្មានដែលត្រូវបានប្រើដោយសមាជិកគ្រួសារ /How many rooms in the home?', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q5', $workmembers , null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q6','៥. តើជញ្ជាំងផ្ទះធ្វើពីអ្វីខ្លះ/ Primary construction material of home walls?', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q6', $materials , null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q7','៦. តើដំបូលផ្ទះប្រក់ពីអ្វីខ្លះ/ Primary construction material of home roof?/', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q7', $roofmaterials , null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q8','៧. តើគ្រួសារនេះមានទូខោអាវ ឬទូប៉ុន្មាន/ How many wardrobes or cabinets in the home?', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q8', $workmembers , null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q9','៨. តើគ្រួសារអ្នកមានទូរទស្សន៍ ឬស៊ីឌីវិដេអូ/ ក្បាលឌីសសម្រាប់ចាក់ឌីវិឌី/ប្រដាប់ថតសម្លេងដែរឬទេ/ Own a TV or Video CD DVD player?', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q9', $cdplayers , null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q10','៩. តើគ្រួសារអ្នកមានទូរស័ព្ទដៃប៉ុន្មាន/ How many Cell Phones?', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q10', $workmembers , null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::Label('Q11','១០. តើគ្រួសារអ្នកមានម៉ូតូ គោយន្ត ឬទូកប្រើម៉ូទ័រប៉ុន្មាន/ How many motorcycles, tractor pulled -vehicle, or motor boats at home?', ['class' => 'control-label col-lg-8']) !!}
                                <div class="col-lg-4">
                                    {!! Form::Select('Q11', $workmembers , null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection

@push('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $("[id='Employment Status']").change(function(e){
                e.preventDefault();
                if($(this).val() == 1){
                    $('#employmentStatus').css('display', 'block');
                }else{
                    $('#employmentStatus').css('display', 'none');
                }
            });

            $('#Province').change(function(e){
                e.preventDefault();
                if($(this).val() != 0){
                    $("#District").empty();
                    $.getJSON("/address/province/"+ $(this).val() , function(jsonData){
                        select = '<option disabled selected>Choose</option>';
                            $.each(jsonData, function(i,data)
                            {
                                select +='<option value="'+data.District+'">'+data.District+'</option>';
                            });
                        $("#District").html(select);
                    });
                }else{
                $("#District").empty();
                $("#Commune").empty();
                $("#Village").empty();
            }
            });

            $('#District').change(function(e){
                e.preventDefault();
                $("#Commune").empty();
                $.getJSON("/address/province/"+ $('#Province').val() +"/district/" + $(this).val() , function(jsonData){
                    select = '<option disabled selected>Choose</option>';
                        $.each(jsonData, function(i,data)
                        {
                            select +='<option value="'+data.Commune+'">'+data.Commune+'</option>';
                        });
                    $("#Commune").html(select);
                });
                $("#Village").empty();
            });

            $('#Commune').change(function(e){
                e.preventDefault();
                $("#Village").empty();
                $.getJSON("/address/province/"+ $('#Province').val() +"/district/" + $('#District').val() + '/commune/' + $(this).val() , function(jsonData){
                //$.getJSON("{{ route('address.village', ['province' =>" + $('#Province').val() + " , 'district' =>" + $('#District').val() + ", 'commune' => "+ $(this).val() +"]) }}" , function(jsonData){
                    select = '<option disabled selected>Choose</option>';
                        $.each(jsonData, function(i,data)
                        {
                            select +='<option value="'+data.ID+'">'+data.Village+'</option>';
                        });
                    $("#Village").html(select);
                });
            });

        });
        $("document").ready(function() {        
        // Date Picker
        $('.input-daterange').datepicker({
            format: "d M yyyy",
            daysOfWeekHighlighted: "0",
            autoclose: true,
            todayHighlight: true
        });        
    });
    </script>
@endpush