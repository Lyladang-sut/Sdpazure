
<div class="col-md-8">
    <table class="table table-bordered table-responsive">
        <tr>
            <td>11</td>
            <td colspan="4">{!! Form::Label('', 'Do you think that the SDP graduate(s) has the skills needed to do the job well?') !!} </td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Checkbox('',null , false) !!} Yes</td>
            <td>{!! Form::Checkbox('',null , false) !!} No</td>
            <td colspan="2">{!! Form::Checkbox('',null , false) !!} Unsure</td>
        </tr>
        <tr>
            <td>12</td>
            <td colspan="4">{!! Form::Label('', 'Please give a score to the following graduate’s skills. Score each statement from 1 to 10: 1= poor (minimum score), and 10= excellent (maximum score)') !!} </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">{!! Form::Label('', 'a. Graduate’s technical skills to do the job') !!}</td>
            <td>{!! Form::text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">{!! Form::Label('', 'b. Graduate’s communication skills with customers ') !!}</td>
            <td>{!! Form::text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">{!! Form::Label('', 'c. Graduate’s communication skills with colleagues ') !!}</td>
            <td>{!! Form::text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">{!! Form::Label('', 'd. Graduate’s commitment to his/her job ') !!}</td>
            <td>{!! Form::text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">{!! Form::Label('', 'e.	Graduate’s confidence ') !!}</td>
            <td>{!! Form::text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">{!! Form::Label('', 'e.	Graduate’s confidence ') !!}</td>
            <td>{!! Form::text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">{!! Form::Label('', 'e.	Graduate’s confidence ') !!}</td>
            <td>{!! Form::text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>13</td>
            <td colspan="4">{!! Form::Label('', 'Do you think that the graduate might need additional training to do his/her job well at your enterprise?') !!} </td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Checkbox('',null , false) !!} Yes</td>
            <td>{!! Form::Checkbox('',null , false) !!} No</td>
            <td colspan="4">{!! Form::Checkbox('',null , false) !!} Unsure</td>
        </tr>
        <tr>
            <td>14</td>
            <td colspan="4">{!! Form::Label('', 'If yes, please specify in which area he/she needs more training on:  Select from the following options') !!} </td>
        </tr>
        <tr>
            <td></td>
            <td>a. Customer Service</td>
            <td>{!! Form::Checkbox('', null ,false) !!}</td>
            <td>b. Team Work</td>
            <td>{!! Form::Checkbox('', null ,false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>c. Commitment to work </td>
            <td>{!! Form::Checkbox('', null ,false) !!}</td>
            <td>d. Cross-cultural interaction </td>
            <td>{!! Form::Checkbox('', null ,false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>e. Self-confidence </td>
            <td>{!! Form::Checkbox('', null ,false) !!}</td>
            <td>f. Number skills </td>
            <td>{!! Form::Checkbox('', null ,false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>g. Writing skills </td>
            <td>{!! Form::Checkbox('', null ,false) !!}</td>
            <td>h. IT/computer skills </td>
            <td>{!! Form::Checkbox('', null ,false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>i. English </td>
            <td>{!! Form::Checkbox('', null ,false) !!}</td>
            <td>j. Technical / job specific skills </td>
            <td>{!! Form::Checkbox('', null ,false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="4">{!! Form::text('', null , ['class' => 'form-control', 'placeholder' => 'Please specific technical / job specific skills...']) !!}</td>
        </tr>
        <tr>
            <td>15</td>
            <td colspan="4">{!! Form::Label('', 'Are you interested in hiring more graduates') !!} </td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Checkbox('',null , false) !!} Yes</td>
            <td>{!! Form::Checkbox('',null , false) !!} No</td>
            <td colspan="3">{!! Form::Checkbox('',null , false) !!} Unsure</td>
        </tr>
        <tr>
            <td rowspan="2">If yes</td>
            <td colspan="2">{!! Form::Label('', 'Position/ job   -- How many employees') !!}</td>
            <td colspan="2">{!! Form::Label('', 'Position/ job   -- How many employees') !!}</td>
        </tr>
        <tr>
            <td>{!! Form::text('', null , ['class' => 'form-control', 'placeholder' => 'Position...']) !!}</td>
            <td>{!! Form::text('', null , ['class' => 'form-control', 'placeholder' => 'How many employees...']) !!}</td>
            <td>{!! Form::text('', null , ['class' => 'form-control', 'placeholder' => 'Position...']) !!}</td>
            <td>{!! Form::text('', null , ['class' => 'form-control', 'placeholder' => 'How many employees...']) !!}</td>
        </tr>
        
        <tr>
            <td>16</td>
            <td colspan="4">{!! Form::Label('', 'How likely are you to recommend other enterprises to hire SDP graduates? Then give a score from 1 to 10:  1= not likely to recommend (minimum score), and 10= very likely to recommend (maximum score). Circle the number.') !!} </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="4">{!! Form::text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>17</td>
            <td colspan="4">{!! Form::Label('', 'Do you have any recommendations for the training programme to improve?') !!} </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="4">{!! Form::text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Label('', 'Interview Name') !!} </td>
            <td>{!! Form::text('', null , ['class' => 'form-control']) !!}</td>
            <td>{!! Form::Label('', 'Date') !!} </td>
            <td>{!! Form::Date('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::Label('', 'Comments from interviewer') !!}</td>
            <td colspan="3">{!! Form::TextArea('',null , ['class' => 'form-control' , 'size' => '30x3']) !!}</td>
        </tr>
    </table>
</div>