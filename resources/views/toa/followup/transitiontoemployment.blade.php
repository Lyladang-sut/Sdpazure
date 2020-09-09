
    <h4>TRANSITION TO EMPLOYMENT</h4>
    <table class="table table-responsive table-bordered">
        <thead></thead>
        <tbody>
            <tr>
                <td>6.</td>
                <td>  
                    <div class="form-group">
                        {!! Form::Label('', 'Did you receive post training support from your training institutuin ?', ['class' => 'control-label col-lg-10']) !!}
                    </div>
                </td>
                <td>{!! Form::Checkbox('', null, ['class' => 'form-control']) !!} Yes &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {!! Form::Checkbox('', null, ['class' => 'form-control']) !!} No </td>
            </tr>

            <tr>
                <td>7.</td>
                <td colspan="2">{!! Form::Label('', 'Did you receive post training support from your training institutuin ?', ['class' => 'control-label col-lg-8']) !!}</td>
            </tr>
            <tr>
                <td></td>
                <td>{!! Form::Label('', 'Hospitallity ', ['class' => 'control-label col-lg-8']) !!}</td>
                <td>{!! Form::Label('', 'DVT', ['class' => 'control-label col-lg-8']) !!}</td>
            </tr>
            <tr>
                <td></td>
                <td>{!! Form::Checkbox('', null, ['class' => 'form-control']) !!} A. Techincal F & B servie support </td>
                <td>{!! Form::Checkbox('', null, ['class' => 'form-control']) !!} A. Career Counselling </td>
            </tr>
            <tr>
                <td></td>
                <td>{!! Form::Checkbox('', null, ['class' => 'form-control']) !!} B. Technical HouseKeeping Support </td>
                <td>{!! Form::Checkbox('', null, ['class' => 'form-control']) !!} B. Start up support (Money) </td>
            </tr>
            <tr>
                <td></td>
                <td>{!! Form::Checkbox('', null, ['class' => 'form-control']) !!} C. Accommodation reception service support </td>
                <td>{!! Form::Checkbox('', null, ['class' => 'form-control']) !!} C. Job seeker system registration NEA </td>
            </tr>
            <tr>
                <td></td>
                <td>{!! Form::Checkbox('', null, ['class' => 'form-control']) !!} D. Problem Solving at work and maintaining a job support </td>
                <td>{!! Form::Checkbox('', null, ['class' => 'form-control']) !!} D. Start up business support </td>
            </tr>
            <tr>
                <td></td>
                <td>{!! Form::Checkbox('', null, ['class' => 'form-control']) !!} E. other </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>{!! Form::Checkbox('', null, ['class' => 'form-control']) !!} F. Unsure </td>
                <td></td>
            </tr>
            <tr>
                <td>8.</td>
                <td colspan="2">{!! Form::Label('', 'How satisfied do you feel about the support you received? Please give a score from 1 to 10 to each of the support topics that you received: 1= very dissatisfied minimum score, and 10= very satisfied maximum score', ['class' => 'control-label col-lg-12']) !!}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <div class="form-group">
                        {!! Form::Label('', 'a. Technical F & B service support', ['class' => 'control-label col-lg-4']) !!}
                        <div class="col-lg-4">
                            {!! Form::Text('' , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <div class="form-group">
                        {!! Form::Label('', 'b. Technical Housekeeping support', ['class' => 'control-label col-lg-4']) !!}
                        <div class="col-lg-4">
                            {!! Form::Text('' , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <div class="form-group">
                        {!! Form::Label('', 'c. Accommodation reception service support', ['class' => 'control-label col-lg-4']) !!}
                        <div class="col-lg-4">
                            {!! Form::Text('' , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <div class="form-group">
                        {!! Form::Label('', 'd. Problem solving at work and maintaining a job support', ['class' => 'control-label col-lg-4']) !!}
                        <div class="col-lg-4">
                            {!! Form::Text('' , null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" >
                    <div class="form-group">
                        {!! Form::Label('', 'e. Other', ['class' => 'control-label col-lg-4']) !!}
                        <div class="col-lg-4">
                            {!! Form::Text('' , null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-lg-4">
                            {!! Form::Text('' , null, ['class' => 'form-control' , 'placeholder' => 'score...']) !!}
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>8.</td>
                <td colspan="2">{!! Form::Label('', 'How have you looked for jobs after graduation?  ( multiple selection )', ['class' => 'control-label col-lg-12']) !!}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <div class="form-group">
                        <div class="col-lg-4">
                            {!! Form::Checkbox('' , null, ['class' => 'form-control']) !!} a. I have not looked for a job yet
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <div class="form-group">
                        <div class="col-lg-4">
                            {!! Form::Checkbox('' , null, ['class' => 'form-control']) !!} b. I contacted some employers directly
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <div class="form-group">
                        <div class="col-lg-4">
                            {!! Form::Checkbox('' , null, ['class' => 'form-control']) !!} c. I was approached by an employer
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <div class="form-group">
                        <div class="col-lg-4">
                            {!! Form::Checkbox('' , null, ['class' => 'form-control']) !!} d. I received support from SDP to find a job
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <div class="form-group">
                        <div class="col-lg-4">
                            {!! Form::Checkbox('' , null, ['class' => 'form-control']) !!} e. I used personal connections and contacts (family/friends, etc.) 
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <div class="form-group">
                        <div class="col-lg-4">
                            {!! Form::Checkbox('' , null, ['class' => 'form-control']) !!} f. I looked in the Internet / online advertising
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <div class="form-group">
                        <div class="col-lg-4">
                            {!! Form::Checkbox('' , null, ['class' => 'form-control']) !!} g. I contacted employment agencies
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <div class="form-group">
                        <div class="col-lg-4">
                            {!! Form::Checkbox('' , null, ['class' => 'form-control']) !!} h. I started my own business
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <div class="form-group">
                        <div class="col-lg-4">
                            {!! Form::Checkbox('' , null, ['class' => 'form-control']) !!} i. I continued working in the job I had before
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <div class="form-group">
                        <div class="col-lg-4">
                            {!! Form::Checkbox('' , null, ['class' => 'form-control']) !!} j. Other 
                        </div>
                        <div class="col-lg-4">
                            {!! Form::Text('' , null, ['class' => 'form-control' , 'placeholder' => 'Please Specify...']) !!}
                        </div>
                    </div>
                </td>
            </tr>



    </tbody>
</table>
