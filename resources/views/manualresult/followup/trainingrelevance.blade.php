<div class="col-lg-8">
    <h4>Training Relevance</h4>

    <div class="form-group">
        {!! Form::Label('', '38. Are you now working in a job related to your training course?', ['class' => 'control-label col-lg-6']) !!}
        <div class="col-lg-6">
            {!! Form::Checkbox('',null , ['class' => 'form-control']) !!} Yes
            &nbsp;&nbsp;&nbsp;&nbsp;
            {!! Form::Checkbox('',null , ['class' => 'form-control']) !!} No
        </div>
    </div>

    <div class="form-group">
        {!! Form::Label('', '39. If your current job is not related to your training course, why did you choose this job?', ['class' => 'control-label col-lg-8']) !!}
    </div>
    <table>
        <tr>
            <td><p>a. I have better career possibilities in this job</p></td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>b. I was offered a good job opportunity that is less related to the course</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>c. I can obtain a higher salary in this job</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>d. This job is more secure</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>e. This job is more interesting</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>f. Other</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>{!! Form::Text('',null , ['class' => 'form-control', 'placeholder' => 'Please Specify...']) !!}</td>
            <td></td>
        </tr>
    </table>

    <div class="form-group">
        {!! Form::Label('', '40. How useful are the skills and knowledge you got during the course for your current job? Think if you use and apply at work the skills/knowledge that you learned in the course. Then give a score from 1 to 10:  1= not useful (minimum score), and 10= very useful (maximum score). Circle the number.?', ['class' => 'control-label col-lg-8']) !!}
        <div class="col-lg-6">
            {!! Form::Text('',null , ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::Label('', '41. What else do you wish you had learned during SDP training that would have been useful in your current job?', ['class' => 'control-label col-lg-12']) !!}
    </div>
    <div class="col-lg-6">
        {!! Form::TextArea('',null , ['class' => 'form-control' , 'size' => '30x3']) !!}
    </div>

    <div class="form-group">
        {!! Form::Label('', '42. Which of the following do you think you got as result of your skills training with SDP? Please select all that apply (multiple choice answer)', ['class' => 'control-label col-lg-12']) !!}
    </div>
    <table>
        <tr>
            <td></td>
            <td>Job-related benefits</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>a. Got a job</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>b. Got a new job/changed my job</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>c. Was able to set up my own business</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>d. Got a promotion/ started a new role</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>e. Increased my income</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>f. None</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>g. Other</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Text('',null , ['class' => 'form-control', 'placeholder' => 'Please Specify...']) !!}</td>
        </tr>

        <tr>
            <td></td>
            <td><strong>Perception on Personal benefits</strong></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td> <strong>a. I believe that I have more career opportunities</strong></td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>b. I am now able to make a plan of action to solve the problems at work</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>c. I am now able to express my ideas and connect with customers and work colleagues</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>d. Got a promotion/ started a new role</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>f. None</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>g. Other</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Text('',null , ['class' => 'form-control', 'placeholder' => 'Please Specify...']) !!}</td>
        </tr>

        <tr>
            <td></td>
            <td><strong>Perception on Benefits for family/ household</strong></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td> <strong>a. I am now able to give money/ more money to my household</strong></td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>f. None</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>g. Other</td>
            <td>{!! Form::Checkbox('',null , ['class' => 'form-control']) !!}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Text('',null , ['class' => 'form-control', 'placeholder' => 'Please Specify...']) !!}</td>
        </tr>
    </table>   
    <div class="form-group">
        {!! Form::Label('', 'Interview Name', ['class' => 'control-label col-lg-6']) !!}
    </div>    
    <div class="col-lg-6">
        {!! Form::Text('',null , ['class' => 'form-control']) !!} 
    </div>
    
    <div class="form-group">
        {!! Form::Label('', 'Date', ['class' => 'control-label col-lg-6']) !!}
    </div>
    <div class="col-lg-6">
        {!! Form::Date('',null , ['class' => 'form-control']) !!} 
    </div>


</div>