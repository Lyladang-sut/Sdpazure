{{ Form::open(array('url' => 'foo/bar',"class"=>"form-horizontal")) }}
<div class="row">
    <div class="col-lg-6">
        
        <div class="form-group">
            {!! Form::Label('Training Orginisation', 'Training Orginisation', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Select('Training Orginisation', $trainingprovider , null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::Label('Full Name', 'Full Name', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Text('Full Name', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::Label('Intervention', 'Intervention', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Select('Intervention', $Intervention , null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::Label('Delivery Channel', 'Delivery Channel', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Select('Delivery Channel', $totdc , null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::Label('Course Trained', 'Course Topic 1', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::Select('Course Trained', $course , null, ['class' => 'form-control']) !!}
            </div>
        </div>
        
        <div class="input-daterange">

        
        <div class="form-group">
            {!! Form::Label('Start Date', 'Start Date', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::text('Start Date', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::Label('End Date', 'End Date', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::text('End Date', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        </div>

        <div class="form-group">
            {!! Form::Label('Number of sessions', 'Number of sessions', ['class' => 'control-label col-lg-6']) !!}
            <div class="col-lg-6">
                {!! Form::text('Number of sessions', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        
    </div>

    <div class="col-lg-6">
        <h4>Training Attendees</h4>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#traniningaccess">
            Add Training
        </button>
        <br><br>
        <table class="table table-bordered table-resposive">
            <thead>
                <tr style="background-color:#E6E6FA">
                    <th>Organisation</th>
                    <th>Trainer</th>
                    <th>Owner/Manager</th>
                    <th>Competent</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    <td>john@example.com</td>
                </tr>
                <tr>
                    <td>Mary</td>
                    <td>Moe</td>
                    <td>mary@example.com</td>
                    <td>john@example.com</td>
                </tr>
                <tr>
                    <td>July</td>
                    <td>Dooley</td>
                    <td>july@example.com</td>
                    <td>john@example.com</td>
                </tr>
            </tbody>
        </table>   
    </div>
</div>
{!! Form::close() !!}



