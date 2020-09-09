<div class="enterprise">
    <div class="widget">
        <div class="panel-body">
            <div class="col-md-5">
                <h4> ព័ត៌មានមូលដ្ឋាន/ Basic Information </h4>

                <div class="form-group required">
                    {!! Form::Label('Name of enterprise', '១​.​ ឈ្មោះសហគ្រាស​/Name of enterprise', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Text('Name of enterprise', null, [ 'required' => 'required', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group input-daterange">
                    {!! Form::Label('Date start business', '២. ថ្ងៃទីខែឆ្នាំចាប់ផ្តើមអាជីវកម្ម/Date start business', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::text('Date start business', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group required">
                    {!! Form::Label('Has license', '៣. ឯកសារចុះបញ្ជិអាជីវកម្ម/Has license?', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Has license', $licenses, null, ['required' => 'required','class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group required">
                    {!! Form::Label('Activity', '៤. ប្រភេទអាជីវកម្ម /Type of business', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Activity', $activities, null, [ 'required' => 'required', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Sector', 'វិស័យ/Sector of the business', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Sector', $sectors, null, ['required' => 'required','class' => 'form-control']) !!}
                    </div>
                </div>

                <h4>៥. ទីតាំង​/Location</h4>

                <div class="form-group">
                    {!! Form::Label('Province', 'ខេត្ត/Province', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Province', $provinces, null, ['required' => 'required','class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('District', 'ស្រុក-ក្រុង​/District', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('District', [], null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Commune', 'ឃុំ-សង្កាត់/Commune', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Commune', [], null, ['required' => 'required','class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Village', 'ភូមិ/Village', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Village', [], null, ['required' => 'required','class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Address', 'ផ្ទះលេខ/House number', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Text('Address', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

            </div>

            <div class="col-md-offset-1 col-md-6">

                <h4>៦. ចំនួនបុគ្គលិក/Employees (optional)</h4>

                <div class="form-group">
                    {!! Form::Label('Number women employees', '# ស្រីសរុប/ women employees', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Number('Number women employees', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Number men employees', '# ប្រុសសរុប/ men employees', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Number('Number men employees', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <p class="text-danger">ពត៌មានលម្អិតពីគណីនី/ Bank information for enterprises offering Dual Vocational Training Only</p>

                <div class="form-group">
                    {!! Form::Label('Bank Name', 'ឈ្មោះ​របស់​ធនាគារ/ Bank Name', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Text('Bank Name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Bank Account', 'លេខគណនី / Account Number', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Text('Bank Account', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Need to hire new employees', '៩. តើអ្នកត្រូវការជួលបុគ្គលិកថ្មីៗ ឬទេ/ Does the enterprise need to hire new employees?', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Need to hire new employees', $yes_no, null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <span class="text-danger">ប្រសិនមាន​ សូមបំពេញតារាខាងក្រោម/ If yes, please complete table below</span>
                <h4>ត្រូវការបុគ្គលិក/Employees Needed 
                            <button type="button" class="btn btn-raised btn-success btn-sm pull-right" data-toggle="modal" data-target="#enterprise-employment">+</button>
                        </h4>
                <br>
                <table class="table text-center" style="border:1px solid #ddd">
                    <thead>
                        <tr style="background:#f3f3f3">
                            <th>Position</th>
                            <th>How Many</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan=3>There are no related items.</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
    

</div>
