<div class="col-lg-6">
    <table class="table table-responsive table-bordered">
     <tr>
        <td style="width:10px">10</td>
        <td colspan="4">Do you currently have job?</td>
     </tr>
     <tr>
        <td></td>
        <td>A. No, I am unemployed</td>
        <td colspan="3">{!! Form::Checkbox('I am unemployed', null , false) !!}</td>
     </tr>
     <tr>
        <td></td>
        <td colspan="4">If Unemployed, please choose from the following options that describe the reasons you are unemployed (multiple selection) </td>
     </tr>
     <tr>
        <td></td>
        <td>a. No job opportunities near my home </td>
        <td colspan="3"> {!! Form::Checkbox('No job opportunities near my home', null , false) !!}</td>
    </tr>
    <tr>
        <td></td>
        <td>b. Not enough skills to get a job </td>
        <td colspan="3">{!! Form::Checkbox('Not enough skills to get a job', null , false) !!}</td>
    </tr>
    <tr>
        <td></td>
        <td>c. No contacts/ network</td>
        <td colspan="3">{!! Form::Checkbox('No contacts network', null , false) !!}</td>
    </tr>
    <tr>
        <td></td>
        <td>d. No employment information</td>
        <td colspan="3">{!! Form::Checkbox('No employment information', null , false) !!}</td>
    </tr>
    <tr>
        <td></td>
        <td>e. No support to engage with enterprises/ with job opportunities</td>
        <td colspan="3">{!! Form::Checkbox('No support to engage', null , false) !!}</td>
    </tr>
    <tr>
        <td></td>
        <td>f. Family / Social Duties</td>
        <td colspan="3">{!! Form::Checkbox('Family social duties', null , false) !!}</td>
    </tr>
    <tr>
        <td></td>
        <td>g. Continue studying</td>
        <td colspan="3">{!! Form::Checkbox('Continued studying', null , false) !!}</td>
    </tr>
    <tr>
        <td></td>
        <td>h. Other</td>
        <td>{!! Form::Checkbox('Other reason for unemployment', null , false) !!}</td>
        <td colspan="2">{!! Form::Text('Other reason for unemployment' , null, ['class' => 'form-control' , 'placeholder' => 'Please specify' ]) !!}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4">End of survey if Unemployed, except if continue studying. If studying, go to question #35</td>
    </tr>
     <tr>
        <td></td>
        <td>B. Yes , I am employed</td>
        <td colspan="3">{!! Form::Checkbox('I am unemployed', null , false) !!}</td>
     </tr>
     <tr>
        <td style="width:10px"></td>
        <td colspan="4">If Employed, which type of employment do you have?</td>
     </tr>
     <tr>
        <td></td>
        <td>a. Self-employed</td>
        <td colspan="3">{!! Form::Checkbox('Self-employed', null , false) !!}</td>
     </tr>
     <tr>
        <td></td>
        <td>b. Wage employed with one employer</td>
        <td colspan="3">{!! Form::Checkbox('', null , false) !!}</td>
     </tr>
     <tr>
        <td></td>
        <td>c. Wage employed with more than one job</td>
        <td colspan="3">{!! Form::Checkbox('', null , false) !!}</td>
     </tr>
     <tr>
        <td></td>
        <td>d. Family business not receiving salary</td>
        <td colspan="3">{!! Form::Checkbox('', null , false) !!}</td>
     </tr>
     <tr>
        <td></td>
        <td>e. Other </td>
        <td>{!! Form::Checkbox('', null , false) !!}</td>
        <td colspan="2">{!! Form::Text('' , null, ['class' => 'form-control' , 'placeholder' => 'Please specify' ]) !!}</td>
        
     </tr>
     <tr>
        <td>11</td>
        <td>Type of business/ business activity ?</td>
        <td colspan="3">{!! Form::Text('Type of business' , null, ['class' => 'form-control']) !!}</td>
     </tr>
     <tr>
        <td>12</td>
        <td colspan="4">Are you making more money with your business now than the money you were making before training?</td>
     </tr>
    <tr>
        <td></td>
        <td>Yes  {!! Form::Checkbox('Making more money', null , false) !!}</td>
        <td colspan="3">No  {!! Form::Checkbox('Making more money', null , false) !!}</td>
    </tr>
    <tr>
        <td>13</td>
        <td colspan="4">How much money are you making a month through your business? </td>
    </tr>
    <tr>
        <td></td>
        <td>Riel  {!! Form::Checkbox('', null , false) !!}</td>
        <td colspan="3">USD  {!! Form::Checkbox('', null , false) !!}</td>
    </tr>
    <tr>
        <td></td>
        <td>Money earned last month</td>
        <td colspan="3">{!! Form::Text('Money earned last month' , null, ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td></td>
        <td>Money earned Months ago</td>
        <td colspan="3">{!! Form::Text('' , null, ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td></td>
        <td>Money earned Months ago</td>
        <td colspan="3">{!! Form::Text('' , null, ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="4">If respondent cannot remember how much he/she has earned month by month in the last 3 months, ask about the TOTAL amount earned in the last 3 months:</td>
    </tr>
    <tr>
        <td></td>
        <td>Total</td>
        <td>{!! Form::Text('' , null , ['class' => 'form-control']) !!}</td>
        <td>Riel  {!! Form::Checkbox('', null , false) !!}</td>
        <td>USD  {!! Form::Checkbox('', null , false) !!}</td>
    </tr>
    <tr>
        <td>14</td>
        <td>Are you the main source of income in your household?</td>
        <td>Riel {!! Form::Checkbox('Are you the main source of income in your household', null , false) !!}</td>
        <td colspan="2">USD {!! Form::Checkbox('Are you the main source of income in your household', null , false) !!}</td>
    </tr>
    <tr>
        <td>15</td>
        <td>Do you contribute with money to your household?</td>
        <td>Riel {!! Form::Checkbox('Do you contribute with money to your household', null , false) !!}</td>
        <td colspan="2">USD {!! Form::Checkbox('Do you contribute with money to your household', null , false) !!}</td>
    </tr>
    <tr>
        <td>16</td>
        <td>If yes, what percentage (%) of your income do you give to your household?</td>
        <td colspan="3">{!! Form::Text('If yes, what percentage' , null, ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td>17</td>
        <td>Date you started your employment</td>
        <td colspan="3">{!! Form::Date('Date you started your employment' , null, ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td>18</td>
        <td>Name of the enterprise </td>
        <td colspan="3">{!! Form::Text('Name of the enterprise' , null, ['class' => 'form-control']) !!}</td>
    </tr>
    <tr>
        <td>19</td>
        <td>What is your position/ activity at work? (e.g. tailor, food & beverage server, room attendant, receptionist, motorbike repairer, hair dresser, etc.) </td>
        <td colspan="3">{!! Form::Text('What is your position' , null, ['class' => 'form-control']) !!}</td>
    </tr>
    </table>
</div>
<div class="col-md-6">
    <table class="table table-responsive table-bordered">
        
        <tr>
            <td>20</td>
            <td>Do you have a contract? </td>
            <td>Yes {!! Form::Checkbox('Do you have a contract', null , false) !!} </td>
            <td>No  {!! Form::Checkbox('Do you have a contract', null , false) !!} </td>
        </tr>
        <tr>
            <td>21</td>
            <td>Have you received a promotion in the last 6 months? </td>
            <td>Yes {!! Form::Checkbox('Have you received a promotion in the last 6 months', null , false) !!}  </td>
            <td>No  {!! Form::Checkbox('Have you received a promotion in the last 6 months', null , false) !!}  </td>
        </tr>
        <tr>
            <td>22</td>
            <td>If yes, what was your previous position?</td>
            <td colspan="2">{!! Form::Text('If yes, what was your previous position', null , ['class' => 'form-control']) !!} </td>
        </tr>
        <tr>
            <td></td>
            <td>What was your salary before the promotion?</td>
            <td>{!! Form::Text('What was your salary before the promotion', null , ['class' => 'form-control']) !!} </td>
            <td>
                Riel {!! Form::Checkbox('', null , false) !!}
                USD {!! Form::Checkbox('', null , false) !!}    
            </td>
        </tr>
        <tr>
            <td>23</td>
            <td>What has been your monthly salary in the last 3 months?   Please ask about the salary earned month by month in the last 3 months</td>
            <td>{!! Form::Checkbox('Money earned 3 months ago', null , false) !!}</td>
            <td>{!! Form::Checkbox('Money earned 3 months ago', null , false) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>Salary last month</td>
            <td colspan="2">{!! Form::Text('Money earned last month' , null, ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>Salary 2 Months ago</td>
            <td colspan="2">{!! Form::Text('Money earned 2 months ago' , null, ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>Salary 3 Months ago</td>
            <td colspan="2">{!! Form::Text('' , null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>OR If you cannot remember how much you have earned month by month, think about the TOTAL amount earned in the last 3 months.</td>
            <td>{!! Form::Text('Or total' , null , ['class' => 'form-control']) !!}</td>
            <td>
                Riel {!! Form::Checkbox('', null , false) !!}
                USD {!! Form::Checkbox('', null , false) !!}
            </td>
        </tr>
        <tr>
            <td>24</td>
            <td>How much money do you receive in tips on average a month? </td>
            <td>Riel {!! Form::Checkbox('', null , false) !!}</td>
            <td>USD {!! Form::Checkbox('', null , false) !!}</td>
        </tr>
        <tr>
            <td>25</td>
            <td>Do you receive transport support?</td>
            <td>Yes  {!! Form::Checkbox('Do you receive transport support', null , false) !!}</td>
            <td>No {!! Form::Checkbox('Do you receive transport support', null , false) !!}</td>
        </tr>
        <tr>
            <td>26</td>
            <td>Do you receive food support?</td>
            <td>Yes  {!! Form::Checkbox('Do you receive food support', null , false) !!}</td>
            <td>No {!! Form::Checkbox('Do you receive food support', null , false) !!}</td>
        </tr>
        <tr>
            <td>27</td>
            <td>Do you receive accommodation support?</td>
            <td>Yes  {!! Form::Checkbox('Do you receive accommodation support', null , false) !!}</td>
            <td>No {!! Form::Checkbox('Do you receive accommodation support', null , false) !!}</td>
        </tr>
        <tr>
            <td>28</td>
            <td>How much time do you work? </td>
            <td>Hours/Day {!! Form::Text('Hours per day', null , ['class' => 'form-control']) !!} </td>
            <td>Day/Week {!! Form::Text('Days worked per week', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>29</td>
            <td>Do you get paid for extra hours (hours outside the normal working schedule)</td>
            <td>Yes  {!! Form::Checkbox('Do you get paid for extra hours', null , false) !!}</td>
            <td>No {!! Form::Checkbox('Do you get paid for extra hours', null , false) !!}</td>
        </tr>
        <tr>
            <td>30</td>
            <td>Are you the main source of income in your household?</td>
            <td>Yes  {!! Form::Checkbox('Are you the main source of income in your household', null , false) !!}</td>
            <td>No {!! Form::Checkbox('Are you the main source of income in your household', null , false) !!}</td>
        </tr>
        <tr>
            <td>31</td>
            <td>Do you contribute with money to your household?</td>
            <td>Yes  {!! Form::Checkbox('Do you contribute with money to your household', null , false) !!}</td>
            <td>No {!! Form::Checkbox('Do you contribute with money to your household', null , false) !!}</td>
        </tr>
        <tr>
            <td>32</td>
            <td>If yes, Ask how much the graduate gives to the household. Then based on how much money graduate makes, calculate:what percentage (%) of your income do you give to your household?</td>
            <td colspan="2">{!! Form::Text('' , null, ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>33</td>
            <td colspan="3">How satisfied are you with your current working conditions? Please give a score from 1 to 10 how satisfied you feel with the following points: 1= very dissatisfied minimum score, and 10= very satisfied maximum score</td>
        </tr>
        <tr>
            <td></td>
            <td>a. Working hours & free time</td>
            <td colspan="2">{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>b.	Safe working environment </td>
            <td colspan="2">{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>c.	Respectful and fair treatment </td>
            <td colspan="2">>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>d.	Working relationship with the employer and colleagues</td>
            <td colspan="2">>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>34</td>
            <td colspan="3">How satisfied are you with the benefits in your current job? Please give a score from 1 to 10 how satisfied you feel with the following points: 1= very dissatisfied minimum score, and 10= very satisfied maximum score</td>
        </tr>
        <tr>
            <td></td>
            <td>a.	Salary </td>
            <td colspan="2">{!! Form::Text('Salary', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>b. Payment for extra hours</td>
            <td colspan="2">{!! Form::Text('Payment for extra hours', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>c.	Food support </td>
            <td colspan="2">{!! Form::Text('food support', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>d.	Accommodation support </td>
            <td colspan="2">>{!! Form::Text('Accom support', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>e.	Transport support </td>
            <td colspan="2">>{!! Form::Text('Transport support', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3">If unemployed because continue studying</td>
        </tr>
        <tr>
            <td>35</td>
            <td>What is the topic of the course?</td>
            <td colspan="2">>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>36</td>
            <td>Course duration</td>
            <td colspan="2">>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
        </tr>
        <tr>
            <td>37</td>
            <td>Name of training institution</td>
            <td colspan="2">>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
        </tr>

    </table>
</div>
