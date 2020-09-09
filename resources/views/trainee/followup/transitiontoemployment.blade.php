<div class="col-md-8">   
    <table class="table table-responsive table-bordered">
            <tbody>
                <tr>
                    <td>6.</td>
                    <td>  
                        <div class="form-group">
                            {!! Form::Label('Did you receive post-training support', 'Did you receive post training support from your training institutuin ?', ['class' => 'control-label col-lg-10']) !!}
                        </div>
                    </td>
                    <td>{!! Form::Checkbox('Did you receive post-training support',false) !!} Yes &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {!! Form::Checkbox('Did you receive post-training support',false) !!} No </td>
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
                    <td>{!! Form::Checkbox('Technical F B service support',false) !!} A. Techincal F & B servie support </td>
                    <td>{!! Form::Checkbox('Career Counseling', false) !!} A. Career Counselling </td>
                </tr>
                <tr>
                    <td></td>
                    <td>{!! Form::Checkbox('Technical Housekeeping support', false) !!} B. Technical HouseKeeping Support </td>
                    <td>{!! Form::Checkbox('Start-up support (money)', false) !!} B. Start up support (Money) </td>
                </tr>
                <tr>
                    <td></td>
                    <td>{!! Form::Checkbox('Accommodation reception service support', false) !!} C. Accommodation reception service support </td>
                    <td>{!! Form::Checkbox('Job seeker system registration NEA', false) !!} C. Job seeker system registration NEA </td>
                </tr>
                <tr>
                    <td></td>
                    <td>{!! Form::Checkbox('Problem solving at work and maintaining a job support', false) !!} D. Problem Solving at work and maintaining a job support </td>
                    <td>{!! Form::Checkbox('Start-up business support', false) !!} D. Start up business support </td>
                </tr>
                <tr>
                    <td></td>
                    <td>{!! Form::Checkbox('Other', false) !!} E. other </td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>{!! Form::Checkbox('Unsure', false) !!} F. Unsure </td>
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
                            {!! Form::Label('F B service support score', 'a. Technical F & B service support', ['class' => 'control-label col-lg-4']) !!}
                            <div class="col-lg-4">
                                {!! Form::Text('F B service support score' , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <div class="form-group">
                            {!! Form::Label('Tech Housekeeping support score', 'b. Technical Housekeeping support', ['class' => 'control-label col-lg-4']) !!}
                            <div class="col-lg-4">
                                {!! Form::Text('Tech Housekeeping support score' , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <div class="form-group">
                            {!! Form::Label('Acc Rec service support score', 'c. Accommodation reception service support', ['class' => 'control-label col-lg-4']) !!}
                            <div class="col-lg-4">
                                {!! Form::Text('Acc Rec service support score' , null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <div class="form-group">
                            {!! Form::Label('prob solv support score', 'd. Problem solving at work and maintaining a job support', ['class' => 'control-label col-lg-4']) !!}
                            <div class="col-lg-4">
                                {!! Form::Text('prob solv support score' , null, ['class' => 'form-control']) !!}
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
                    <td>9.</td>
                    <td colspan="2">{!! Form::Label('', 'How have you looked for jobs after graduation?  ( multiple selection )', ['class' => 'control-label col-lg-12']) !!}</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <div class="form-group">
                            <div class="col-lg-4">
                                {!! Form::Checkbox('have not looked for a job yet' , false) !!} a. I have not looked for a job yet
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <div class="form-group">
                            <div class="col-lg-4">
                                {!! Form::Checkbox('contacted some employers directly' , false) !!} b. I contacted some employers directly
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <div class="form-group">
                            <div class="col-lg-4">
                                {!! Form::Checkbox('was approached by an employer' , false) !!} c. I was approached by an employer
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <div class="form-group">
                            <div class="col-lg-4">
                                {!! Form::Checkbox('received support from SDP to find a job' , false) !!} d. I received support from SDP to find a job
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <div class="form-group">
                            <div class="col-lg-4">
                                {!! Form::Checkbox('used personal connections and contacts' , false) !!} e. I used personal connections and contacts (family/friends, etc.) 
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <div class="form-group">
                            <div class="col-lg-4">
                                {!! Form::Checkbox('looked in the Internet online advertising' , false) !!} f. I looked in the Internet / online advertising
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <div class="form-group">
                            <div class="col-lg-4">
                                {!! Form::Checkbox('contacted employment agencies' , false) !!} g. I contacted employment agencies
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <div class="form-group">
                            <div class="col-lg-4">
                                {!! Form::Checkbox('started my own business' , false) !!} h. I started my own business
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <div class="form-group">
                            <div class="col-lg-4">
                                {!! Form::Checkbox('continued working in the job I had before' , false) !!} i. I continued working in the job I had before
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <div class="form-group">
                            <div class="col-lg-4">
                                {!! Form::Checkbox('Other method' , false) !!} j. Other 
                            </div>
                            <div class="col-lg-4">
                                {!! Form::Text('If other, specify' , null, ['class' => 'form-control' , 'placeholder' => 'Please Specify...']) !!}
                            </div>
                        </div>
                    </td>
                </tr>
        </tbody>
    </table>
</div>

