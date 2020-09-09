{{ Form::open(array('url' => 'foo/bar',"class"=>"form-horizontal")) }}

<div class="widget">
    <div class="panel-body">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::Label('Enterprise', 'Enterprise Name', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('Enterprise', null, ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Interview date', 'Interview date', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::date('Interview date', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Females employed', 'Females employed', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('Females employed', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Advertisement',' Advertisement of vacancies in newspapers, internet, posters, etc.', ['class' => 'control-label col-lg-9']) !!}
                <div>
                    {!! Form::Checkbox('Advertisement', 1, false) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Direct contact',' Direct contact with employees', ['class' => 'control-label col-lg-9']) !!}
                <div>
                    {!! Form::Checkbox('Direct contact',1, false) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Employment agency','Employment agencies', ['class' => 'control-label col-lg-9']) !!}
                <div >
                    {!! Form::Checkbox('Employment agency', 1, false) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Training Institution','Direct contact to training institutions', ['class' => 'control-label col-lg-9']) !!}
                <div>
                    {!! Form::Checkbox('Training Institution', 1, false) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Other','other', ['class' => 'control-label col-lg-9']) !!}
                <div>
                    {!! Form::Checkbox('Other', 1, false) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Other, specify', 'Other, specify', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Text('Other, specify', null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <hr>

            <div class="form-group">
                {!! Form::Label('Hiring more graduates', 'Hiring more graduates', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                {!! Form::Select('Hiring more graduates', $sdp_skills, null, ['class' => 'form-control']) !!}
                </div>
            </div>
            
            <div class="form-group">
                {!! Form::Label('recommend other enterprises to hire SDP graduates', 'recommend other enterprises to hire SDP graduates', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                {!! Form::Select('recommend other enterprises to hire SDP graduates', $loops, null, ['class' => 'form-control']) !!}
                </div>
            </div>

             <div class="form-group">
                {!! Form::Label('recommendations for the training programmes', 'recommendations for the training programme', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                {!! Form::textarea('Specify technical skills',null , ['size' => '42x4']) !!}
                </div>
            </div>

             <div class="form-group">
                {!! Form::Label('Interviewer comments', 'Interviewer comments', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                {!! Form::textarea('Interviewer comments',null , ['size' => '42x4']) !!}
                </div>
            </div>

        </div>    

        <div class="col-md-6">
        <div class="form-group">
                {!! Form::Label('SDP graduate(s) have the skills', 'SDP graduate(s) have the skills', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                {!! Form::Select('SDP graduate(s) have the skills', $sdp_skills,null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Technical skills', 'Technical skills', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                {!! Form::Select('Technical skills', $loops, null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Communication skills with customers', 'Communication skills with customers', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                {!! Form::Select('Communication skills with customers', $loops, null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Communication skills with colleagues', 'Communication skills with colleagues', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                {!! Form::Select('Communication skills with colleagues', $loops, null, ['class' => 'form-control']) !!}
                </div>
            </div>
            
            <div class="form-group">
                {!! Form::Label('Commitment to job', 'Commitment to job', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                {!! Form::Select('Commitment to job', $loops, null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Confidence', 'Confidence', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                {!! Form::Select('Confidence', $loops, null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Honesty', 'Honesty', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                {!! Form::Select('Honesty', $loops, null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Overall score', 'Overall score', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                {!! Form::Select('Overall score', $loops, null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('graduate need additional training', 'graduate need additional training', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                {!! Form::Select('graduate need additional training', $sdp_skills, null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-md-6 enterprise-checkBox no-padding">
                <p>
                    {!! Form::Label('Customer service','Customer service', ['class' => 'control-label col-lg-9']) !!}
                    {!! Form::Checkbox('Customer service', 1, false) !!}
                </p>
                <p>
                    {!! Form::Label('Team work','Team work', ['class' => 'control-label col-lg-9']) !!}
                    {!! Form::Checkbox('Team work', 1, false) !!}
                </p>
                <p>
                    {!! Form::Label('Commitment to work','Commitment to work', ['class' => 'control-label col-lg-9']) !!}
                    {!! Form::Checkbox('Commitment to work', 1, false) !!}
                </p>
                <p>
                    {!! Form::Label('Cross-cultural interaction','Cross-cultural interaction', ['class' => 'control-label col-lg-9']) !!}
                    {!! Form::Checkbox('Cross-cultural interaction', 1, false) !!}
                </p>
                <p>
                    {!! Form::Label('Self-confidence','Self-confidence', ['class' => 'control-label col-lg-9']) !!}
                    {!! Form::Checkbox('Self-confidence', 1, false) !!}
                </p>
            </div>

            <div class="col-md-6 enterprise-checkBox ">
                <p>
                    {!! Form::Label('Number skills','Number skills', ['class' => 'control-label col-lg-9']) !!}
                    {!! Form::Checkbox('Number skills', 1, false) !!}
                </p>
                <p>
                    {!! Form::Label('Writing skills','Writing skills', ['class' => 'control-label col-lg-9']) !!}
                    {!! Form::Checkbox('Writing skills', 1, false) !!}
                </p>
                <p>
                    {!! Form::Label('IT computer skills','IT computer skills', ['class' => 'control-label col-lg-9']) !!}
                    {!! Form::Checkbox('IT computer skills', 1, false) !!}
                </p>
                <p>
                    {!! Form::Label('English','English', ['class' => 'control-label col-lg-9']) !!}
                    {!! Form::Checkbox('English', 1, false) !!}
                </p>
                <p>
                    {!! Form::Label('Technical job specifc skills','Technical job specifc skills', ['class' => 'control-label col-lg-9']) !!}
                    {!! Form::Checkbox('Technical job specifc skills', 1, false) !!}
                </p>
            </div>

            <div class="form-group">
                {!! Form::Label('Specify technical skills', 'Specify technical skills', ['class' => 'control-label col-lg-4']) !!}
                <div class="col-lg-6">
                {!! Form::textarea('Specify technical skills',null , ['size' => '48x4']) !!}
                </div>
            </div>

        </div>

    </div>
    <div class="panel-body text-right">
        <button type="button" data-style="expand-down" class="btn btn-raised btn-default ladda-button" data-dismiss="modal"><span class="ladda-label">Cancel</span><span class="ladda-spinner"></span></button>
        <button data-style="expand-left" class="btn btn-raised btn-success ladda-button"><span class="ladda-label">Submit Data</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
    </div>
</div>

{{ Form::close() }}