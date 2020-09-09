<div class="col-lg-8">
    <h4>WORK SITUATION NOW</h4>
    <div class="panel-group panel-group-control content-group-lg">
        <div class="panel panel-white">
            <div class="panel-heading" style="background: #f3f3f3;border: 1px solid #ddd;">
                <h6 class="panel-title">
                    <a data-toggle="collapse" href="#collapsible-control-group1" aria-expanded="true" class="">A. No, I am unemployed</a>
                </h6>
            </div>
            <div id="collapsible-control-group1" class="panel-collapse collapse in" aria-expanded="true" style="">
                <div class="panel-body" style="border: 1px solid #ddd;">
                    <p style="text-decoration: underline;font-weight: bold;">If Unemployed, please choose from the following options that describe the reasons you are unemployed (multiple selection) </p>
                
                    <table style="width:100%" class="work">
                        <tbody>
                        <tr>
                            <td>a. </td>
                            <td>{!! Form::Checkbox('', null , ['class' => 'form-control']) !!}</td>
                            <td>No job opportunities near my home </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>b.</td>
                            <td>{!! Form::Checkbox('', null , ['class' => 'form-control']) !!}</td>
                            <td>Not enough skills to get a job </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>c.</td>
                            <td>{!! Form::Checkbox('', null , ['class' => 'form-control']) !!}</td>
                            <td>No contacts/ networ </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>d.</td>
                            <td>{!! Form::Checkbox('', null , ['class' => 'form-control']) !!}</td>
                            <td>No employment information </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>e.</td>
                            <td>{!! Form::Checkbox('', null , ['class' => 'form-control']) !!}</td>
                            <td>No support to engage with enterprises/ with job opportunities </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>f.</td>
                            <td>{!! Form::Checkbox('', null , ['class' => 'form-control']) !!}</td>
                            <td>Family/ social duties</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>g.</td>
                            <td>{!! Form::Checkbox('', null , ['class' => 'form-control']) !!}</td>
                            <td>Continued studying </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>h.</td>
                            <td>{!! Form::Checkbox('', null , ['class' => 'form-control']) !!}</td>
                            <td>Other</td>
                            <td>{!! Form::Text('' , null, ['class' => 'form-control' , 'placeholder' => 'Please specify' ]) !!}</td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </div>

        <div class="panel panel-white">
            <div class="panel-heading" style="background: #f3c298;">
                <h6 class="panel-title">
                    <a class="" data-toggle="collapse" href="#collapsible-control-group2" aria-expanded="true">B. Yes, I am employed</a>
                </h6>
            </div>
            <div id="collapsible-control-group2" class="panel-collapse collapse in" aria-expanded="true" style="">
                <div class="panel-body">
                    <table style="width:100%" class="work">
                    <p style="text-decoration: underline;font-weight: bold;">If Employed, which type of employment do you have?</p>
                        <tbody>
                            <tr>
                                <td>a. </td>
                                <td>{!! Form::Checkbox('', null , ['class' => 'form-control']) !!}</td>
                                <td>Self-employed</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>b.</td>
                                <td>{!! Form::Checkbox('', null , ['class' => 'form-control']) !!}</td>
                                <td>Wage employed with one employer</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>c.</td>
                                <td>{!! Form::Checkbox('', null , ['class' => 'form-control']) !!}</td>
                                <td>Wage employed with more than one job</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>d.</td>
                                <td>{!! Form::Checkbox('', null , ['class' => 'form-control']) !!}</td>
                                <td>Family business not receiving salary</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>e.</td>
                                <td>{!! Form::Checkbox('', null , ['class' => 'form-control']) !!}</td>
                                <td>Other</td>
                                <td><td>{!! Form::Text('' , null, ['class' => 'form-control' , 'placeholder' => 'Please specify' ]) !!}</td></td>
                            </tr>
                        </tbody>    
                    </table>
                </div>
            </div>

       
        </div>

        <table style="width:100%" class="work">
            <p style="text-decoration: underline;font-weight: bold;"></p>
            <tr>
                <td>11.</td>
                <td>Type of business/ business activity ? </td>
                <td>{!! Form::Text('' , null, ['class' => 'form-control']) !!}</td>
                <td></td>
            </tr>
            <tr>
                <td>12.</td>
                <td>Are you making more money with your business now than the money you were making before training?</td>
                <td>
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} Yes 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} No
                </td>
                <td></td>
            </tr>
            <tr>
                <td>13.</td>
                <td>How much money are you making a month through your business?</td>
                <td>
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} Yes 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} No
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td> Money earned last month</td>
                <td>{!! Form::Text('' , null, ['class' => 'form-control']) !!}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td> Money earned Months ago</td>
                <td>{!! Form::Text('' , null, ['class' => 'form-control']) !!}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td> Money earned Months ago</td>
                <td>{!! Form::Text('' , null , ['class' => 'form-control']) !!}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">If respondent cannot remember how much he/she has earned month by month in the last 3 months, ask about the TOTAL amount earned in the last 3 months:</td>
            </tr>
            <tr>
                <td></td>
                <td>Total</td>
                <td>
                    {!! Form::Checkbox('', null ,  ['class' => 'form-control']) !!} Riel 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} Dolla
                </td>
                <td></td>
            </tr>
            <tr>
                <td>14.</td>
                <td>Are you the main source of income in your household?</td>
                <td>
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} Riel 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} Dolla
                </td>
                <td></td>
            </tr>
            <tr>
                <td>15.</td>
                <td>Do you contribute with money to your household?</td>
                <td>
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} Riel 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} Dolla
                </td>
                <td></td>
            </tr>

            <tr>
                <td>16.</td>
                <td> If yes, what percentage (%) of your income do you give to your household?</td>
                <td>{!! Form::Text('' , null, ['class' => 'form-control']) !!}</td>
                <td></td>
            </tr>
            <tr>
                <td>17.</td>
                <td>Date you started your employment</td>
                <td>{!! Form::Text('' , null, ['class' => 'form-control']) !!}</td>
                <td></td>
            </tr>
            <tr>
                <td>18.</td>
                <td>Name of the enterprise</td>
                <td>{!! Form::Text('' , null, ['class' => 'form-control']) !!}</td>
                <td></td>
            </tr>
            <tr>
                <td>19.</td>
                <td>What is your position / activity at work? (e.g.tailor, food &amp; beverage server, room attendant,
                receptionist, motorbike repairer, hair dresser, etc.)</td>
                <td>{!! Form::Text('' , null, ['class' => 'form-control']) !!}</td>
                <td></td>
            </tr>
            <tr>
                <td>20.</td>
                <td>Do you have a contract? </td>
                <td>
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} Riel 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} Dolla
                </td>
                <td></td>
            </tr>

            <tr>
                <td>21.</td>
                <td>Have you received a promotion in the last 6 months?</td>
                <td>
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} Riel 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} Dolla
                </td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td>If yes, what was your previous position?</td>
                <td>
                    {!! Form::Text('', null , ['class' => 'form-control']) !!} 
                <td></td>
            </tr>
            <tr>
                <td>22.</td>
                <td>What was your salary before the promotion?</td>
                <td>
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} Riel 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} Dolla
                </td>
                <td></td>
            </tr>
            <tr>
                <td>23.</td>
                <td>What has been your monthly salary in the last 3 months? </td>
                <td>
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} Riel 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} Dolla
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Salary last month</td>
                <td>{!! Form::Text('' , null, ['class' => 'form-control']) !!}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td> Salary 2 Months ago</td>
                <td>{!! Form::Text('' , null, ['class' => 'form-control']) !!}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Salary 3 Months ago</td>
                <td>{!! Form::Text('' , null , ['class' => 'form-control']) !!}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">If you cannot remember how much you have earned month by month, think about the TOTAL amount earned in the last 3 months. </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <div class="form-group">
                        {!! Form::Label('', 'Total', ['class' => 'control-label col-lg-4']) !!}
                         {!! Form::Text('' , null , ['class' => 'form-control col-lg-4']) !!} </td>
                    </div>    
                <td>
                    {!! Form::Checkbox('', null ,  ['class' => 'form-control']) !!} Riel 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    {!! Form::Checkbox('', null , ['class' => 'form-control']) !!} Dolla
                </td>
                <td></td>
            </tr>

        </table>
    </div>
</div>    