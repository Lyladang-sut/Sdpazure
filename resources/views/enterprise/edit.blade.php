@extends('app') @section('title') EDIT ENTERPRISE #{{ $enterprise->ID }} @endsection @section('content')

  


<div class="modal fade" id="modalEmployment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-views">
        <div class="modal-content load-modal-form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="gridModalLabel">Enterprise Employment</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal tot-modal-form" data-vv-scope="employee">
                    <div class="form-group required" :class = "{'has-error': errors.has('employee.Position') }">
                        {!! Form::Label('Position', 'មុខតំណែង/Position', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Position', null, [ 'v-model' => 'employment["Position"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group required" :class = "{'has-error': errors.has('employee.How Many') }">
                        {!! Form::Label('How Many', 'How Many', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Number('How Many', null, [ 'v-model' => 'employment["How Many"]', 'v-validate' => "'required|numeric'", 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('Comments', 'មតិយោបល់/Comments', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Comments', null, [ 'v-model' => 'employment["Comments"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-primary" @click="saveEmployment(employment.index)">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-views">
        <div class="modal-content load-modal-form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="gridModalLabel">Enterprise Contact</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal tot-modal-form" data-vv-scope="contact">
                    <div class="form-group required" :class = "{'has-error': errors.has('contact.Family Name') }">
                        {!! Form::Label('Family Name', 'តោត្តនាម/Family Name', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Family Name', null, ['v-model' => 'contact["Family Name"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group required" :class = "{'has-error': errors.has('contact.First Name') }">
                        {!! Form::Label('First Name', 'នាម/First Name', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('First Name', null, ['v-model' => 'contact["First Name"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('Position', 'មុខតំណែង/Position', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Position', null, ['v-model' => 'contact["Position"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::Label('Phone Number', 'លេខទូរសព្ទ/phone Number', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Phone Number', null, ['v-model' => 'contact["Phone Number"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group" :class = "{'has-error': errors.has('contact.Email') }">
                        {!! Form::Label('Email', 'អ៊ីម៉ែល/Email', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Email', null, ['v-model' => 'contact["Email"]', 'v-validate' => "'email'", 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-primary" @click="saveContact(contact.index)">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAssessor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-views" style="width:75%">
        <div class="modal-content load-modal-form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="gridModalLabel">Assesors</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal tot-modal-form" data-vv-scope="assessor">
                    <div class="col-md-5">
                        <div class="form-group required" :class = "{'has-error': errors.has('assessor.First name') }">
                            {!! Form::Label('First name', 'នាម/First name', [ 'class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Text('First name', null, ['v-model' => 'assessor["First name"]' ,'v-validate' => "'required'", 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group required" :class = "{'has-error': errors.has('assessor.Date of birth') }">
                            {!! Form::Label('Date of birth', 'ថ្ងៃ ខែ ឆ្នាំ កំណើត/Date of birth', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::date('Date of birth', null, ['v-model' => 'assessor["Date of birth"]' , 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                            </div>
                        </div>
                      
                        <div class="form-group required" :class = "{'has-error': errors.has('assessor.Province') }">
                            {!! Form::Label('Province', 'ខេត្ត/Province', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select id="Province" name="Province" class="form-control" v-validate="'required'" v-model='assessor["Province"]'>
                                    <option v-for="option in ta_provinces[assessor['Country']]" v-bind:value="option['Province']" >@{{ option['Province'] }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group required" :class = "{'has-error': errors.has('assessor.Sex') }">
                            {!! Form::Label('Sex', 'ភេទ/Sex', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Sex', $sex , null, ['v-model' => 'assessor["Sex"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Email', 'អ៊ីម៉ែល/Email', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Text('Email', null, ['v-model' => 'assessor["Email"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Contact 1', 'អ្នកទំនាក់ទំនង១/Contact 1', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Text('Contact 1', null, ['v-model' => 'assessor["Contact 1"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Trainer of Assesors', 'Trainer of Assesors', ['class' => 'control-label col-lg-9']) !!}
                            <div>
                                <input type="checkbox" true-value="1" false-value="0" v-model="assessor['Trainer of Assesors']" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group required" :class = "{'has-error': errors.has('assessor.Last name') }">
                            {!! Form::Label('Last name', 'គោត្តនាម/Last name', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Text('Last name', null, ['v-model' => 'assessor["Last name"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group required" :class = "{'has-error': errors.has('assessor.Country') }">
                            {!! Form::Label('Country', 'ប្រទេស/Country', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select id="Country" name="Country" class="form-control" data-live-search="true" v-validate="'required'" v-model='assessor["Country"]'>
                                    <option v-for="option in ta_countries" v-bind:value="option['Country']" >@{{ option['Country'] }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group required" :class = "{'has-error': errors.has('assessor.District') }">
                            {!! Form::Label('District', 'ស្រុក/District', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select id="District" name="District" class="form-control" v-validate="'required'" v-model='assessor["District"]'>
                                    <option v-for="option in ta_districts[assessor['Province']]" v-bind:value="option['ID']" >@{{ option['District'] }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Last year of School', 'កំរិតវប្បធម៌/Last year of School', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Last year of School', $last_grade , null, ['v-model' => 'assessor["Last year of School"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Phone number', 'លេខទូរសព្ទ/Phone number', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Text('Phone number', null, ['v-model' => 'assessor["Phone number"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Contact 1 Number', 'លេខទូរសព្ទ ១/Contact 1 Number', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Text('Contact 1 Number', null, ['v-model' => 'assessor["Contact 1 Number"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">                    
                            
                            <img v-show="!assessor['Photo']" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAZAAAAGQCAYAAACAvzbMAAAeGElEQVR4Xu3drY9lWdXH8TuSBAcJoYPCgEP0OMCQ8A+AQPBiSECQTEKC4x2C4yUhBIcCBEHiMYCaRoyZgCGYZtQk48ANOdVzq6urq+qel/221v60eaanz9l77e9vnfXtc2/NwytPnjx598Mf/vDJLwQQQAABBNYSeOutt06vPH369N3lHx4/frz2PtchgAACCExM4O9///vp0aNHzwSy/MPyL0hk4o5wdAQQQGAFgbMrrt9AFoEsv0hkBT2XIIAAApMSuOmIlwRCIpN2hWMjgAACFwjcfsG4UyAkoo8QQAABBG4SuOvTqXsFQiKaBwEEEEDgIRc8KBAS0TwIIIDA3AQe+l78okBIZO7mcXoEEJiXwKUfqlolEBKZt4GcHAEE5iRwSR4LldUCIZE5m8ipEUBgPgJr5LFZICQyXyM5MQIIzEVgrTx2CYRE5momp0UAgXkIbJHHboGQyDwN5aQIIDAHga3yOCQQEpmjqZwSAQTyE9gjj8MCIZH8jeWECCCQm8BeeRQRCInkbi6nQwCBvASOyKOYQEgkb4M5GQII5CRwVB5FBUIiOZvMqRBAIB+BEvIoLhASyddoToQAArkIlJJHFYGQSK5mcxoEEMhDoKQ8qgmERPI0nJMggEAOAqXlUVUgJJKj6ZwCAQTiE6ghj+oCIZH4jecECCAQm0AteTQRCInEbj7VI4BAXAI15dFMICQStwFVjgACMQnUlkdTgZBIzCZUNQIIxCPQQh7NBUIi8RpRxQggEItAK3l0EQiJxGpG1SKAQBwCLeXRTSAkEqchVYoAAjEItJZHV4GQSIymVCUCCIxPoIc8uguERMZvTBUigMDYBHrJYwiBkMjYzak6BBAYl0BPeQwjEBIZt0FVhgACYxLoLY+hBEIiYzapqhBAYDwCI8hjOIGQyHiNqiIEEBiLwCjyGFIgJDJWs6oGAQTGITCSPIYVCImM07AqQQCBMQiMJo+hBUIiYzStKhBAoD+BEeUxvEBIpH/jqgABBPoSGFUeIQRCIn2b1+4IINCPwMjyCCMQEunXwHZGAIE+BEaXRyiBkEifJrYrAgi0JxBBHuEEQiLtG9mOCCDQlkAUeYQUCIm0bWa7IYBAOwKR5BFWICTSrqHthAACbQhEk0dogZBIm6a2CwII1CcQUR7hBUIi9RvbDgggUJdAVHmkEAiJ1G1uqyOAQD0CkeWRRiAkUq/BrYwAAnUIRJdHKoGQSJ0mtyoCCJQnkEEe6QRCIuUb3YoIIFCWQBZ5pBQIiZRtdqshgEA5ApnkkVYgJFKu4a2EAAJlCGSTR2qBkEiZprcKAggcJ5BRHukFQiLHG98KCCBwjEBWeUwhEBI51vzuRgCB/QQyy2MagZDI/gfAnQggsI9AdnlMJRAS2fcQuAsBBLYTmEEe0wmERLY/CO5AAIFtBGaRx5QCIZFtD4OrEUBgPYGZ5DGtQEhk/QPhSgQQWEdgNnlMLRASWfdQuAoBBC4TmFEe0wuERC4/GK5AAIGHCcwqDwJ5ry9mbgDDAQEE9hOYfXa89dZbp1eePn367qNHj/ZTTHDn7I2QIEJHQKApATPjdCKQGy2nIZo+fzZDICwBs+JZdARyq4U1RthnWuEINCFgRjzHTCB3tJwGafIc2gSBcATMhhcjI5B7WlijhHu2FYxAVQJmwst4CeSBltMwVZ9HiyMQhoBZcHdUBHKhhTVOmGdcoQhUIWAG3I+VQFa0nAZaAcklCCQk4Nl/OFQCWdn0GmklKJchkISAZ/5ykARymdH1FRpqAyyXIhCYgGd9XXgEso4TiWzk5HIEohIgj/XJEch6ViSyg5VbEIhEgDy2pUUg23iRyE5ebkNgdALksT0hAtnOjEQOMHMrAiMSII99qRDIPm4kcpCb2xEYhQB57E+CQPazI5EC7CyBQE8C5HGMPoEc40cihfhZBoHWBMjjOHECOc6QRAoytBQCLQiQRxnKBFKGI4kU5mg5BGoRII9yZAmkHEsSqcDSkgiUJEAeJWn6XyQsS/PGahq1GloLI7CLgGdyF7YHb/IGUp6pN5GKTC2NwB4C5LGH2uV7COQyo0NXaNxD+NyMwGECnsHDCO9dgEDqsfUm0oCtLRB4iAB51O0PAqnLl0Qa8bUNArcJkEf9niCQ+oxJpCFjWyGwECCPNn1AIG04k0hjzrablwB5tMueQNqxJpEOrG05FwHyaJs3gbTlTSKdeNs2PwHyaJ8xgbRnTiIdmds6JwHy6JMrgfThTiKduds+DwHy6JclgfRjTyIDsFdCbALk0Tc/AunLn0QG4a+MeATIo39mBNI/AxIZKAOlxCBAHmPkRCBj5EAig+WgnHEJkMc42RDIOFmQyIBZKGksAuQxVh4EMlYeJDJoHsrqT4A8+mdwuwICGS8TEhk4E6X1IUAefbhf2pVALhHq/OcenM4B2L47Ac9A9wjuLYBAxs3Gm0iAbJRYlwB51OV7dHUCOUqw0f0epEagbTMMAT0/TBTeQMaP4nKFHqjLjFyRg4Bej5GjN5AYOfk4K1hOyt1PgDz2s2t9J4G0Jl5gPw9YAYiWGJKA3h4yFh9hxYrlcrUetMuMXBGLgJ6OlddSrTeQeJn5OCtwZkq/mwB5xOwMAomZG4kEz035zwmQR9xuIJC42ZFIguxmPwJ5xO4AAomdH4kkyW/GY5BH/NQJJH6GJJIow1mOQh45kiaQHDmSSLIcMx+HPPKkSyB5siSRhFlmOxJ55EqUQHLlSSJJ88xwLPLIkOKLZyCQfJmSSOJMox6NPKIm93DdBJIzVxJJnmuk45FHpLS21Uog23iFvNoDHDK2FEXrvRQx3nsIAsmdrzeRSfId8ZjkMWIqZWsikLI8h17NAz10PKmK02up4vQGMkecl0/pwb7MyBXHCOixY/wi3e0NJFJahWr1gBcCaZmXCOituZqCQObK23cik+bd4tjk0YLyWHsQyFh5NK3GA98Ud+rN9FLqeH0HMme8l0/twb/MyBUPE9BD83aIN5B5s/dxluwPEyCPwwhDL0AgoeMrV7xBUI7lLCvpmVmSvv+cBKIHvInogc0EyGMzspQ3EEjKWPcfymDYz26WO/XILElfPieBXGY03RUGxHSRrz6w3liNaooLCWSKmLcf0qDYziz7HXoie8Lbz0cg25lNc4eBMU3UFw+qFy4imvICApky9vWHNjjWs8p6pR7ImuzxcxHIcYbpVzBA0kd87wFlP2/2a05OIGsoueZkkMzXBDKfL/OtJyaQrcQmvt5AmSd8Wc+T9ZGTEsgRehPea7DkD13G+TMudUICKUVyonUMmLxhyzZvtjVORiA1qE6wpkGTL2SZ5su09okIpDbhxOsbOHnClWWeLFuehEBa0k64l8ETP1QZxs+w1wkIpBf5RPsaQHHDlF3c7EaonEBGSCFBDQZRvBBlFi+z0SomkNESCVyPgRQnPFnFyWrkSglk5HQC1mYwjR+ajMbPKEqFBBIlqUB1GlDjhiWbcbOJWBmBREwtQM0G1XghyWS8TKJXRCDRExy4fgNrnHBkMU4WmSohkExpDngWg6t/KDLon0HWCggka7IDncsA6xcG9v3Yz7AzgcyQ8gBnNMjah4B5e+az7UggsyXe8bwGWjv4WLdjPfNOBDJz+h3ObrDVh45xfcZ2eEaAQHRCcwIGXD3k2NZja+WXCRCIruhCwKArjx3T8kyt+DABAtEh3QgYeOXQY1mOpZXWEyCQ9axcWYGAwXccKobHGVphHwEC2cfNXQUJGID7YWK3n507jxMgkOMMrVCAgEG4HSJm25m5oywBAinL02oHCBiI6+FhtZ6VK+sRIJB6bK28g4DBeBkaRpcZuaINAQJpw9kuGwgYkPfDwmZDI7m0OgECqY7YBnsIGJQvU8NkTye5pyYBAqlJ19qHCBiYz/FhcaiV3FyJAIFUAmvZMgQMztMJgzK9ZJXyBAikPFMrFiYw8wCd+eyF28hyFQgQSAWolixPYMZBOuOZy3eOFWsSIJCadK1dlMBMA3WmsxZtEos1JUAgTXHb7CiBGQbrDGc82gfuH4MAgYyRgyo2EMg8YDOfbUPELg1CgECCBKXMFwlkHLQZz6RvcxMgkNz5pj5dpoGb6Sypm87hXiBAIBoiNIEMgzfDGUI3keJ3EyCQ3ejcOAqByAM4cu2j5K+OfgQIpB97OxckEHEQR6y5YGSWSkCAQBKE6AjPCEQayJFq1V8I3EeAQPRGKgIRBnOEGlM1hcNUI0Ag1dBauBeBkQf0yLX1ysu+cQkQSNzsVP4AgREH9Yg1aSIEjhAgkCP03Ds0gZEG9ki1DB2a4kIRIJBQcSl2K4ERBvcINWzl5noE1hAgkDWUXBOaQM8B3nPv0KEpPgQBAgkRkyKPEugxyHvseZST+xHYQoBAttBybWgCLQd6y71Ch6L40AQIJHR8it9KoMVgb7HH1nO7HoEaBAikBlVrDk2g5oCvufbQUBU3JQECmTJ2h64x6GusKSkERiZAICOno7aqBEoO/JJrVT20xREoSIBACsK0VDwCJQZ/iTXikVMxAqcTgeiC6QkcEcCRe6cHD0B4AgQSPkIHKEFgjwj23FOiVmsgMAoBAhklCXV0J7BFCFuu7X4wBSBQiQCBVAJr2ZgE1ohhzTUxT69qBLYRIJBtvFw9AYGHBEEeEzSAI64mQCCrUblwJgJ3iYI8ZuoAZ11DgEDWUHLNlARuCoM8pmwBh75AgEC0CAIPEFjEsfx6/PgxTgggcIsAgWgJBAhEDyCwiwCB7MLmphkI+AhrhpSd8QgBAjlCz71pCfgSPW20DlaQAIEUhGmpHAT8GG+OHJ2iPgECqc/YDoEIrPlpqzXXBDqyUhHYTYBAdqNzYzYCW8Sw5dpsnJwHgTMBAtELCJxOpz1C2HMP2AhkIkAgmdJ0ll0EjojgyL27inUTAgMRIJCBwlBKewIlBFBijfYntyMCxwkQyHGGVghKoOTgL7lWUJzKnpAAgUwYuiPv+87jEjcSuUTIn2cjQCDZEnWeiwRqDvqaa188mAsQaEyAQBoDt11fAi0GfIs9+lK0OwLPCBCITpiGQMvB3nKvaQJ00OEIEMhwkSioBoEeA73HnjXYWROB+wgQiN5IT6DnIO+5d/pgHbA7AQLpHoECahIYYYCPUENNxtaelwCBzJt9+pOPNLhHqiV98A7YjACBNENto5YERhzYI9bUMhN75SNAIPkynf5EIw/qkWubvnEA2EyAQDYjc8PIBCIM6Ag1jpyx2sYhQCDjZKGSgwQiDeZItR6Mxe2JCRBI4nBnOlrEgRyx5pl6ylkvEyCQy4xcMTiByIM4cu2Dt4XyGhAgkAaQbVGPQIYBnOEM9RK28sgECGTkdNT2IIFMgzfTWbTtPAQIZJ6sU50048DNeKZUTecwLxEgEE0RjkDmQZv5bOEaTcEXCRDIRUQuGInADAN2hjOO1FNq2U+AQPazc2djAjMN1pnO2riNbFeQAIEUhGmpegRmHKgznrleB1m5BgECqUHVmkUJzDxIZz570SayWBUCBFIFq0VLETBATycMSnWTdUoTIJDSRK1XjIDB+RwlFsXaykIFCRBIQZiWKkfAwHyZJSbl+stKZQgQSBmOVilIwKC8HyY2BRvNUocJEMhhhBYoScCAvEwTo8uMXNGGAIG04WyXFQQMxhWQ3rsEq/WsXFmPAIHUY2vlDQQMxA2wSGQ7LHdUIUAgVbBadAsB8thC68VrsdvPzp3HCRDIcYZWOEDAADwAz5vIcXhWOESAQA7hc/MRAuRxhJ43kXL0rLSXAIHsJee+QwTI4xC+O2/GtDxTKz5MgEB0SHMCBl095NjWY2vllwkQiK5oSsCAq48b4/qM7fCMAIHohGYEDLZmqP0/YGyHeuqdCGTq+NsdnjzasT7vhHl75rPtSCCzJd7hvAZZB+jvbYl9P/Yz7EwgM6Tc8YwGWEf4JNIffvIKCCR5wD2PRx496b+4tyzGySJTJQSSKc2BzmJgDRSGN5HxwkhSEYEkCXKkY5DHSGl4Exk3jfiVEUj8DIc6AXkMFcedxcho/IyiVEggUZIKUKfBFCAkH2fFCSlApQQSIKQIJZJHhJR8nBUvpbErJpCx8wlRHXmEiMnHWXFjGrZyAhk2mhiFkUeMnB6qUobxM+x1AgLpRT7BvgZPghB9J5InxA4nIZAO0DNsSR4ZUvSdSL4U256IQNryTrEbeaSI0XcieWNsdjICaYY6x0bkkSNH34nkz7HFCQmkBeUke5BHkiBXHEPWKyC5xP+glB5YR8BAWccp01Uyz5RmnbN4A6nDNdWqBkmqODcdRvabcE13MYFMF/m2Axsg23hlvFoPZEy1zJkIpAzHlKsYHClj3XUovbALW/qbCCR9xPsOaGDs45b5Lj2ROd19ZyOQfdxS32VQpI730OH0xiF86W4mkHSRHjuQAXGM3wx365EZUl53RgJZx2mKqwyGKWIucki9UgRj+EUIJHyEZQ5gIJThONMqemamtO8+K4HogZNBoAn2EtA7e8nluI9AcuS4+xQGwG50bnyPgB6atxUIZN7svXlMnH3po5NIaaIx1iOQGDkVr9IDXxzp9AvqqflagEDmy9ybx4SZtzoyibQiPcY+BDJGDs2q8IA3Qz3tRnpsnugJZJ6svXlMlHXvo5JI7wTa7E8gbTh338UD3T2C6QrQc/kjJ5D8GXvzmCDjUY9IIqMmU6YuAinDcdhVPMDDRjNNYXowb9QEkjdbbx6Js412NBKJlti6eglkHadwV3lgw0WWvmA9mS9iAsmXqTePhJlmORKJZEny2TkIJFee5JEsz4zHIZE8qRJInizJI1GW2Y9CIjkSJpAcOZJHkhxnOgaJxE+bQOJnSB4JMpz1CCQSO3kCiZ0feQTPT/knPRy4CQgkcHj+9hY4PKW/QEAvx2wIAomZm7+1Bc1N2fcTIJF43UEg8TIjj4CZKXkdARJZx2mUqwhklCRW1uEBWwnKZWEJ6PE40RFInKy8eQTKSqnHCJDIMX6t7iaQVqQP7uOBOgjQ7eEI6PnxIyOQ8TPy5hEgIyXWIUAidbiWWpVASpGstI4HqBJYy4Yh4BkYNyoCGTcbbx4DZ6O0tgRIpC3vtbsRyFpSja/zwDQGbrvhCXgmxouIQMbLxJvHgJkoaQwCJDJGDucqCGSsPMhjsDyUMx4BEhknEwIZJwvyGCgLpYxNgETGyIdAxsiBPAbJQRlxCJBI/6wIpH8G5DFABkqISYBE+uZGIH35k0dn/raPT4BE+mVIIP3Yk0dH9rbORYBE+uRJIH24k0cn7rbNS4BE2mdLIO2Zk0cH5racgwCJtM2ZQNryJo/GvG03HwESaZc5gbRjTR4NWdtqbgIk0iZ/AmnDmTwacbYNAmcCJFK/FwikPmPyaMDYFgjcRYBE6vYFgdTlSx6V+VoegUsESOQSof1/TiD72V28U+NeROQCBJoQ8CzWwUwgdbh686jE1bII7CVAInvJ3X8fgZRnSh4VmFoSgRIESKQExedrEEhZnuRRmKflEChNgETKESWQcizJoyBLSyFQkwCJlKFLIGU4kkchjpZBoBUBEjlOmkCOMySPAgwtgUAPAiRyjDqBHONHHgf5uR2B3gRIZH8CBLKfHXkcYOdWBEYiQCL70iCQfdzIYyc3tyEwKgES2Z4MgWxnRh47mLkFgQgESGRbSgSyjRd5bOTlcgSiESCR9YkRyHpW5LGBlUsRiEyARNalRyDrOJHHSk4uQyALARK5nCSBXGZEHisYuQSBjARI5OFUCeRC12ugjGPBmRBYT8AMuJ8VgTzQRxpn/UPmSgQyEzAL7k6XQO7peg2TeRw4GwLbCZgJLzMjkDv6SKNsf7jcgcAMBMyGF1MmkFtdr0FmGAPOiMB+AmbEc3YEcqOPNMb+h8qdCMxEwKx4ljaBvNf1GmKmx99ZEThOwMwgkKsu0gjHHyYrIDAjgdlnx/RvILM3wIwPvTMjUJLAzDNkaoHMHHzJB8haCMxOYNZZMq1AZg189gfd+RGoRWDGmTKlQGYMutZDY10EEHhOYLbZMp1AZgvYw40AAm0JzDRjphLITMG2fWTshgACNwnMMmumEcgsgXqMEUBgDAIzzJwpBDJDkGM8MqpAAIGZ3kTSC4Q8PNAIINCTQOYZlFogmYPr+UDYGwEEthHIOovSCiRrYNva1tUIIDAKgYwzKaVAMgY1ykOgDgQQ2E8g22xKJ5BsAe1vVXcigMCIBDLNqFQCyRTMiI2vJgQQKEMgy6xKI5AsgZRpT6sggMDoBDLMrBQCyRDE6M2uPgQQKE8g+uwKL5DoAZRvSSsigEAkApFnWGiBRAYfqcHVigACdQlEnWVhBRIVeN02tDoCCEQlEHGmhRRIRNBRm1rdCCDQjkC02RZOINEAt2s9OyGAQAYCkWZcKIFEApuhkZ0BAQT6EIgy68IIJArQPu1mVwQQyEYgwswLIZAIILM1r/MggEB/AqPPvuEFMjrA/i2mAgQQyExg5Bk4tEBGBpe5YZ0NAQTGIjDqLBxWIKMCG6utVIMAArMQGHEmDimQEUHN0qTOiQAC4xIYbTYOJ5DRAI3bSipDAIEZCYw0I4cSyEhgZmxMZ0YAgRgERpmVwwhkFCAx2keVCCAwO4ERZuYQAhkBxOzN6PwIIBCPQO/Z2V0gvQHEaxkVI4AAAs8J9JyhXQXS8+AaEAEEEMhCoNcs7SaQXgfO0jDOgQACCNwk0GOmdhFIj4NqNQQQQCA7gdaztblAWh8we8M4HwIIINDrTaSpQMhDoyOAAAL1CbSatc0E0upA9aOxAwIIIDA+gRYzt4lAWhxk/DhViAACCLQlUHv2VhdI7QO0jcNuCCCAQCwCNWdwVYHULDxWhKpFAAEE+hGoNYurCaRWwf0isDMCCCAQl0CNmVxFIDUKjRubyhFAAIExCJSezcUFUrrAMbCrAgEEEMhBoOSMLiqQkoXliMopEEAAgfEIlJrVxQRSqqDxUKsIAQQQyEegxMwuIpASheSLx4kQQACBsQkcnd2HBXK0gLHxqg4BBBDITeDIDD8kkCMb547E6RBAAIE4BPbO8t0C2bthHKQqRQABBOYhsGem7xLIno3micFJEUAAgZgEts72zQLZukFMjKpGAAEE2hD48Y9/fLXRd7/73esNl3/3ve997+r3f/3rX0+f/OQnr//s97///elLX/rS1e9/97vfnb74xS9uKvRvf/vbaVl/WecDH/jA1b0311z+7Dvf+c71mv/85z9PX/jCF05vvPHG6etf//rpF7/4xel973vf1Z9vEgh5bMrJxQgggMCDBJZh/qlPfer0ox/96FogNwf8P/7xjxeG/TLMX3vttdMvf/nLq3XP//yxj31sFem33377Wjhngdy15te+9rXT5z//+dN///vf0ze/+c3Tpz/96dPnPve5638+S2u1QMhjVT4uQgABBFYRWIbz97///au/2S8SOb+B3HwjOQ/wL3/5y1dvIcvQ/8tf/nL9FrBc+9GPfnT1W8hy/5/+9KfTO++8c/0Gct+aH//4x0/vf//7X5DUIrff/va31/uvEgh5rOoHFyGAAAKrCSyDe/n1r3/96+r/LgK5+Tf+5W/5t39/++Ou8++/9a1vXb0dLL/OHzEt6y/D/uabxm9+85vTZz/72dPPfvaz639/35pLPcv1f/zjH6+vvf3x10WBkMfqfnAhAgggsIrA8lHSt7/97dNPfvKT069//euXBHJ+41j+4OZbxu03jkUOi4Buy+fVV1996eOt5d7PfOYzV3vd/A7koTUXYfz85z+/+q5l+d5j+bjrBz/4welXv/rV1fcnDwqEPFb1gosQQACBTQTOw3z5WOqhj6y2CGS59uYX3je/YF9E8Oc///lKNLffIi4JZHmLOQtttUDIY1M/uBgBBBBYRWAZwstHQz/84Q+v/lZ/l0CWL623fIR1+ye4nj59ev1R1vm7lq9+9aun5cv2uwRy/gjtLKzz729e++9///v0v//974W3lzvfQMhjVR+4CAEEENhM4OaPzN68+fwjsj/96U+vvxi/60v080dWt99Olt8vA/8b3/jG6UMf+tDpK1/5ypWEbr6V3NzvE5/4xOkPf/jD6cmTJ9cfg91e8/YbxyK+119//f4v0cljcz+4AQEEENhN4PaX2Ht/jPf8I7rL28gHP/jBe3/E9/YbyEM/GnzXj/F+5CMfuf7vRF54AyGP3T3gRgQQQGAXgRL/IeFZHst3KuePs27/FNa5uEv/IeHt/zjxrv+Q8M033zw9fvz4+Zfoi0mWf+EXAggggAAClwgsLxyPHj06vfLkyZN3l3/wCwEEEEAAgbUE/vOf/5z+D1cW1MD0I+A1AAAAAElFTkSuQmCC" class='avatar img-thumbnail' style='width:150px; height: auto;' id="imagePreview"/>
                            <img v-show="assessor['Photo']" src="data:image/png;base64,@{{assessor.image}}" class='avatar img-thumbnail' style='width:150px; height: auto;' id="imagePreview"/>
                            
                            <div class="text-center">
                                
                                <br>
                                <a class="btn btn-default btn-file" @click="onPickFile">
                                    <span>Browse</span>
                                </a>
                                <a class="btn btn-default btn-file" @click="removeFile">
                                    <span>Remove</span>
                                </a>
                                <input style="display: none;" type="file" ref="image" name="image" @change="onFilePicked" />
                            </div>
                                
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="tabbable wizard">
                            <ul class="nav nav-tabs steps ">
                                <li class="active col-md-3">
                                    <a class="wizard-a-link" href="#assessor-tab1" data-toggle="tab" aria-expanded="true">
                                        <span class="number pull-left">1.</span>
                                        <p class="wizard-p" style="min-width: 200px;">
                                            <span class="wizard-span">ជំនាញ (អាជីព)</span>
                                            <br>Area of expertise (occupation)
                                        </p>
                                    </a>
                                </li>
                                <li class="col-md-3">
                                    <a class="wizard-a-link" href="#assessor-tab2" data-toggle="tab" aria-expanded="true">
                                        <span class="number pull-left">2.</span>
                                        <p class="wizard-p" style="width: auto; min-width: 200px;">
                                            <span class="wizard-span">វគ្គដែលបានវាយតម្លៃ</span>
                                            <br>Course Assessed
                                        </p>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content form-horizontal">
                                <div class="tab-pane active" id="assessor-tab1">
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr style="background: #1f364f; color: #fff">
                                                <th>Sector</th>
                                                <th>Occupation</th>
                                                <th style="text-align: right">
                                                    <button type="button" class="btn btn-raised btn-success btn-sm" @click="addAssessorExpert">Add</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, key) in assessor.experts" :key="key">
                                                <td>
                                                    @{{ item['Sector'] }}
                                                </td>
                                                <td v-if="item['Occupation'] && typeof DimAreaOfexp[item['Division']] == 'object'">
                                                    @{{ [].concat(...Object.values(DimAreaOfexp)).find(x => x['ID'] == item['Occupation'])['Occupation'] }}
                                                </td>
                                                <td v-else>
                                                    &nbsp;
                                                </td>
                                                <td style="text-align: right">
                                                    <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editAssessorExpert(item)">Edit</button>
                                                    <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteAssessorExpert(item)">Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane" id="assessor-tab2">
                                    <table class="table">
                                        <thead>
                                            <tr style="background: #1f364f; color: #fff">
                                                <th>Course Taught in SDP</th>
                                                <th style="text-align: right">
                                                    <button type="button" class="btn btn-raised btn-success btn-sm" @click="addAssessorCourse">Add</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, key) in assessor.courses" :key="key">
                                                <td>
                                                    @{{ item['Course Taught in SDP'] }}
                                                </td>
                                                <td style="text-align: right">
                                                    <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editAssessorCourse(item)">Edit</button>
                                                    <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteAssessorCourse(item)">Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button type="button" class="btn btn-primary" @click="saveAssessor(assessor.index)">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRecruitment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-views" style="width:75%">
        <div class="modal-content load-modal-form">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="gridModalLabel">Enterprise Recruitment Follow Up</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal tot-modal-form" data-vv-scope="recruitment">
                    <div class="col-md-6">
                        <div class="form-group required" :class = "{'has-error': errors.has('recruitment.Enterprise Name') }">
                            {!! Form::Label('Enterprise Name', 'Enterprise Name', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Enterprise Name', [$enterprise->ID => $enterprise->{'Name of enterprise'}], $enterprise->ID, ['v-model' => 'recruitment["Enterprise Name"]', 'readonly' => 'readonly', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group required" :class = "{'has-error': errors.has('recruitment.Interview date') }">
                            {!! Form::Label('Interview date', 'Interview date', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::date('Interview date', null, ['v-model' => 'recruitment["Interview date"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group required" :class = "{'has-error': errors.has('recruitment.Females employed') }">
                            {!! Form::Label('Females employed', 'Females employed', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Number('Females employed', null, ['v-model' => 'recruitment["Females employed"]', 'v-validate' => "'required|numeric'",  'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group required" :class = "{'has-error': errors.has('recruitment.Males employes') }">
                            {!! Form::Label('Males employed', 'Males employes', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Number('Males employes', null, ['v-model' => 'recruitment["Males employes"]', 'v-validate' => "'required|numeric'", 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Advertisement',' Advertisement of vacancies in newspapers, internet, posters, etc.', ['class' => 'control-label col-lg-9']) !!}
                            <div>
                                <input type="checkbox" true-value="1" false-value="0" v-model="recruitment['Advertisement']" />
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Direct contact',' Direct contact with employees', ['class' => 'control-label col-lg-9']) !!}
                            <div>
                                <input type="checkbox" true-value="1" false-value="0" v-model="recruitment['Direct contact']" />
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Employment agency','Employment agencies', ['class' => 'control-label col-lg-9']) !!}
                            <div>
                                <input type="checkbox" true-value="1" false-value="0" v-model="recruitment['Employment agency']" />
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Training Institution','Direct contact to training institutions', ['class' => 'control-label col-lg-9']) !!}
                            <div>
                                <input type="checkbox" true-value="1" false-value="0" v-model="recruitment['Training Institution']" />
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Other','other', ['class' => 'control-label col-lg-9']) !!}
                            <div>
                                <input type="checkbox" true-value="1" false-value="0" v-model="recruitment['Other']" />
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Other, specify', 'Other, specify', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Text('Other, specify', null, ['v-model' => 'recruitment["Other, specify"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            {!! Form::Label('Hiring more graduates', 'Hiring more graduates', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Hiring more graduates', $sdp_skills, null, ['v-model' => 'recruitment["Hiring more graduates"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('recommend other enterprises to hire SDP graduates', 'recommend other enterprises to hire SDP graduates', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('recommend other enterprises to hire SDP graduates', $loops, null, ['v-model' => 'recruitment["recommend other enterprises to hire SDP graduates"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('recommendations for the training programmes', 'recommendations for the training programme', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::textarea('recommendations for the training programme',null , ['v-model' => 'recruitment["recommendations for the training programme"]', 'size' => '42x4', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Interviewer comments', 'Interviewer comments', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::textarea('Interviewer comments',null , ['v-model' => 'recruitment["Interviewer comments"]', 'size' => '42x4', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::Label('SDP graduate(s) have the skills', 'SDP graduate(s) have the skills', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('SDP graduate(s) have the skills', $sdp_skills,null, ['v-model' => 'recruitment["SDP graduate(s) have the skills"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Technical skills', 'Technical skills', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Technical skills', $loops, null, ['v-model' => 'recruitment["Technical skills"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Communication skills with customers', 'Communication skills with customers', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Communication skills with customers', $loops, null, ['v-model' => 'recruitment["Communication skills with customers"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Communication skills with colleagues', 'Communication skills with colleagues', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Communication skills with colleagues', $loops, null, ['v-model' => 'recruitment["Communication skills with colleagues"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Commitment to job', 'Commitment to job', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Commitment to job', $loops, null, ['v-model' => 'recruitment["Commitment to job"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Confidence', 'Confidence', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Confidence', $loops, null, ['v-model' => 'recruitment["Confidence"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Honesty', 'Honesty', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Honesty', $loops, null, ['v-model' => 'recruitment["Honesty"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Overall score', 'Overall score', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Overall score', $loops, null, ['v-model' => 'recruitment["Overall score"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('graduate need additional training', 'graduate need additional training', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('graduate need additional training', $sdp_skills, null, ['v-model' => 'recruitment["graduate need additional training"]', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-6 enterprise-checkBox no-padding">
                            <p>
                                {!! Form::Label('Customer service','Customer service', ['class' => 'control-label col-lg-9']) !!}
                                <input type="checkbox" true-value="1" false-value="0" v-model="recruitment['Customer service']" />
                            </p>
                            <p>
                                {!! Form::Label('Team work','Team work', ['class' => 'control-label col-lg-9']) !!}
                                <input type="checkbox" true-value="1" false-value="0" v-model="recruitment['Team work']" />
                            </p>
                            <p>
                                {!! Form::Label('Commitment to work','Commitment to work', ['class' => 'control-label col-lg-9']) !!}
                                <input type="checkbox" true-value="1" false-value="0" v-model="recruitment['Commitment to work']" />
                            </p>
                            <p>
                                {!! Form::Label('Cross-cultural interaction','Cross-cultural interaction', ['class' => 'control-label col-lg-9']) !!}
                                <input type="checkbox" true-value="1" false-value="0" v-model="recruitment['Cross-cultural interaction']" />
                            </p>
                            <p>
                                {!! Form::Label('Self-confidence','Self-confidence', ['class' => 'control-label col-lg-9']) !!}
                                <input type="checkbox" true-value="1" false-value="0" v-model="recruitment['Self-confidence']" />
                            </p>
                        </div>

                        <div class="col-md-6 enterprise-checkBox ">
                            <p>
                                {!! Form::Label('Number skills','Number skills', ['class' => 'control-label col-lg-9']) !!}
                                <input type="checkbox" true-value="1" false-value="0" v-model="recruitment['Number skills']" />
                            </p>
                            <p>
                                {!! Form::Label('Writing skills','Writing skills', ['class' => 'control-label col-lg-9']) !!}
                                <input type="checkbox" true-value="1" false-value="0" v-model="recruitment['Writing skills']" />
                            </p>
                            <p>
                                {!! Form::Label('IT computer skills','IT computer skills', ['class' => 'control-label col-lg-9']) !!}
                                <input type="checkbox" true-value="1" false-value="0" v-model="recruitment['IT computer skills']" />
                            </p>
                            <p>
                                {!! Form::Label('English','English', ['class' => 'control-label col-lg-9']) !!}
                                <input type="checkbox" true-value="1" false-value="0" v-model="recruitment['English']" />
                            </p>
                            <p>
                                {!! Form::Label('Technical job specifc skills','Technical job specifc skills', ['class' => 'control-label col-lg-9']) !!}
                                <input type="checkbox" true-value="1" false-value="0" v-model="recruitment['Technical job specifc skills']" />
                            </p>
                        </div>

                        <div class="form-group">
                            {!! Form::Label('Specify technical skills', 'Specify technical skills', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::textarea('Specify technical skills',null , ['v-model' => 'recruitment["Specify technical skills"]', 'size' => '48x4', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="text-align: center">
                    <button type="button" class="btn btn-primary" @click="saveRecruitment(recruitment.index)">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="modalAssessorExpert" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#modalTrainer">
    <div class="modal-dialog modal-views">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Area of Exp</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body form-horizontal">
                    <div class="form-group">
                        {!! Form::Label('EntAssessor', 'វិស័យ/Sector', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            <select id="Sector" name="Sector" class="form-control" v-model='expert["Sector"]'>
                                <option v-for="option in AreaOfExpCourse" v-bind:value="option['Area of exp course Type']" >@{{ option['Area of exp course Type'] }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Division', 'ផ្នែក/ Division', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            <select id="Division" name="Division" class="form-control" v-model='expert["Division"]'>
                                <option v-for="option in CourseDivision[expert['Sector']]" v-bind:value="option['Division']" >@{{ option['Division'] }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Occupatation', 'មុខរបរ/Occupatation', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            <select id="Occupation" name="Occupation" class="form-control" v-model='expert["Occupation"]'>
                                <option v-for="option in DimAreaOfexp[expert['Division']]" v-bind:value="option['ID']" >@{{ option['Occupation'] }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::Label('Occupatation', 'ផ្សេងៗ/Other', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            <input type="text" v-model = "expert['Other']" class="form-control" />
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" data-dismiss="modal" aria-hidden="true">Save</button>
            </div>
        </div>
    </div>
</div>
    
<div id="modalAssessorCourse" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#modalTrainer">
    <div class="modal-dialog modal-views">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Course Taught List</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body form-horizontal">
                    <div class="form-group">
                        {!! Form::Label('EntAssessor', 'វិស័យ/Sector', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            <select id="Course Taught in SDP" name="Course Taught in SDP" class="form-control" v-model='course["Course Taught in SDP"]'>
                                <option v-for="option in TrainerCoursees" v-bind:value="option['Course']" >@{{ option['Course'] }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" data-dismiss="modal" aria-hidden="true">Save</button>
            </div>
        </div>
    </div>
</div>


<div class="widget">
    <div class="widget-heading">
        <a href="{{ route('enterprise.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជីសហគ្រាស | All Enterprise</a>
        <div class="pull-right">
            @if(\Auth::user()->role == 'Administrator')
                <a href="{{ route('enterprise.delete', $enterprise->ID) }}" target="_blank" class="btn btn-raised btn-danger"><i class="ti-trash mr-5"></i>លុប | Delete</a>
            @endif  
            <button type="button" class="btn btn-raised btn-primary" @click="save"><i class="ti-save mr-5"></i> រក្សាទុក | Save</button>
        </div>
    </div>
    <div class="widget-body">

        <div class="content clearfix">

            <div class="tabbable wizard">
                <ul class="nav nav-tabs steps ">
                    <li class="active col-md-2  col-sm-6 col-xs-12">
                        <a class="wizard-a-link" href="#basic-tab1" data-toggle="tab" aria-expanded="true">
                            <span class="number pull-left">1.</span>
                            <p class="wizard-p" style="min-width: 200px;">
                                <span class="wizard-span">ព័ត៌មានមូលដ្ឋាន</span>
                                <br>
                                <span>Basic Information</span>
                            </p>
                        </a>
                    </li>

                    <li class="col-md-2 col-sm-6 col-xs-12">
                        <a class="wizard-a-link" href="#basic-tab2" data-toggle="tab" aria-expanded="true">
                            <span class="number pull-left">2.</span>
                            <p class="wizard-p" style="min-width: 200px;">
                                <span class="wizard-span">ត្រូវការបុគ្គលិក</span>
                                <br>
                                <span>Employees Needed</span>
                            </p>
                        </a>
                    </li>
                    <li class="col-md-2 col-sm-6 col-xs-12">
                        <a class="wizard-a-link" href="#basic-tab3" data-toggle="tab" aria-expanded="true">
                            <span class="number pull-left">3.</span>
                            <p class="wizard-p" style="min-width: 200px;">
                                <span class="wizard-span">អ្នកទំនាកទំនង</span>
                                <br>
                                <span>Contact Information</span>
                            </p>
                        </a>
                    </li>
                    <li class="col-md-2 col-sm-6 col-xs-12">
                        <a class="wizard-a-link" href="#basic-tab4" data-toggle="tab" aria-expanded="true">
                            <span class="number pull-left">4.</span>
                            <p class="wizard-p" style="min-width: 200px;">
                                <span class="wizard-span">អ្នកវាយតម្លៃ</span>
                                <br>
                                <span>Assessors</span>
                            </p>
                        </a>
                    </li>
                    <li class="col-md-3 col-sm-6 col-xs-12">
                        <a class="wizard-a-link" href="#basic-tab5" data-toggle="tab" aria-expanded="true">
                            <span class="number pull-left">5.</span>
                            <p class="wizard-p" style="min-width: 200px;">
                                <span class="wizard-span">ការស្ទង់មតិតាមដានអំពីសហគ្រាស</span>
                                <br>
                                <span>Recruitment Follow up</span>
                            </p>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="basic-tab1">
                        <form class=" form-horizontal clearfix" data-vv-scope="basic">
                            <div class="col-md-12"> 
                                <h4> ព័ត៌មានមូលដ្ឋាន/ Basic Information </h4>
                                <div class="form-group required" :class = "{'has-error': errors.has('basic.Name of enterprise') }">
                                    {!! Form::Label('Name of enterprise', '១​.​ ឈ្មោះសហគ្រាស​/Name of enterprise', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Name of enterprise', null, [ 'v-model' => 'item["Name of enterprise"]', 'required' => 'required', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group" :class = "{'has-error': errors.has('basic.Name of enterprise kh') }">
                                    {!! Form::Label('Name of enterprise kh', '២​.​ ឈ្មោះសហគ្រាស(ខ្មែរ)/Enterprise name (Khmer)', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Name of enterprise kh', null, [ 'v-model' => 'item["Name of enterprise kh"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group" :class = "{'has-error': errors.has('basic.Date of start of business') }">
                                    {!! Form::Label('Date of start of business', '៣. ថ្ងៃទីខែឆ្នាំចាប់ផ្តើមអាជីវកម្ម/Date start business', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Date('Date of start of business', null, [ 'v-model' => 'item["Date of start of business"]', 'v-validate' => "''", 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group" :class = "{'has-error': errors.has('basic.Has license') }">
                                    {!! Form::Label('Has license', '៤. ឯកសារចុះបញ្ជិអាជីវកម្ម/Has license?', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Has license', $licenses, null, [ 'v-model' => 'item["Has license"]', 'v-validate' => "''", 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group required" :class = "{'has-error': errors.has('basic.Activity') }">
                                    {!! Form::Label('Activity', '៥. ប្រភេទអាជីវកម្ម /Type of business', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Activity', $activities, null, [ 'v-model' => 'item["Activity"]', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group required" :class = "{'has-error': errors.has('basic.Sector') }">
                                    {!! Form::Label('Sector', 'វិស័យ/Sector of the business', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Sector', $sectors, null, [ 'v-model' => 'item["Sector"]', 'required' => 'required', 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <hr>
                                <h4>៦. ទីតាំង​/Location</h4>

                                <div class="form-group required" :class = "{'has-error': errors.has('basic.Province') }">
                                    {!! Form::Label('Province', 'ខេត្ត / Province', ['required' => 'required', 'class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        <select id="Province" name="Province" class="form-control" v-validate="'required'" v-model='item["Province"]'>
                                            <option v-for="option in provinces" v-bind:value="option['Province']" >@{{ option['Province'] }}</option>
                                        </select>
                                    </div>

                                </div>
                        
                                <div class="form-group required" :class = "{'has-error': errors.has('basic.District') }">
                                    {!! Form::Label('District', ' ស្រុក / ក្រុង / District', ['required' =>'required', 'class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        <select id="District" name="District" class="form-control" v-validate="'required'" v-model='item["District"]'>
                                            <option v-for="option in districts[item['Province']]" v-bind:value="option['District']" >@{{ option['District'] }}</option>
                                        </select>
                                    </div>
                                </div>
                        
                                <div class="form-group required" :class = "{'has-error': errors.has('basic.Commune') }">
                                    {!! Form::Label('Commune', 'ឃុំ/សង្កាត់ / Commune', ['required' => 'required', 'class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        <select id="Commune" name="Commune" class="form-control" v-validate="'required'" v-model='item["Commune"]'>
                                            <option v-for="option in communes[item['District']]" v-bind:value="option['Commune']" >@{{ option['Commune'] }}</option>
                                        </select>
                                    </div>
                                </div>
                        
                                <div class="form-group required" :class = "{'has-error': errors.has('basic.Village') }">
                                    {!! Form::Label('Village', 'ភូមិ / Village', [ 'class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        <select id="Village" name="Village" class="form-control" v-validate="'required'" v-model='item["Village"]'>
                                            <option v-for="option in villages[item['Commune']]" v-bind:value="option['ID']" >@{{ option['Village'] }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::Label('Address', 'ផ្ទះលេខ/House number', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Text('Address', null, [ 'v-model' => 'item["Address"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <hr>
                                <h4>៧. ចំនួនបុគ្គលិក/Employment (optional)</h4>

                                <div class="form-group">
                                    {!! Form::Label('Number women employees', '# ស្រីសរុប/ women employees', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Number('Number women employees', (int) $enterprise->{'Number women employees'}, [ 'v-model' => 'item["Number women employees"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::Label('Number men employees', '# ប្រុសសរុប/ men employees', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Number('Number men employees', (int) $enterprise->{'Number men employees'}, [ 'v-model' => 'item["Number men employees"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <hr>
                                <h4>ទំនាក់ទំនងសហគ្រាសជាមួយកម្មវិធីSDP /Enterprise Connection with SDP</h4>
                                <p class="text-danger">ក្នុងផ្នែកនេះយើងចង់ដឹងចា សហគ្រាសមានទំនាន់ទំនងដូចម៉្ដេចជាមួយ SDP /In this section we want to know how the enterprise is connected to SDP</p>
                                <div class="form-group">
                                    {!! Form::Label('Enterprise involved in SDP training', '៨. តើសហគ្រាសបណ្តុះបណ្តាលជំនាញសម្រាប់កម្មវិធីSDPទេ?/ Is enterprise offering skills training in SDP?', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Enterprise involved in SDP training', ['បាទ/Yes' => 'បាទ/Yes', 'ទេ/No' => 'ទេ/No'], null, ['v-model' => 'item["Enterprise involved in SDP training"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group" v-show="item['Enterprise involved in SDP training'] == 'បាទ/Yes'">
                                    {!! Form::Label('If Yes, Which', 'ប្រសិនមាន សូមវាយលេខសម្គាល់/ If yes, please select the Intervention Area and Delivery Channel (IADC) the enterprise is engaged with', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('If Yes, Which', $interventions, null, ['v-model' => 'item["If Yes, Which"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::Label('Hired graduates', '៩. តើសហគ្រាសត្រូវការជួលសិក្ខាកាមដែលបានបញ្ចប់ការសិក្សាដែរឬទេ/Did enterprise hire a graduate?', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Hired graduates', ['បាទ/Yes' => 'បាទ/Yes', 'ទេ/No' => 'ទេ/No'], null, ['v-model' => 'item["Hired graduates"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::Label('RPL participant', 'តើបុគ្គលិកបានចូលរួមក្នុងការវាយតម្លៃ RPL ដែលឬទេ?/Did staff member(s) participate in RPL assessment?', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('RPL participant', ['បាទ/Yes' => 'បាទ/Yes', 'ទេ/No' => 'ទេ/No'], null, ['v-model' => 'item["RPL participant"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group required" :class = "{'has-error': errors.has('basic.Submitter') }">
                                    {!! Form::Label('Submitter', 'បញ្ជូលទិន្នន័យដោយ/ Submitter', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Submitter', $submitters, null, [ 'v-model' => 'item["Submitter"]', 'v-validate' => "'required'",'class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="basic-tab2">
                        <div class="content clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::Label('Need to hire new employees', '៩. តើអ្នកត្រូវការជួលបុគ្គលិកថ្មីៗ ឬទេ/ Does the enterprise need to hire new employees?', ['class' => 'control-label col-lg-6']) !!}
                                    <div class="col-lg-6">
                                        {!! Form::Select('Need to hire new employees', $yes_no, null, [ 'v-model' => 'item["Need to hire new employees"]', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <p>&nbsp;</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr style="background: #1f364f; color: #fff">
                                                <th>Position</th>
                                                <th>How Many</th>
                                                <th>Comments</th>
                                                <th>
                                                    <button type="button" class="btn btn-raised btn-success btn-sm pull-right" @click="addEmployment">Add</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, key) in item.employments" :key="key">
                                                <td>
                                                    @{{ item['Position'] }}
                                                </td>
                                                <td>
                                                    @{{ item['How Many'] }}
                                                </td>
                                                <td>
                                                    @{{ item['Comments'] }}
                                                </td>
                                                <td class="pull-right">
                                                    <button type="button" class="btn btn-raised btn-warning btn-sm " @click="editEmployment(item)">Edit</button>
                                                    <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteEmployment(item)">Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="basic-tab3">
                        <div class="content clearfix">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr style="background: #1f364f; color: #fff">
                                                <th>Full Name</th>
                                                <th>Position</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                                <th class="pull-right">
                                                    <button type="button" class="btn btn-raised btn-success btn-sm" @click="addContact">Add</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, key) in item.contacts" :key="key">
                                                <td>
                                                    @{{ item['Full Name'] }}
                                                </td>
                                                <td>
                                                    @{{ item['Position'] }}
                                                </td>
                                                <td>
                                                    @{{ item['Phone Number'] }}
                                                </td>
                                                <td>
                                                    @{{ item['Email'] }}
                                                </td>
                                                <td class="pull-right">
                                                    <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editContact(item)">Edit</button>
                                                    <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteContact(item)">Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="basic-tab4">
                        
                        <div class="content clearfix">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr style="background: #1f364f; color: #fff">
                                                <th>First Name</th>
                                                <th>Sex</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th class="pull-right">
                                                    <button type="button" class="btn btn-raised btn-success btn-sm" @click="addAssessor">Add</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, key) in item.assessors" :key="key">
                                                <td>
                                                    @{{ item['First name'] }}
                                                </td>
                                                <td>
                                                    @{{ item['Sex'] }}
                                                </td>
                                                <td>
                                                    @{{ item['Email'] }}
                                                </td>
                                                <td>
                                                    @{{ item['Phone number'] }}
                                                </td>
                                                <td class="pull-right">
                                                    <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editAssessor(item)">Edit</button>
                                                    <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteAssessor(item)">Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="basic-tab5">
                        <div class="content clearfix">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr style="background: #1f364f; color: #fff">
                                                <th>Interview date</th>
                                                <th>Females employed</th>
                                                <th>Males employed</th>
                                                <th>Overall Score</th>
                                                <th class="pull-right">
                                                    <button type="button" class="btn btn-raised btn-success btn-sm" @click="addRecruitment">Add</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, key) in item.recruitments" :key="key">
                                                <td>
                                                    @{{ item['Interview date'] }}
                                                </td>
                                                <td>
                                                    @{{ item['Females employed'] }}
                                                </td>
                                                <td>
                                                    @{{ item['Males employes'] }}
                                                </td>
                                                <td>
                                                    @{{ item['Overall score'] }}
                                                </td>
                                                <td class="pull-right">
                                                    <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editRecruitment(item)">Edit</button>
                                                    <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteRecruitment(item)">Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection @push('scripts')


<script type="text/javascript">
    var app = new Vue({

        el: '#App',

        data: {
            allEnterprices: {!! $allEnterprices !!},
            item: {!!$enterprise -> toJson() !!},
            employment: {},
            contact: {},
            recruitment: {},
            assessor: {},
            expert: {},
            course: {},
            AreaOfExpCourse: {!! $AreaOfExpCourse->toJson() !!},
            CourseDivision: {!! $CourseDivision->toJson() !!},
            DimAreaOfexp: {!! $DimAreaOfexp->toJson() !!},
            TrainerCoursees: {!! $TrainerCoursees->toJson() !!},
            provinces: {!! $provinces !!},
            districts: {!! $districts !!},
            communes: {!! $communes !!},
            villages: {!! $villages !!},
            ta_countries: {!! $ta_countries !!},
            ta_provinces: {!! $ta_provinces !!},
            ta_districts: {!! $ta_districts !!},
        },
        
        created() {
            this.initialize()
        },

        methods: {

            initialize: function() {
                this.employment = {}
                this.employment['Enterprise ID'] = this.item.ID
                this.contact = {}
                this.contact['Enterprise ID'] = this.item.ID
                this.assessor ={}
                this.assessor['Enterprise link'] = this.item.ID
                this.recruitment = {}
                this.recruitment['Enterprise Name'] = this.item.ID 
            },
            //Add Employment
            addEmployment: function() {
                this.employment = {}
                this.employment['Enterprise ID'] = this.item.ID
                $("#modalEmployment").modal("show");
            },

            editEmployment: function(item) {
                const index = this.item.employments.indexOf(item)
                this.employment = item
                this.employment["index"] = index
                $("#modalEmployment").modal("show");
            },

            deleteEmployment: function(item) {
                var vm = this;
                
                if (confirm('Are you sure you want to delete this item?')) {
                    axios.delete('{{ route('enterpriseemployment.index') }}/' + item.ID)
                    .then(function(response){
                        if(response.data.deleted){
                            console.log('deleted')
                            const index = vm.item.employments.indexOf(item)
                            vm.item.employments.splice(index, 1)
                            
                        }else{
                            console.log('Failed')
                        }
                    }).catch(function () {
                        console.log('Cached Error')
                    })
                } 
            },

            saveEmployment: function() {
                var vm = this;
                this.$validator.validate('employee.*').then((result) => {
                    if (result) {
                        if(this.employment.index != undefined){
                            $('#overlay').css('display', 'block');
                            axios.put('{{ route('enterpriseemployment.index') }}/' + vm.employment.ID, vm.employment)
                                .then(function(response){
                                    if(response.data.updated){
                                        $("#modalEmployment").modal("hide");
                                        $('#overlay').css('display', 'none');
                                        Object.assign(vm.item.employments[vm.employment.index], response.data.data)
                                        vm.initialize();
                                    }else{
                                        console.log('Failed')
                                    }
                                }).catch((err) => {
                                    console.log('Catched Error' + err)
                                });
                        } else {
                            $('#overlay').css('display', 'block');
                            axios.post('{{ route('enterpriseemployment.store') }}', vm.employment)
                                .then(function(response){
                                    if(response.data.created){
                                        $("#modalEmployment").modal("hide");
                                        $('#overlay').css('display', 'none');
                                        vm.item.employments.push(response.data.data);
                                        vm.initialize();
                                    }else{
                                        console.log('Failed')
                                    }
                                }).catch((err) => {
                                    console.log('Catched Error' + err)
                                });
                        }
                    }
                })
            },

            //Add Contact
            addContact: function() {
                this.contact = {}
                this.contact['Enterprise ID'] = this.item.ID
                $("#modalContact").modal("show");
            },

            editContact: function(item) {
                const index = this.item.contacts.indexOf(item)
                this.contact = item
                this.contact["index"] = index
                $("#modalContact").modal("show");
            },

            deleteContact: function(item) {
                var vm = this;
                
                if (confirm('Are you sure you want to delete this item?')) {
                    axios.delete('{{ route('enterprisecontact.index') }}/' + item.ID)
                    .then(function(response){
                        if(response.data.deleted){
                            console.log('deleted')
                            const index = vm.item.contacts.indexOf(item)
                            vm.item.contacts.splice(index, 1)
                            
                        }else{
                            console.log('Failed')
                        }
                    }).catch(function () {
                        console.log('Cached Error')
                    })
                } 
            },

            saveContact: function() {
                var vm = this;
                this.$validator.validate('contact.*').then((result) => {
                    if (result) {
                        if(this.contact.index != undefined){
                            $('#overlay').css('display', 'block');
                            axios.put('{{ route('enterprisecontact.index') }}/' + vm.contact.ID, vm.contact)
                                .then(function(response){
                                    if(response.data.updated){
                                        $("#modalContact").modal("hide");
                                        $('#overlay').css('display', 'none');
                                        Object.assign(vm.item.contacts[vm.contact.index], response.data.data)
                                        vm.initialize();
                                    }else{
                                        console.log('Failed')
                                    }
                                }).catch((err) => {
                                    console.log('Catched Error' + err)
                                });
                        } else {
                            $('#overlay').css('display', 'block');
                            axios.post('{{ route('enterprisecontact.store') }}', vm.contact)
                                .then(function(response){
                                    if(response.data.created){
                                        $("#modalContact").modal("hide");
                                        $('#overlay').css('display', 'none');
                                        vm.item.contacts.push(response.data.data);
                                        vm.initialize();
                                    }else{
                                        console.log('Failed')
                                    }
                                }).catch((err) => {
                                    console.log('Catched Error' + err)
                                });
                        }
                    }
                })
            },

            //Add Assessors
            addAssessor: function() {
                this.assessor ={
                    experts: [],
                    courses: []
                }
                this.assessor['Enterprise link'] = this.item.ID
                $("#modalAssessor").modal("show");
            },

            editAssessor: function(item) {
                const index = this.item.assessors.indexOf(item)
                this.assessor = item
                this.assessor["index"] = index
                $("#modalAssessor").modal("show");
            },

            deleteAssessor: function(item) {
                var vm = this;
                
                if (confirm('Are you sure you want to delete this item?')) {
                    axios.delete('{{ route('enterpriseassessor.index') }}/' + item.ID)
                    .then(function(response){
                        if(response.data.deleted){
                            console.log('deleted')
                            const index = vm.item.assessors.indexOf(item)
                            vm.item.assessors.splice(index, 1)
                            
                        }else{
                            console.log('Failed')
                        }
                    }).catch(function () {
                        console.log('Cached Error')
                    })
                } 
            },

            saveAssessor: function() {
                var vm = this;
                this.$validator.validate('assessor.*').then((result) => {
                    if (result) {
                        if(this.assessor.index != undefined){
                            $('#overlay').css('display', 'block');
                            axios.put('{{ route('enterpriseassessor.index') }}/' + vm.assessor.ID, vm.assessor)
                                .then(function(response){
                                    if(response.data.updated){
                                        $("#modalAssessor").modal("hide");
                                        $('#overlay').css('display', 'none');
                                        Object.assign(vm.item.assessors[vm.assessor.index], response.data.data)
                                        vm.initialize();
                                    }else{
                                        console.log('Failed')
                                    }
                                }).catch((err) => {
                                    console.log('Catched Error' + err)
                                });
                        } else {
                            $('#overlay').css('display', 'block');
                            axios.post('{{ route('enterpriseassessor.store') }}', vm.assessor)
                                .then(function(response){
                                    if(response.data.created){
                                        $("#modalAssessor").modal("hide");
                                        $('#overlay').css('display', 'none');
                                        vm.item.assessors.push(response.data.data);
                                        vm.initialize();
                                    }else{
                                        console.log('Failed')
                                    }
                                }).catch((err) => {
                                    console.log('Catched Error' + err)
                                });
                        }
                    }
                })
            },

            addAssessorExpert: function() {
                this.expert= {}
                this.assessor.experts.push(this.expert)
                $("#modalAssessorExpert").modal("show");
            },

            editAssessorExpert: function(item) {
                this.expert = item
                $("#modalAssessorExpert").modal("show");
            },

            deleteAssessorExpert: function(item) {
                const index = this.assessor.experts.indexOf(item)
                this.assessor.experts.splice(index, 1)
            },

            addAssessorCourse: function() {
                this.course= {}
                this.assessor.courses.push(this.course)
                $("#modalAssessorCourse").modal("show");
            },

            editAssessorCourse: function(item) {
                this.course = item
                $("#modalAssessorCourse").modal("show");
            },

            deleteAssessorCourse: function(item) {
                const index = this.assessor.courses.indexOf(item)
                this.assessor.courses.splice(index, 1)
            },

            
            
            //Add Enterprise Recruitment
            addRecruitment: function() {
                this.recruitment = {}
                this.recruitment['Enterprise Name'] = this.item.ID 
                $("#modalRecruitment").modal("show");
            },
            

            editRecruitment: function(item) {
                const index = this.item.recruitments.indexOf(item)
                this.recruitment = item
                this.recruitment["index"] = index
                $("#modalRecruitment").modal("show");
            },

            deleteRecruitment: function(item) {
                var vm = this;
                
                if (confirm('Are you sure you want to delete this item?')) {
                    axios.delete('{{ route('enterpriserecruitment.index') }}/' + item.ID)
                    .then(function(response){
                        if(response.data.deleted){
                            console.log('deleted')
                            const index = vm.item.recruitments.indexOf(item)
                            vm.item.recruitments.splice(index, 1)
                            
                        }else{
                            console.log('Failed')
                        }
                    }).catch(function () {
                        console.log('Cached Error')
                    })
                } 
            },

            saveRecruitment: function() {
                var vm = this;
                this.$validator.validate('recruitment.*').then((result) => {
                    if (result) {
                        if(this.recruitment.index != undefined){
                            $('#overlay').css('display', 'block');
                            axios.put('{{ route('enterpriserecruitment.index') }}/' + vm.recruitment.ID, vm.recruitment)
                                .then(function(response){
                                    if(response.data.updated){
                                        $("#modalRecruitment").modal("hide");
                                        $('#overlay').css('display', 'none');
                                        Object.assign(vm.item.recruitments[vm.recruitment.index], response.data.data)
                                        vm.initialize();
                                    }else{
                                        console.log('Failed')
                                    }
                                }).catch((err) => {
                                    console.log('Catched Error' + err)
                                });
                        } else {
                            $('#overlay').css('display', 'block');
                            axios.post('{{ route('enterpriserecruitment.store') }}', vm.recruitment)
                                .then(function(response){
                                    if(response.data.created){
                                        $("#modalRecruitment").modal("hide");
                                        $('#overlay').css('display', 'none');
                                        vm.item.recruitments.push(response.data.data);
                                        vm.initialize();
                                    }else{
                                        console.log('Failed')
                                    }
                                }).catch((err) => {
                                    console.log('Catched Error' + err)
                                });
                        }
                    }
                })

            },

            save: function() {
                var vm = this;  var nameValid = true;
                this.$validator.validate('basic.*').then((result) => {
                    if (result) {
                        for (let index = 1; index < this.allEnterprices.length; index++) {
                            if(this.allEnterprices[index]["Name of enterprise"] == (this.item["Name of enterprise"]).trimLeft().trimRight()){
                                alert("Name of enterprise is already existed!"); 
                                nameValid = false; break;
                            }
                        }
                        if(nameValid){
                            $('#overlay').css('display', 'block');
                            axios.put('{{ route('enterprise.index') }}/' + this.item.ID, this.item)
                                .then(function(response) {
                                    if (response.data.updated) {
                                        $('#overlay').css('display', 'none');
                                    } else {
                                        console.log('Failed')
                                    }
                                }).catch((err) => {
                                    let errors = err.response.data.errors;
                                    if (errors) {
                                        for (let field in errors) {
                                            vm.errors.add(field, errors[field])
                                        }
                                    }
                                });
                        }
                    }
                })
            },

            onPickFile() {
                this.$refs.image.click()
            },

            onFilePicked(event) {
                const files = event.target.files || event.dataTransfer.files

                vm = this

                if (files && files[0]) {
                    let filename = files[0].name

                    if (filename && filename.lastIndexOf('.') <= 0) {
                        return //return alert('Please add a valid image!')
                    }

                    const fileReader = new FileReader()

                    fileReader.onload = (e) => {
                        vm.assessor.Image = e.target.result;
                        $('#imagePreview').attr('src', fileReader.result);
                    };
                    fileReader.readAsDataURL(files[0]);

                    this.$emit('input', files[0])
                }
            },

            removeFile() {
                $('#imagePreview').attr('src', 'data:image/png;base64,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');
                this.item.Image = 'data:image/png;base64,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'
            }
        },

    });
</script>

@endpush