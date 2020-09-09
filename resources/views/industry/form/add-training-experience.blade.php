<div class="panel-body">
    <div class="row">
        <p>តើប្រធានបទបណ្តុះបណ្តាលអ្វីខ្លះដែលអ្នកធ្លាប់បានផ្តល់</p>
        <div class="form-group required">
            {!! Form::Label('Training provided', 'Training provided', ['class' => 'control-label col-lg-3']) !!}
            <div class="col-lg-6">
                {!! Form::Text('Training provided', null, ['required' => 'required', 'class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="panel-body text-right">
        <button type="button" data-style="expand-down" class="btn btn-raised btn-default ladda-button" data-dismiss="modal"><span class="ladda-label">Cancel</span><span class="ladda-spinner"></span></button>
        <button data-style="expand-left" class="btn btn-raised btn-success ladda-button"><span class="ladda-label">Submit Data</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
    </div>
</div>
