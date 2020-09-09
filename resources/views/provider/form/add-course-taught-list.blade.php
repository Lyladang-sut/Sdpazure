<div class="panel-body">
    {{ Form::open(array('url' => 'foo/bar',"class"=>"form-horizontal")) }}
            <div class="form-group">
                {!! Form::Label('Course Taught in SDP', 'វគ្គដែលបានបង្រៀន ក្នុង (SDP)/Course Taught in SDP', ['class' => 'control-label col-lg-5']) !!}
                <div class="col-lg-6">
                    {!! Form::Select('Course Taught in SDP',[], null, ['class' => 'form-control']) !!}
                </div>
            </div>
    {{ Form::close() }}
</div>