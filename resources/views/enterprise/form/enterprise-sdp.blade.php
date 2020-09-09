<div class="widget">
    <div class="panel-body">
        <div class="col-md-8">
            <h4>ទំនាក់ទំនងសហគ្រាសជាមួយកម្មវិធីSDP /Enterprise Connection with SDP</h4>
            <p class="text-danger">ក្នុងផ្នែកនេះយើងចង់ដឹងចា សហគ្រាសមានទំនាន់ទំនងដូចម៉្ដេចជាមួយ SDP /In this section we want to know how the enterprise is connected to SDP</p>
            <div class="form-group">
                {!! Form::Label('Enterprise involved in SDP training', '៧. តើសហគ្រាសបណ្តុះបណ្តាលជំនាញសម្រាប់កម្មវិធីSDPទេ?/ Is enterprise offering skills training in SDP?', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Select('Enterprise involved in SDP training', $yes_no, null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::Label('EntIntervention', 'ប្រសិនមាន សូមវាយលេខសម្គាល់/ If yes, please select the Intervention Area and Delivery Channel (IADC) the enterprise is engaged with', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Select('EntIntervention', $yes_no, null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('Hired graduates', '៨. តើសហគ្រាសត្រូវការជួលសិក្ខាកាមដែលបានបញ្ចប់ការសិក្សាដែរឬទេ/Did enterprise hire a graduate?', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Select('Hired graduates', $yes_no, null, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::Label('RPL participant', 'តើបុគ្គលិកបានចូលរួមក្នុងការវាយតម្លៃ RPL ដែលឬទេ?/Did staff member(s) participate in RPL assessment?', ['class' => 'control-label col-lg-6']) !!}
                <div class="col-lg-6">
                    {!! Form::Select('RPL participant',$yes_no, null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</div>