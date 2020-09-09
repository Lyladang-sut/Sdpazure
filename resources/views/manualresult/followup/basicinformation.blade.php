<div class="panel-group panel-group-control panel-group-control-right content-group-lg" id="accordion-control-right">
    <div class="panel panel-white col-md-6">
        <div class="panel-heading">
            <h6 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion-control-right" href="#accordion-control-right-group1" aria-expanded="true" class="">Accordion Item #1</a>
            </h6>
        </div>
        <div id="accordion-control-right-group1" class="panel-collapse collapse in" aria-expanded="true" style="">
            <div class="panel-body">
                <table class="table-custom">
                    <tr>
                        <td>1</td>                        
                        <td><b>Family Name</b></td>
                        <td>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td>2</td>                       
                        <td><b>Name</b></td>
                        <td>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td>3</td>                       
                        <td><b>Course code graduate participate in</b></td>
                        <td>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td>4</td>                      
                        <td><b>Date follow up</b></td>
                        <td>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
                    </tr>
                    <tr>
                        <td>5</td>                      
                        <td><b>Are you able to contact the graduate?</b></td>
                        <td>
                            <div class="col-md-3">
                                Yes {!! Form::Checkbox('', 1, false) !!}
                            </div>
                            <div class="col-md-3">
                                No {!! Form::Checkbox('', 1, false) !!}
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><b>If not able to reach, give reason why</b></td>
                        <td>{!! Form::Text('', null , ['class' => 'form-control']) !!}</td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>

    <div class="panel panel-white col-md-8">
        <div class="panel-heading">
            <h6 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion-control-right" href="#accordion-control-right-group2" aria-expanded="false">Accordion Item #2</a>
            </h6>
        </div>
        <div id="accordion-control-right-group2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <div class="panel-body">
            @include('manualresult.followup.transitiontoemployment')  
            </div>
        </div>
    </div>

    <div class="panel panel-white col-md-8">
        <div class="panel-heading">
            <h6 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion-control-right" href="#accordion-control-right-group3" aria-expanded="false">Accordion Item #3</a>
            </h6>
        </div>
        <div id="accordion-control-right-group3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
            <div class="panel-body">
                3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it.
            </div>
        </div>
    </div>
</div>
