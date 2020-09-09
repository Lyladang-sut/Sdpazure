<div class="col-md-8">
    <h4>ព័ត៌មានសហគ្រាស/ Enterprise Information</h4>
    <p>ឈ្មោះសហគ្រាស/Enterprise <span class="text-center"><a href="#">Cheang Heng</a></p></span>
    <p>តួនាទី/ការងារ/Position <span class="text-center">Owner</span></p>

    <h4>Training provided at Enterprise</h4>
    <p class="text-danger">Please enter the Intervantion Area (IA) & Delivery Channel (DC) the owner/manager is providing skill training for</p>
    
    <div class="form-group required">
        {!! Form::Label('IADC Training', 'IADC Training', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Select('IADC Training', $Intervention, null, [ 'required' => 'required', 'class' => 'form-control']) !!}
        </div>
    </div>

    <h4>បទពិសោធមុន និងចំនេះដឹង/ Previous Experience & Knowledge</h4>
    
    <div class="form-group required">
        {!! Form::Label('Is Assessor', 'Is Owner/Manager an Assessor?', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Select('Is Assessor', $yes_no, null, [ 'required' => 'required', 'class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group required">
        {!! Form::Label('Experience trainer', 'តើអ្នកធ្លាប់បានផ្តល់ការបណ្តុះបណ្តាលដល់បុគ្គលិករបស់អ្នកដោយផ្ទាល់ដែរឬទេ/ Have you ever given training to your staff?', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Select('Experience trainer', $yes_no, null, ['required' => 'required','class' => 'form-control']) !!}
        </div>
    </div>

    <h4>វគ្គបណ្តុះបណ្តាលគ្រូបង្ហាត់/ Trainer Experience
        <button type="button" class="btn btn-raised btn-success btn-sm pull-right" data-toggle="modal" data-target="#training-experience">+</button>
    </h4><br>
    <table class="table" style="border:1px solid #ddd">
        <tr><th>Training provided</th></tr>
        <tr><td>There are no related items.</td></tr>
    </table>

    

</div>

