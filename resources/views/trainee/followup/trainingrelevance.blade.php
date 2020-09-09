
<div class="col-md-8">
    <table class="table table-responsive table-bordered">
        <tr>
            <td>38.</td>
            <td>{!! Form::Label('Are you now working in a job related to your training course', ' Are you now working in a job related to your training course?') !!}</td>
            <td>{!! Form::Text('Are you now working in a job related to your training course',null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>39. </td>
            <td colspan="2">{!! Form::Label('', 'If your current job is not related to your training course, why did you choose this job?') !!}</td>
        </tr>
        <tr>
            <td></td>
            <td><p>a. I have better career possibilities in this job</p></td>
            <td>{!! Form::Checkbox('have better career possibilities in this job',null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td><p>b. I was offered a good job opportunity that is less related to the course</p></td>
            <td>{!! Form::Checkbox('Offered good job',null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td><p>c. I can obtain a higher salary in this job</p></td>
            <td>{!! Form::Checkbox('can obtain a higher salary in this job', false) !!}</</td>
        </tr>
        <tr>
            <td></td>
            <td><p>d. This job is more secure</p></td>
            <td>{!! Form::Checkbox('job is more secure',null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td><p>e. This job is more interesting</p></td>
            <td>{!! Form::Checkbox('job is more interesting',null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td><p>f. Other</p></td>
            <td>{!! Form::Checkbox('Other reason for diff job',null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">{!! Form::Text('',null , ['class' => 'form-control', 'placeholder' => 'Other Please Specify...']) !!}</td>
        </tr>
        <tr>
            <td rowspan="2">40.</td>
            <td colspan="2"><p>{!! Form::Label('how useful are skills', 'How useful are the skills and knowledge you got during the course for your current job? Think if you use and apply at work the skills/knowledge that you learned in the course. Then give a score from 1 to 10:  1= not useful (minimum score), and 10= very useful (maximum score). Circle the number.?') !!}</td>
        </tr>
        <tr>
            <td colspan="2">{!! Form::Text('how useful are skills',null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td rowspan="2">41.</td>
            <td colspan="2"><p>{!! Form::Label('What else do you wish you had learned during SDP training', 'What else do you wish you had learned during SDP training that would have been useful in your current job?') !!}</td>
        </tr>
        <tr>
            <td colspan="2">{!! Form::TextArea('What else do you wish you had learned during SDP training',null , ['class' => 'form-control' , 'size' => '30x3']) !!}</td>
        </tr>
        <tr>
            <td rowspan="2">42.</td>
            <td colspan="2"><p>{!! Form::Label('', 'Which of the following do you think you got as result of your skills training with SDP? Please select all that apply (multiple choice answer)') !!}</td>
        </tr>
        <tr>
            <td colspan="2"><p>Job-related benefits</p></td>
        </tr>
        <tr>
            <td></td>
            <td><p>a. Got a job</p></td>
            <td>{!! Form::Checkbox('Got a job',null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td><p>b. Got a new job/changed my job</p></td>
            <td>{!! Form::Checkbox('Got a new job, changed my job',null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td><p>c. Was able to set up my own business</p></td>
            <td>{!! Form::Checkbox('Set up own business',null , true) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td><p>d. Got a promotion / Start a new role</p></td>
            <td>{!! Form::Checkbox('Got promotion, started new role',null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td><p>e. Increased my income</p></td>
            <td>{!! Form::Checkbox('Increased my income',null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td><p>f. None</p></td>
            <td>{!! Form::Checkbox('None',null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td><p>g. Other</p></td>
            <td>{!! Form::Checkbox('',null, true) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">{!! Form::Text('',null , ['class' => 'form-control', 'placeholder' => 'No field in the database...']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"><p>Perception on Personal benefits</</p></td>
        </tr>
        <tr>
            <td></td>
            <td><p>a. I believe that I have more career opportunities</p></td>
            <td>{!! Form::Checkbox('I have more career opportunities',null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td><p>b. I feel my self-esteem has improved/ feel more confident about myself</p></td>
            <td>{!! Form::Checkbox('self-esteem has improved',null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td><p>c. I am now able to make a plan of action to solve the problems at work </p></td>
            <td>{!! Form::Checkbox('now able to make a plan of action to solve the problems at work',null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td><p>d. I am now able to express my ideas and connect with customers and work colleagues </p></td>
            <td>{!! Form::Checkbox('Express my ideas',null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td><p>e. Other</p></td>
            <td>{!! Form::Checkbox('other personal benefit',null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">{!! Form::Text('Specify other benefit',null , ['class' => 'form-control', 'placeholder' => 'Other Please Specify...']) !!}</td>
        </tr>
        <tr>    
            <td></td>
            <td><p>f. None</p></td>
            <td>{!! Form::Checkbox('None',null , true) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"><p>Perception on Benefits for family/ household</p></td>
        </tr>
        <tr>    
            <td></td>
            <td><p>a. I am now able to give money/ more money to my household</p></td>
            <td>{!! Form::Checkbox('now able to give money',null , false) !!}</td>
        </tr>
        <tr>    
            <td></td>
            <td><p>b. Other</p></td>
            <td>{!! Form::Checkbox('Other family benefit',null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">{!! Form::Text('Specify other family benefit',null , ['class' => 'form-control', 'placeholder' => 'Other Please Specify...']) !!}</td>
        </tr>
        <tr>    
            <td></td>
            <td><p>f. None</p></td>
            <td>{!! Form::Checkbox('None family benefit',null , true) !!}</td>
        </tr>
        
    </table>
</div>