<div class="col-lg-8">
    <h4>Graduate Performance</h4>
    
    <div class="form-group">
        {!! Form::Label('', '11. Do you think that the SDP graduate(s) has the skills needed to do the job well?', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Checkbox('',null , false) !!} Yes
            &nbsp;&nbsp;&nbsp;&nbsp;
            {!! Form::Checkbox('',null , false) !!} No
            &nbsp;&nbsp;&nbsp;&nbsp;
            {!! Form::Checkbox('',null , false) !!} Unsure
        </div>
    </div>
    <h5 style="font-weight:bold; color: #1b1919; font-size:15px;">12.Please give a score to the following graduate’s skills. Score each statement from 1 to 10: 1= poor (minimum score), and 10= excellent (maximum score)</h5>
    <div class="form-group">
        {!! Form::Label('', 'a. Graduate’s technical skills to do the job', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::text('', null , ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::Label('', 'a. Graduate’s technical skills to do the job', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::text('', null , ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::Label('', 'b. Graduate’s communication skills with customers ', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::text('' ,null , ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::Label('', 'c. Graduate’s communication skills with colleagues', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::text('',null , ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::Label('', 'd. Graduate’s commitment to his/her job ', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::text('',null , ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::Label('', 'e. Graduate’s confidence', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::text('',null , ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::Label('', 'f. Graduate’s honesty ', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::text('',null , ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::Label('', 'g. Please give an overall score for the graduate’s performance in his/her job', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::text('',null , ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::Label('', '13. Do you think that the graduate might need additional training to do his/her job well at your enterprise?', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Checkbox('',null ,false) !!} Yes
            &nbsp;&nbsp;&nbsp;&nbsp;
            {!! Form::Checkbox('',null  ,false) !!} No
            &nbsp;&nbsp;&nbsp;&nbsp;
            {!! Form::Checkbox('',null ,false) !!} Unsure
        </div>
    </div>
    <div class="form-group">
        {!! Form::Label('', 'If yes, please specify in which area he/she needs more training on', ['class' => 'control-label col-lg-6']) !!}
    </div>

    <div class="col-lg-10">
        <div class="col-lg-3">Customer service</div>
        <div class="col-lg-1">{!! Form::Checkbox('', null ,false) !!}</div>

        <div class="col-lg-3">Team work </div>
        <div class="col-lg-1">{!! Form::Checkbox('', null ,false) !!}</div>

        <div class="col-lg-3">Commitment to work </div>
        <div class="col-lg-1">{!! Form::Checkbox('', null ,false) !!}</div>

        <div class="col-lg-3">Cross-cultural interaction</div>
        <div class="col-lg-1">{!! Form::Checkbox('', null ,false) !!}</div>

        <div class="col-lg-3">Self-confidence </div>
        <div class="col-lg-1">{!! Form::Checkbox('', null ,false) !!}</div>

        <div class="col-lg-3">Number skills</div>
        <div class="col-lg-1">{!! Form::Checkbox('', null ,false) !!}</div>

        <div class="col-lg-3">Writing skills</div>
        <div class="col-lg-1">{!! Form::Checkbox('', null ,false) !!}</div>

        <div class="col-lg-3">IT/computer skills  & Spa</div>
        <div class="col-lg-1">{!! Form::Checkbox('', null ,false) !!}</div>

        <div class="col-lg-3">English </div>
        <div class="col-lg-1">{!! Form::Checkbox('', null ,false) !!}</div>

        <div class="col-lg-3">Technical / job specific skills  </div>
        <div class="col-lg-1">{!! Form::Checkbox('', null ,false) !!}</div>

        <div class="col-lg-3">Other </div>
        <div class="col-lg-1">{!! Form::Checkbox('', null ,false) !!}</div>
    </div>
    <!--Other field need to add texx box-->

    <div class="form-group">
        {!! Form::Label('', '15. Are you interested in hiring more graduates', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Checkbox('',null ,false) !!} Yes
            &nbsp;&nbsp;&nbsp;&nbsp;
            {!! Form::Checkbox('',null ,false) !!} No
            &nbsp;&nbsp;&nbsp;&nbsp;
            {!! Form::Checkbox('',null ,false) !!} Unsure
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('', '16. How likely are you to recommend other enterprises to hire SDP graduates?', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Select('',[],null , ['class' => 'form-control']) !!}
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::Label('', 'Interview Name', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Text('',null , ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('', 'Date', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Date('',null , ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('', 'Comments from interviewer:', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::TextArea('',null , ['class' => 'form-control']) !!}
        </div>
    </div>

</div>