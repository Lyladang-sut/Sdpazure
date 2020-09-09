@extends('app')

@section('title')
    កែប្រែព័ត៌មានអ្នកប្រើប្រាស់ | Edit User
@endsection

@section('content')
{!! Form::open(['route' => ['user.store'], '@submit' => 'save', 'method' => 'POST', 'class' => 'form-horizontal clearfix']) !!}
    <div class="default-style-box">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title"> 
                    <a href="{{ route('user.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជីអ្នកប្រើប្រាស់ | User List</a>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-raised btn-primary"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
                    </div>
                </h3>
            </div>
            <div class="widget-body">
                <div class="form-group required" :class = "{'has-error': errors.has('First Name') }">
                    {!! Form::Label('First Name', 'First Name', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Text('First Name', null, [ 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group required" :class = "{'has-error': errors.has('Last Name') }">
                    {!! Form::Label('Last Name', 'Last Name', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Text('Last Name', null, [ 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group required" :class = "{'has-error': errors.has('Training Provider') }">
                    {!! Form::Label('Training Provider', 'Training Provider', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('Training Provider', $providers, null, [ 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group required" :class = "{'has-error': errors.has('email') }">
                    {!! Form::Label('email', 'Email', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Email('email', null, [ 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group required" :class = "{'has-error': errors.has('password') }">
                    {!! Form::Label('password', 'Password', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Password('password', [ 'v-validate' => "'required'", 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group required" :class = "{'has-error': errors.has('role') }">
                    {!! Form::Label('role', 'Role', ['class' => 'control-label col-lg-6']) !!}
                    <div class="col-lg-6">
                        {!! Form::Select('role', ['User'=> 'User', 'SDP' => 'SDP', 'Administrator' => 'Administrator'], null, [ 'v-validate' => "'required'", 'class' => 'form-control']) !!}
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