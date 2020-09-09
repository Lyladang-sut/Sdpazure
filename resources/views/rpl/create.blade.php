@extends('app')

@section('title')

    EDIT RPL LIST

@endsection

@section('content')

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-views" style="width: 45%;top:10%;background: #FFF">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="gridModalLabel">TOA Training</h4>
        </div>
        <form action="" data-vv-scope="test">
            <div class="modal-content load-modal-form">
                <div class="form-horizontal tot-modal-form panel-body">
                    <div class="form-group required" :class = "{'has-error': errors.has('test.Participant Name') }">
                        {!! Form::Label('Participant Name', 'Participant Name', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::select('Participant Name', $participants , null, ['data-vv-name'=>'test.Participant Name', 'v-validate' => "'required'", 'v-model' => 'test["Participant Name"]', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                
                    <div class="form-group required" :class = "{'has-error': errors.has('test.income USD or Riel') }">
                        {!! Form::Label('income USD or Riel', 'income USD or Riel', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::select('income USD or Riel', $incomes , null, ['data-vv-name'=>'test.income USD or Riel', 'v-validate' => "'required'", 'v-model' => 'test["income USD or Riel"]', 'required' => 'required','class' => 'form-control']) !!}
                        </div>
                    </div>
                
                    <div class="form-group">
                        {!! Form::Label('Monthly Income  USD', 'Monthly Income  USD', [ 'class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Monthly Income  USD' , null, [ 'v-model' => 'test["Monthly Income  USD"]', 'required' => 'required','class' => 'form-control']) !!}
                        </div>
                    </div>
                
                    <div class="form-group">
                        {!! Form::Label('Monthly Income riel', 'Monthly Income riel', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::Text('Monthly Income riel' , null, [ 'v-model' => 'test["Monthly Income riel"]', 'required' => 'required','class' => 'form-control']) !!}
                        </div>
                    </div>
                
                    <div class="form-group required" :class = "{'has-error': errors.has('test.Result') }">
                        {!! Form::Label('Result', 'Result', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                            {!! Form::select('Result' , $results , null, ['data-vv-name'=>'test.Result', 'v-validate' => "'required'", 'v-model' => 'test["Result"]', 'required' => 'required','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="panel-body text-right">
                        <button data-style="expand-left" type="button" class="btn btn-raised btn-success ladda-button" @click="saveTest('test')"><span class="ladda-label">រក្សាទុក | Save</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="form-horizontal clearfix">
    <div class="widget">
        <div class="widget-heading">
            <h3 class="widget-title">
                <a href="{{ route('rpl.index') }}" class="btn btn-raised btn-default"><i class="ti-list mr-5"></i>បញ្ជី | RPL List</a>
                <div class="pull-right">
                    <button type="submit" class="btn btn-raised btn-primary" @click="save"><i class="ti-save mr-5"></i>រក្សាទុក | Save</button>
                </div>
            </h3>
        </div>
        <div class="widget-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group required" :class = "{'has-error': errors.has('items.Date of test') }">
                        {!! Form::Label('Date of test', 'Date of test', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                        {!! Form::date('Date of test', null, [ 'v-model' => 'item["Date of test"]', 'data-vv-name'=>'items.Date of test', 'v-validate' => "'required'" , 'required' => 'required','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group required" :class = "{'has-error': errors.has('items.RPL provider') }">
                        {!! Form::Label('RPL provider', 'RPL provider', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                        {!! Form::select('RPL provider', $providers , null, [ 'v-model' => 'item["RPL provider"]', 'data-vv-name'=>'items.RPL provider', 'v-validate' => "'required'" , 'required' => 'required','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group required" :class = "{'has-error': errors.has('items.Location') }">
                        {!! Form::Label('Location Test', 'Location', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                        {!! Form::select('Location', $locations , null, [ 'v-model' => 'item["Location"]', 'data-vv-name'=>'items.Location', 'v-validate' => "'required'" , 'required' => 'required','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group required" :class = "{'has-error': errors.has('items.Assesment Sector') }">
                        {!! Form::Label('Assesment Sector', 'Assesment Sector', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                        {!! Form::select('Assesment Sector', $sectors , null, [ 'v-model' => 'item["Assesment Sector"]', 'data-vv-name'=>'items.Assesment Sector', 'v-validate' => "'required'" , 'required' => 'required','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group required" :class = "{'has-error': errors.has('items.Course') }">
                        {!! Form::Label('Occupation', 'Course', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                        {!! Form::select('Course', $courses , null, [ 'v-model' => 'item["Course"]', 'data-vv-name'=>'items.Course', 'v-validate' => "'required'" , 'required' => 'required','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group required" :class = "{'has-error': errors.has('items.Batch') }">
                        {!! Form::Label('Batch ID', 'Batch', ['class' => 'control-label col-lg-6']) !!}
                        <div class="col-lg-6">
                        {!! Form::select('Batch', $batches, null, [ 'v-model' => 'item["Batch"]', 'data-vv-name'=>'items.Batch', 'v-validate' => "'required'" , 'required' => 'required','class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">

                    <h4>RPL Test Attendees</h4>
                    
                    <table class="table table-responsive" id="DataTables">
                        <thead>
                            <tr style="background: #1f364f; color: #fff">
                                <th>No</th>
                                <th>Participant Name</th>
                                <th>Monthly income USD</th>
                                <th>Result</th>
                                <th><button type="button" class="btn btn-raised btn-success btn-sm pull-right" @click="addItem">Add</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, key) in item.tests" :key="key">
                                <td>
                                    @{{ ++key }}
                                </td>
                                <td>
                                    @{{ participants[item['Participant Name']] }}
                                </td>
                                <td>
                                    @{{ item['Monthly Income  USD'] }}
                                </td>
                                <td>
                                    @{{ item['Result'] }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-raised btn-warning btn-sm" @click="editItem(item)">Edit</button>
                                    @if(\Auth::user()->role == 'Administrator')
                                        <button type="button" class="btn btn-raised btn-danger btn-sm" @click="deleteItem(item)">Delete</button>
                                    @endif  

                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                item: {
                    tests: []   
                },
                test: {},
                participants: {!! $participants->toJson() !!},
            },

            created() {
            //console.log([].concat(...Object.values(this.owners)).find(x => x['OM at Intake.ID'] == 55)['Full Name'])
            },

            methods: {
                
                initialize: function () {
                    
                },

                saveTest: function(scope){
                    var vm = this;
                    this.$validator.validateAll(scope).then((result) => {
                        if(result){
                            if(!(this.editItems)){
                                this.item.tests.push(this.test)
                            }
                            $("#modal").modal("hide");
                        }
                    });
                },

                addItem: function() {
                    this.test = {}
                    this.editItems = false
                    $("#modal").modal("show");
                },

                editItem: function(item) {
                    this.test = item
                    this.editItems = true
                    $("#modal").modal("show");
                },

                deleteItem: function(item) {
                    const index = this.item.tests.indexOf(item)
                    this.item.tests.splice(index, 1)
                },

                save: function( ){
                    var vm = this;
                    this.$validator.validateAll().then((result) => {
                        if (result) {
                            $('#overlay').css('display', 'block');
                            axios.post('{{ route('rpl.store') }}', this.item)
                                .then(function(response){
                                    if(response.data.created){
                                        $('#overlay').css('display', 'none');
                                        window.location = '{{ route('rpl.index') }}';
                                    }else{
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
                    })
                }
            },
            
        });

        jQuery(document).ready(function($){
            @if(\Auth::user()->role == 'Administrator')
                var table = $('#DataTables').DataTable({
                    order: [[ 0, "desc" ]],
                    lengthChange: true,
                    responsive: true,
                    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    pageLength: 10,
                    // dom: 'Bfrtip',
                    dom: "<'row'<'col-sm-12'B>><'row'<'col-sm-12'>><'row'<'col-sm-4'l><'col-sm-8'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-4'i><'col-sm-8'p>>",
                    buttons: [
                        // 'copy', 'csv', 'excel', 'pdf', 'print'
                        {extend: 'excel', text: 'Excel', title: 'RPL Participants', exportOptions: {columns:  [0, 1, 2, 3]}, charset: "UTF-8", bom: true}, 
                        {extend: 'print', text: 'Print', title: 'RPL Participants', exportOptions: {columns:  [0, 1, 2, 3]}, charset: "UTF-8", bom: true}, 
                        {extend: 'colvis', text: 'Option'}
                    ],
                });
            @else
                var table = $('#DataTables').DataTable({
                    order: [[ 0, "desc" ]],
                    lengthChange: true,
                    responsive: true,
                    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    pageLength: 10
                    // dom: 'Bfrtip',
                    // buttons: [
                    //     // 'copy', 'csv', 'excel', 'pdf', 'print'
                    //     {extend: 'excel', text: 'Excel', title: 'RPL Participants', exportOptions: {columns:  [0, 1, 2]}, charset: "UTF-8", bom: true}, 
                    //     {extend: 'print', text: 'Print', title: 'RPL Participants', exportOptions: {columns:  [0, 1, 2]}, charset: "UTF-8", bom: true}, 
                    //     {extend: 'colvis', text: 'Option'}
                    // ],
                });
            @endif
            
        });


    </script>

@endpush