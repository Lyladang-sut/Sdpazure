{{ Form::open(array('url' => 'foo/bar',"class"=>"form-horizontal")) }}
<div class="widget">
    <div class="widget-heading">
        <h4 class="widget-title">Post Training Support 1</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-8">
            
                <div class="form-group">
                    {!! Form::Label('DatePTS', 'ការគាំទ្រកាលបរិច្ឆេទត្រូវបានផ្តល់ជូន/ Date support provided', ['class' => 'control-label col-lg-8']) !!}
                    <div class="col-lg-4">
                        {!! Form::Date('DatePTS', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('Topic', 'ប្រភេទនៃការគាំទ្រដែលបានផ្តល់/ Type of support provided', ['class' => 'control-label col-lg-8']) !!}
                    <div class="col-lg-4">
                        {!! Form::Select('Topic', $dimSupportTypes, null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <h4 style="padding-top:10px; padding-bottom:10px;">ប្រសិនបើអ្នកផ្តល់ការគាំទ្រផ្នែកហិរញ្ញវត្ថុ សូមបញ្ជូលទឹកប្រាក៉/ If financial support is provided, please enter the amount</h4>

                <div class="form-group">
                    {!! Form::Label('Amount $', 'ចំនួនទឹកប្រាក់ (ដុល្លារ) / Amount $', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Text('Amount $', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::Label('If money use', 'គោលចំណងនៃកាប្រើប្រាស់ទឹកប្រាក់/Describe how the money will be used', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::TextArea('If money use', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            
            </div>
        </div>

    </div>
</div>
{!! Form::close() !!}