{{ Form::open(array('url' => 'foo/bar',"class"=>"form-horizontal")) }}
<div class="widget">
    <div class="widget-heading">
        <h4 class="widget-title">Home Vistt</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-10">
                
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

            <div class="col-lg-2"></div>
        </div>
    
    </div>                           
</div>
{!! Form::close() !!}