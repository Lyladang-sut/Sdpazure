
    <div class="col-md-6">
        <h4>Personal Information</h4>

        <div class="form-group required">
            {!! Form::Label('First Name', '១. នាមខ្លួន/First Name', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Text('First Name', null, [ 'v-model' => 'item["First Name"]', 'required' => 'required', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group required">
            {!! Form::Label('Last Name', '២. នាមត្រកូល/Family Name', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Text('Last Name', null, [ 'v-model' => 'item["Last Name"]', 'required' => 'required', 'class' => 'form-control']) !!}
            </div>
        </div>
        
        <div class="form-group required input-daterange">
            {!! Form::Label('Date Of Birth', 'ថ្ងៃខែឆ្នាំកំណើត/ Date Birth', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Text('Date Of Birth', null, [ 'v-model' => 'item["Date Of Birth"]', 'required' => 'required', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group required">
            {!! Form::Label('Sex', 'ភេទ/ Sex', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Select('Sex', $sexes, null, [ 'v-model' => 'item["Sex"]', 'required' => 'required', 'class' => 'form-control']) !!}
            </div>
        </div>

        <h4>៦ទីលំនៅអចិន្ត្រៃយ៍ សំរាប់ទំនាក់ទំនងសាម៉ីខ្លួន/ Home location</h4>

        <div class="form-group required">
            {!! Form::Label('Province', 'ខេត្ត / Province', ['required' => 'required', 'class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Select('Province', [], null, [ 'v-model' => 'item["Province"]', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group required">
            {!! Form::Label('District', ' ស្រុក / ក្រុង / District', ['required' =>'required', 'class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Select('District', [], null, [ 'v-model' => 'item["District"]', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group required">
            {!! Form::Label('Commune', 'ឃុំ/សង្កាត់ / Commune', ['required' => 'required', 'class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Select('Commune', [], null, [ 'v-model' => 'item["Commune"]', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group required">
            {!! Form::Label('Village', 'ភូមិ / Village', [ 'class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Select('Village', [], null, ['v-model' => 'item["Village"]', 'required' => 'required', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::Label('House Number', 'ផ្ទះលេខ / House Number', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Text('House Number', null, [ 'v-model' => 'item["House Number"]', 'class' => 'form-control']) !!}
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
        <div class="form-group required">
            {!! Form::Label('Last year of Schooling', 'បញ្ជាក់កំរិតសិក្សាខ្ពស់បំផុតដែលអ្នកបានបញ្ចប់/Last grade schooling finished', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Text('Last year of Schooling', null, [ 'v-model' => 'item["Last year of Schooling"]', 'required' => 'required', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group required">
            {!! Form::Label('Ethnic Minority', 'ជនជាតិ/ Ethnicity', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Select('Ethnic Minority', $ethnic, null, [ 'v-model' => 'item["Ethnic Minority"]', 'required' => 'required','class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group required">
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

        <div class="form-group">
            {!! Form::Label('Position', 'តួនាទី/ការងារ/Position', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Text('Position', null, [ 'v-model' => 'item["Position"]', 'class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::Label('Differently Abled Person', 'មានពិការភាព?/ Differently Abled Person?', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Text('Differently Abled Person', null, [ 'v-model' => 'item["Differently Abled Person"]', 'class' => 'form-control']) !!}
            </div>
        </div>

    </div>
