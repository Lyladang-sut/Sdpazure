@extends('app')

@section('title')

    CREATE TRAINING PROVIDER

@endsection

@section('content')

    {!! Form::open(['route' => 'provider.store', '@submit' => 'save', 'class' => 'form-horizontal clearfix']) !!}
        <div class="widget">
            <div class="widget-heading">
                <a href="{{ route('provider.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជីអ្នកបណ្ដុះបណ្ដាល | Traning Provider List</a>
                <div class="pull-right">
                    <button type="submit" class="btn btn-raised btn-primary"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
                </div>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group required" :class = "{'has-error': errors.has('Name organization_institution') }">
                            {!! Form::Label('Name organization_institution', 'Orginisation/ Institute', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Text('Name organization_institution', null, ['v-validate' => "'required'", 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group required" :class = "{'has-error': errors.has('Type') }">
                            {!! Form::Label('Type', 'Type', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Type', $type, null, [ 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    
                        <div class="form-group required" :class = "{'has-error': errors.has('Sector') }">
                            {!! Form::Label('Sector', 'Sector/ Focus Area', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Sector',$sector, null, [ 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    
                        <div class="form-group required" :class = "{'has-error': errors.has('Target learner type') }">
                            {!! Form::Label('Target learner type', 'Target learner type', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Select('Target learner type',$learner_type, null, [ 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <hr>
                        <h4>Location</h4>
                    
                        <div class="form-group required" :class = "{'has-error': errors.has('Country') }">
                            {!! Form::Label('Country', 'Country', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select id="Country" name="Country" class="form-control" v-validate="'required'" v-model='item["Country"]'>
                                    <option v-for="option in ta_countries" v-bind:value="option['Country']" >@{{ option['Country'] }}</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="form-group required" :class = "{'has-error': errors.has('Province') }">
                            {!! Form::Label('Province', 'Province', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select id="Province" name="Province" class="form-control" v-validate="'required'" v-model='item["Province"]'>
                                    <option v-for="option in ta_provinces[item['Country']]" v-bind:value="option['Province']" >@{{ option['Province'] }}</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="form-group required" :class = "{'has-error': errors.has('District') }">
                            {!! Form::Label('District', 'District', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                <select id="District" name="District" class="form-control" v-validate="'required'" v-model='item["District"]'>
                                    <option v-for="option in ta_districts[item['Province']]" v-bind:value="option['ID']" >@{{ option['District'] }}</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            {!! Form::Label('Address', 'Address', ['class' => 'control-label col-lg-6']) !!}
                            <div class="col-lg-6">
                                {!! Form::Text('Address', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}

@endsection

@push('scripts')

<script type="text/javascript">
    var app = new Vue({

        el: '#App',

        data: {
            item: {},
            ta_countries: {!! $ta_countries !!},
            ta_provinces: {!! $ta_provinces !!},
            ta_districts: {!! $ta_districts !!},
            
        },
        methods: {
                save: function(e){
                    var vm = this;
                    this.$validator.validateAll().then((result) => {
                        if (!result) {
                            console.log(result);
                            e.preventDefault();
                        }
                    })
                },
            }
    });

</script>

@endpush