@extends('app')

@section('title')
    បង្កើតសិក្ខាកាម​ | CREATE NEW TRAINEE
@endsection

@section('content')
    {!! Form::open(['route' => 'trainee.store', 'files' => true, '@submit' => 'save', 'class' => 'form-horizontal clearfix ', 'id' => 'form']) !!}
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">
                    <a href="{{ route('trainee.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជីសិក្ខាកាម |​ All trainee  </a>
                    <div class="pull-right">
                        <button type="button" class="btn btn-raised btn-primary" @click="save" id="submitButton"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
                    </div>
                </h3>
            </div>
            <div class="widget-body">
                <div class="content clearfix">
                    <fieldset id="form-horizontal-p-0" role="tabpanel" aria-labelledby="form-horizontal-h-0" class="body current" aria-hidden="false">
                        <div class="col-md-12">
                            <h4 style="color:red">សូមបំពេញទិន្នន័យជាភាសាអង់គ្លេស</h4>
                            <br>
                            <div class="row">
                                <div class="col-lg-4">

                                    <div class="form-group required" :class = "{'has-error': errors.has('trainee_type') }">
                                            {!! Form::Label('trainee_type', 'ប្រភេទសិក្ខាកាម/Trainee type', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                {!! Form::Select('trainee_type', $trainee_type , null, ['v-validate'=>"'required'", 'v-model' => 'item["trainee type"]', 'class' => 'form-control trainee_type', '@change'=>"oncheckHBD"]) !!}
                                            </div>
                                    </div>
                                </div>
                            </div>


                            <hr>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group required" :class = "{'has-error': errors.has('Family Name') }">
                                        {!! Form::Label('Family Name', '១. នាមត្រកូល / Family Name', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Text('Family Name', null, [ 'v-validate' => "'required'", 'class' => 'form-control FName']) !!}
                                        </div>
                                    </div>
                        
                                    <div class="form-group required" :class = "{'has-error': errors.has('First Name') }">
                                        {!! Form::Label('First Name', '២​​. នាមខ្លួន​ / First Name', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Text('First Name', null, [ 'v-validate' => "'required'", 'class' => 'form-control FmName']) !!}
                                        </div>
                                    </div>
                        
                                    <div class="form-group required" id="DateOfBirthGroup" :class = "{'has-error': errors.has('Date Of Birth') }">
                                        {!! Form::Label('Date Of Birth', '៣​​​. ថ្ងៃខែឆ្នាំកំណើត​ / Date Of Birth', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            <input type="date" name="Date Of Birth" id="DateOfBirth"  v-model="item['Date Of Birth']" class="form-control" @change="onBirthday"/>
                                        </div>
                                        <strong id="DateOfBirthMessage" style="display:none;">សិក្ខាកាមត្រូវមានអាយុចាប់ពី១៥ដល់៣០ឆ្នាំ / Trainee must be between 15 to 30 years old.</strong>
                                        <strong id="DateOfBirthMessagev2" style="display:none;">សិក្ខាកាមត្រូវមានអាយុចាប់ពី១៥ឆ្នាំ / Trainee must be start from 15 years old to unlimited.</strong>
                                    </div>
                        
                                    <div class="form-group required" :class = "{'has-error': errors.has('Sex') }">
                                        {!! Form::Label('Sex', '៤.​ ភេទ/ Sex', [ 'class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Select('Sex', $sexes , null, [ 'v-validate' => "'required'", 'class' => 'form-control sex']) !!}
                                        </div>
                                    </div>
                        
                                </div>
                        
                                <div class="col-lg-4">
                        
                                    <div class="form-group">
                                        {!! Form::Label('Family nameKH', 'នាមត្រកូល (អក្សរខ្មែរ)', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Text('Family nameKH', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                        
                                    <div class="form-group">
                                        {!! Form::Label('First nameKH', 'នាមខ្លួន(អក្សរខ្មែរ)', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Text('First nameKH', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                        
                                </div>
                                <div class="col-lg-4">
                                        <div class="control-label col-lg-6" style="max-height: 40%;">
                                            <img src="data:image/png;base64,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" class='avatar img-thumbnail' style='width:150px; height: auto;' id="imagePreview"/>
                                        
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
                            </div>
                        
                            <div class="row">
                            
                                <div class="col-lg-6">
                                    <h4 style="color:red">៥. ទីលំនៅអចិន្ត្រៃយ៍ សំរាប់ទំនាក់ទំនងសាម៉ីខ្លួន / Home location</h4>
                                    <hr>
                                    <div class="form-group required" :class = "{'has-error': errors.has('Province') }">
                                        {!! Form::Label('Province', 'ខេត្ត / Province', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            <select id="Province" name="Province" class="form-control" v-validate="'required'" v-model='item["Province"]'>
                                                <option v-for="option in provinces" v-bind:value="option['Province']" >@{{ option['Province'] }}</option>
                                            </select>
                                        </div>
    
                                    </div>
                            
                                    <div class="form-group required" :class = "{'has-error': errors.has('District') }">
                                        {!! Form::Label('District', ' ស្រុក / ក្រុង / District', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            <select id="District" name="District" class="form-control" v-validate="'required'" v-model='item["District"]'>
                                                <option v-for="option in districts[item['Province']]" v-bind:value="option['District']" >@{{ option['District'] }}</option>
                                            </select>
                                        </div>
                                    </div>
                            
                                    <div class="form-group required" :class = "{'has-error': errors.has('Commune') }">
                                        {!! Form::Label('Commune', 'ឃុំ/សង្កាត់ / Commune', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            <select id="Commune" name="Commune" class="form-control" v-validate="'required'" v-model='item["Commune"]'>
                                                <option v-for="option in communes[item['District']]" v-bind:value="option['Commune']" >@{{ option['Commune'] }}</option>
                                            </select>
                                        </div>
                                    </div>
                            
                                    <div class="form-group required" :class = "{'has-error': errors.has('Village') }">
                                        {!! Form::Label('Village', 'ភូមិ / Village', [ 'class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            <select id="Village" name="Village" class="form-control" v-validate="'required'" v-model='item["Village"]'>
                                                <option v-for="option in villages[item['Commune']]" v-bind:value="option['ID']" >@{{ option['Village'] }}</option>
                                            </select>
                                        </div>
                                    </div>
                        
                                    <div class="form-group">
                                        {!! Form::Label('House Number', 'ផ្ទះលេខ / House Number', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Text('House Number', null, [ 'v-model' => 'item["House Number"]', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    
                                    <div class="form-group required" :class = "{'has-error': errors.has('Phone No') }">
                                        {!! Form::Label('Phone No', '៦. លេខទូរស័ព្ទ / Phone No', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Text('Phone No', null, [ 'v-model' => 'item["Phone No"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <h4 style="color:red">៧. សូមផ្តល់លេខទូរស័ព្ទ របស់សមាជិកគ្រួសារអ្នក យ៉ាងហោចណាស់ ២ បន្ថែមទៀត/ Contacts</h4>
                                    <hr>
                        
                                    <div class="form-group">
                                        {!! Form::Label('Guardian', 'ឈ្មោះអាណាព្យាបាល / Guardian', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Text('Guardian', null, [ 'v-model' => 'item["Guardian"]', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::Label('Relationship', 'ត្រូវជា ៖ / Relationship', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Select('Relationship', $relationships , null, [ 'v-model' => 'item["Relationship"]', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                        
                                    <div class="form-group">
                                        {!! Form::Label('Contact number 1', 'លេខទូរស័ព្ទ​/ Contact number', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            <!-- {!! Form::Text('Contact number 1', null, [ 'v-model' => 'item["Contact number 1"]', 'class' => 'form-control']) !!} -->
                                            {!! Form::Number('Contact number 1', null, [ 'v-model' => 'item["Contact number 1"]', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    
                                    <hr style="border-top: 1px dotted #e6e6e6 !important;">
                        
                                    <!-- Contact 2 form -->
                                    <div class="form-group">
                                        {!! Form::Label('Guardian 2', 'ឈ្មោះអាណាព្យាបាល / Guardian', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Text('Guardian 2', null, [ 'v-model' => 'item["Guardian 2"]', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::Label('Relationship 2', 'ត្រូវជា ៖ / Relationship', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Select('Relationship 2', $relationships , null, [ 'v-model' => 'item["Relationship 2"]', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                        
                                    <div class="form-group">
                                        {!! Form::Label('Contact number 3', 'លេខទូរស័ព្ទ​/ Contact number', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            <!-- {!! Form::Text('Contact number 1', null, [ 'v-model' => 'item["Contact number 1"]', 'class' => 'form-control']) !!} -->
                                            {!! Form::Number('Contact number 3', null, [ 'v-model' => 'item["Contact number 3"]', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                        <!-- End contact form 2 -->
                                    <hr style="border-top: 1px dotted #e6e6e6 !important;">
                                        
                                    <div class="form-group">
                                        {!! Form::Label('Village chief', 'ឈ្មោះប្រធានភូមិ / Village chief', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Text('Village chief', null, [ 'v-model' => 'item["Village chief"]', 'class' => 'form-control']) !!}
                                            <!-- {!! Form::Text('Village chief', null, [ 'v-model' => 'item["Village chief"]', 'class' => 'form-control', 'onkeydown' => 'return /^[A-Za-z\s]+$/i.test(event.key)']) !!} -->
                                        </div>
                                    </div>
                        
                                    <div class="form-group">
                                        {!! Form::Label('Contact number 2', 'លេខទូរស័ព្ទ/ Contact chief', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            <!-- {!! Form::Text('Contact number 2', null, [ 'v-model' => 'item["Contact number 2"]', 'class' => 'form-control']) !!} -->
                                            {!! Form::Number('Contact number 2', null, [ 'v-model' => 'item["Contact number 2"]', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                        
                                </div>
                        
                                <div class="col-lg-6">
                                    <h4 style="color:red">Other Detials | ព័ត៌មានផ្សេងៗ</h4>
                                    <hr>
                        
                                    <div class="form-group required" :class = "{'has-error': errors.has('Last year of Schooling') }">
                                        {!! Form::Label('Last year of Schooling', '៨. បញ្ជាក់កំរិតសិក្សាខ្ពស់បំផុតដែលអ្នកបានបញ្ចប់/ Last grade schooling', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Select('Last year of Schooling', $educationlevels , null, [ 'v-model' => 'item["Last year of Schooling"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                         
                                    <div class="form-group required"  :class = "{'has-error': errors.has('Maritial Status') }">
                                        {!! Form::Label('Maritial Status', '៩. ស្ថានភាពគ្រួសារ / Maritial Status', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Select('Maritial Status', $maritals, null, [ 'v-model' => 'item["Maritial Status"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                        
                                    <div class="form-group required"  :class = "{'has-error': errors.has('Ethnic Minority') }">
                                        {!! Form::Label('Ethnic Minority', '១០. ជនជាតិ / Ethnicity', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Select('Ethnic Minority', $ethnics, null, [ 'v-model' => 'item["Ethnic Minority"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                        
                                    <div class="form-group" v-show="item['Ethnic Minority'] == 'ក្រុមជនជាតិភាគតិច/Ethnic Minority'">
                                        {!! Form::Label('If Yes EMG', 'ប្រសិនបើពិតជាក្រុមជនជាតិភាគតិច សូមបញ្ជាក់ក្រុម / If Yes, specify ethnic minority group', ['class' => 'control-label col-lg-9']) !!}
                                        <div class="col-lg-3">
                                            {!! Form::Select('If Yes EMG', $ethnicGroups, null, [ 'v-model' => 'item["If Yes EMG"]', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                        
                                    <div class="form-group required" :class = "{'has-error': errors.has('Have Children') }">
                                        {!! Form::Label('Have Children', '១១. តើអ្នកមានកូនក្នុងបន្ទុកឬទេ / Have Children?', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Select('Have Children', $childs , null, [ 'v-model' => 'item["Have Children"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                        
                                    <div class="form-group" v-show="item['Have Children'] == 'បាទ/Yes'">
                                        {!! Form::Label('How many between 0 and 10', 'បើមានតើកូនប៉ុន្មាននាក់ដែល/ How many?', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Select('How many between 0 and 10', $numchildrens , null, [ 'v-model' => 'item["How many between 0 and 10"]', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                        
                                    <div class="form-group required" :class = "{'has-error': errors.has('ID Poor Card') }">
                                        {!! Form::Label('ID Poor Card', '១២ តើគ្រួសារអ្នកមានប័ណ្ណក្រីក្រដែរទេ / ID Poor Card', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Select('ID Poor Card', $poorid , null, [ 'v-model' => 'item["ID Poor Card"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        
                            <div class="row">
                            
                                <div class="col-lg-12">
                                    <h4 style="color:red">ព័ត៌មានទាក់ទងនឹងការងារ/ Employment</h4>
                                    <hr>
                        
                                    <div class="form-group required" :class = "{'has-error': errors.has('Employment Status') }">
                                        {!! Form::Label('Employment Status', '១៣ស្ថានភាពការងារក្នុងរយះពេល ៣ខែចុងក្រោយ/Employment Status Last 3 months', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Select('Employment Status', $employmentStatuses, null, ['v-model' => 'item["Employment Status"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                        </div>
                                    </div>

                                    <div v-show="item['Employment Status'] == 1">
                        
                                        <h4 style="color:red">តើមានមូលហេតុចម្បងអ្វីខ្លះ ដែលបណ្តាលឲ្យអ្នកគ្មានការងារធ្វើ (អាចជ្រើសរើសចម្លើយបានច្រើនជាងមួយ)/ If unemployed, please tick all reasons that apply</h4>
                            
                                        <div class="form-group">
                                            {!! Form::Label('Lack of job opportunities at my residence location', 'ខ្វះឱកាសការងារនៅជិតកន្លែងរស់នៅ / Lack of job opportunities near home', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                <input type="checkbox" true-value="1" false-value="0" v-model="item['Lack of job opportunities at my residence location']" />
                                            </div>
                                        </div>
                            
                                        <div class="form-group">
                                            {!! Form::Label('Lack of skills to get a job', 'ខ្វះជំនាញសំរាប់ធ្វើការងារ / Lack of skills to get a job', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                <input type="checkbox" true-value="1" false-value="0" v-model="item['Lack of skills to get a job']" />
                                            </div>
                                        </div>
                            
                                        <div class="form-group">
                                            {!! Form::Label('Lack of contacts', 'មិនស្គាល់/មិនមានបណ្តាញការងារ / Lack of contacts ', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                <input type="checkbox" true-value="1" false-value="0" v-model="item['Lack of contacts']" />
                                            </div>
                                        </div>
                            
                                        <div class="form-group">
                                            {!! Form::Label('Student_Just finished studying', 'ជាសិស្សកំពុងសិក្សា/ទើបតែរៀនចប់ / Student- just finished studying ', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                <input type="checkbox" true-value="1" false-value="0" v-model="item['Student_Just finished studying']" />
                                            </div>
                                        </div>
                            
                                        <div class="form-group">
                                            {!! Form::Label('Disability', 'ពិការភាព/ Disability', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                <input type="checkbox" true-value="1" false-value="0" v-model="item['Disability']" />
                                            </div>
                                        </div>
                            
                                        <div class="form-group">
                                            {!! Form::Label('Lack of employment information', 'ខ្វះព័ត៌មានពីការងារ/ Lack of employment information', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                <input type="checkbox" true-value="1" false-value="0" v-model="item['Lack of employment information']" />
                                            </div>
                                        </div>
                            
                                        <div class="form-group">
                                            {!! Form::Label('Seasonal job ended in the last 3 months', 'ការងារតាមរដូវទើបតែចប់ ៣ខែមុន/ Seasonal job ended in the last 3 months', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                <input type="checkbox" true-value="1" false-value="0" v-model="item['Seasonal job ended in the last 3 months']" />
                                            </div>
                                        </div>
                            
                                        <div class="form-group">
                                            {!! Form::Label('Family_social duties', 'ជាប់កាតព្វកិច្ចថែរក្សាគ្រួសារ/កាតព្វកិច្ចសង្គម/ Family_social duties', ['class' => 'control-label col-lg-6']) !!}
                                            <div class="col-lg-6">
                                                <input type="checkbox" true-value="1" false-value="0" v-model="item['Family social duties']" />
                                            </div>
                                        </div>
                                    </div>                            
                                    <div class="form-group" v-show="item['Employment Status'] == null">
                                        {!! Form::Label('Unemployment_Other', 'ប្រសិនបើផ្សេងៗ សូមបញ្ជាក់:/ If other, specify', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Text('Unemployment_Other', null, [ 'v-model' => 'item["Unemployment_Other"]', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                        
                                    <div class="form-group" v-show="item['Employment Status'] == 2  || item['Employment Status'] == 3">
                                        {!! Form::Label('Employment Type', 'បើមានការងារធ្វើ បញ្ជាក់ប្រភេទការងាររបស់អ្នក/ If Employed,type?', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Select('Employment Type', $employmentTypes, null, [ 'v-model' => 'item["Employment Type"]', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                        
                                    <div class="form-group" v-show="item['Employment Status'] == 2 || item['Employment Status'] == 3">
                                        {!! Form::Label('What was your job', 'ប្រសិនបើ អ្នកមានការងារធ្វើ តើអ្នកធ្វើការក្នុងផ្នែកអ្វី?ធ្វើការនៅឯណា/ What was your job?', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Text('What was your job', null, [ 'v-model' => 'item["What was your job"]', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="co-md-12">
                                    <div class="form-group required" :class = "{'has-error': errors.has('Submitter') }">
                                        {!! Form::Label('Submitter', 'បញ្ជូលទិន្នន័យដោយ/ Submitter', ['class' => 'control-label col-lg-6']) !!}
                                        <div class="col-lg-6">
                                            {!! Form::Select('Submitter', $submitters, \Auth::user()->ID, [ 'v-validate' => "'required'",'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection

{{--  @push('scripts')
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
@endpush  --}}


@push('scripts')

    <script type="text/javascript">

        var app = new Vue({
            el: '#App',
            data: {
                item: {},
                provinces: {!! $provinces !!},
                districts: {!! $districts !!},
                communes: {!! $communes !!},
                villages: {!! $villages !!},
                employmentstatuses: {!! $employmentStatuses !!},
                typeSupports: {!! $dimSupportTypes !!},
                data_existed:{}
            },

            created() {
                if(this.item.household == null){
                    this.item.household = {};
                }
                if(this.item.registration == null){
                    this.item.registration = {};
                }
            },

            watch:{
                'item': {
                    handler(val){
                        if(this.item["Ethnic Minority"] == 'ខ្មែរ/Khmer'){
                            this.item["If Yes EMG"] = 27
                        }else if(this.item["Ethnic Minority"] == 'ផ្សេងៗ/Non-Asian'){
                            this.item["If Yes EMG"] = 28
                        }else{
                            this.item["If Yes EMG"] = 1
                        }
                    }, deep: true
                },
            },

            methods: {
                //Training Accessed
                addTraining: function() {
                    this.training = {};
                    $('#modalTraining').modal('show');
                },

                editTraining: function(item) {
                    const index = this.item.training_accesses.indexOf(item)
                    this.training = item
                    this.training["index"] = index
                    $("#modalTraining").modal("show");
                },

                deleteTraining: function(index) {
                    this.item.training_accesses.splice(index, 1)
                },

                saveTraining: function(index){
                    var vm = this;
                    this.$validator.validate('training.*').then((result) => {
                        if (result) {
                            if(typeof(index) != 'undefined'){
                                Object.assign(vm.item.training_accesses[vm.training.index], vm.training)
                            }else{
                                vm.item.training_accesses.push(vm.training);
                            }
                            $("#modalTraining").modal("hide");
                        }
                    })
                },

                //Support

                addSupport: function() {
                    this.support = {};
                    $('#modalSupport').modal('show');
                },

                editSupport: function(item) {
                    const index = this.item.training_supports.indexOf(item)
                    this.support = item
                    this.support["index"] = index
                    $("#modalSupport").modal("show");
                },

                deleteSupport: function(index) {
                    this.item.training_supports.splice(index, 1)
                },

                saveSupport: function(index){
                    var vm = this;
                    this.$validator.validate('support.*').then((result) => {
                        if (result) {
                            if(typeof(index) != 'undefined'){
                                Object.assign(vm.item.training_supports[vm.support.index], vm.support)
                            }else{
                                vm.item.training_supports.push(vm.support);
                            }
                            $("#modalSupport").modal("hide");
                        }
                    })
                },

                // Employment
                addEmployment: function() {
                    this.employment = {};
                    $('#modalEmployment').modal('show');
                },

                editEmployment: function(item) {
                    const index = this.item.support_employments.indexOf(item)
                    this.employment = item
                    this.employment["index"] = index
                    $("#modalEmployment").modal("show");
                },

                deleteEmployment: function(index) {
                    this.item.support_employments.splice(index, 1)
                },

                saveEmployment: function(index){
                    var vm = this;
                    this.$validator.validate('employment.*').then((result) => {
                        if (result) {
                            if(typeof(index) != 'undefined'){
                                Object.assign(vm.item.support_employments[vm.employment.index], vm.employment)
                            }else{
                                vm.item.support_employments.push(vm.employment);
                            }
                            $("#modalEmployment").modal("hide");
                        }
                    })
                },

                save: function(e){
                    var vm = this;
                    var fname = $('.FName').val();
                    var fmname = $('.FmName').val();
                    var sex = $('.sex').val();
                    this.data_existed = this.item;
                    this.data_existed['fname']= fname;
                    this.data_existed['fmname']= fmname;
                    this.data_existed['sex']= sex;
                     
                   

                    if(this.item['Date Of Birth']== undefined || this.item['Date Of Birth'] == ""){
                        $('#DateOfBirthGroup').addClass('has-error');
                        $('#DateOfBirthMessage').css('color', 'red');
                        e.preventDefault();
                    }

                    this.$validator.validateAll().then((result) => {
                        if (result) {
                            /** get validate existed data */
                            axios.post('{{ route('trainee.existeddata') }}', this.data_existed)
                            .then(function (response) {
                                dataTraineeExisted = response.data.existed_status;

                                if(dataTraineeExisted == false){
                                    document.getElementById("form").submit();
                                }else{
                                    $('#warning-modal-error-msg').html('ឈ្មោះសិក្ខាកាមមានរួចហេីយ/ Trainee name already esisted!')
                                    $('#warning-modal-error').modal('show');
                                }
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                        }
                    })

                    e.preventDefault();

                    // return false;

                     
                },
                oncheckHBD(){
                    var trainee_type = $('#trainee_type').val();
                    $('#DateOfBirthMessage').css('display', 'none');
                    $('#DateOfBirthMessagev2').css('display', 'none');
                    if(trainee_type=='Disadvantage youth (DVT and full-time)'){
                        $('#DateOfBirthMessage').css('display', 'block');
                    }else if(trainee_type=='Low-skilled worker (IHT, HCP)'){
                        $('#DateOfBirthMessagev2').css('display', 'block');
                    }else{
                        $('#DateOfBirthMessage').css('display', 'none');
                        $('#DateOfBirthMessagev2').css('display', 'none');
                    }
                },
                
                onBirthday(){
                    var trainee_type = $('#trainee_type').val();
                    // alert(trainee_type);
                    var before = new Date(new Date().setFullYear(new Date().getFullYear() - 15)).toLocaleDateString("en-GB")
                    var after = new Date(new Date().setFullYear(new Date().getFullYear() - 30)).toLocaleDateString("en-GB");
                    if( (moment(this.item['Date Of Birth']).diff(moment(before, "DD-MM-YYYY"), 'years', true) > 0 || moment(this.item['Date Of Birth']).diff(moment(after, "DD-MM-YYYY"), 'years', true) < 0 || this.item['Date Of Birth'] == "") && trainee_type=='Disadvantage youth (DVT and full-time)'){
                        $('#DateOfBirthGroup').addClass('has-error');
                        $('#DateOfBirthMessage').css('display', 'block');
                        $('#DateOfBirthMessage').css('color', 'red');
                        $('#submitButton').attr('disabled', 'disabled');
                    }else if( (moment(this.item['Date Of Birth']).diff(moment(before, "DD-MM-YYYY"), 'years', true) > 0 || this.item['Date Of Birth'] == "") && trainee_type=='Low-skilled worker (IHT, HCP)'){
                        $('#DateOfBirthGroup').addClass('has-error');
                        $('#DateOfBirthMessage').css('display', 'none');
                        $('#DateOfBirthMessagev2').css('display', 'block');
                        $('#DateOfBirthMessagev2').css('color', 'red');
                        $('#submitButton').attr('disabled', 'disabled');
                    }else{
                        $('#DateOfBirthGroup').removeClass('has-error');
                        $('#submitButton').removeAttr('disabled');
                        $('#DateOfBirthMessage').css('display', 'none');
                        $('#DateOfBirthMessage').css('color', '#256cb9');
                        $('#DateOfBirthMessagev2').css('color', '#256cb9');
                        $('#DateOfBirthMessagev2').css('display', 'none');
                    }          
                },

                onPickFile() {
                    this.$refs.image.click()
                },
    
                onFilePicked(event) {
                    const files = event.target.files || event.dataTransfer.files

                    vm = this
    
                    if (files && files[0]) {
                        let filename = files[0].name
    
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
                    $('#imagePreview').attr('src', 'data:image/png;base64,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');
                    this.item.Image = 'data:image/png;base64,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'
                }
            }
        });

    </script>

@endpush