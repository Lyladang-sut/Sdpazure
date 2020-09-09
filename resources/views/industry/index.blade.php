@extends('app') @section('title') បញ្ជីអ្នកចូលរួមក្នុង ឧស្សាហកម្ម | Industry Participants List @endsection

@section('content')

    <div class="widget">
        <div class="widget-heading">
            <h3 class="widget-title">
                <a href="{{ route('industry.create') }}" class="btn btn-raised btn-primary"><i class="ti-plus mr-5"></i>បង្កើតអ្នកចូលរួម New Participants</a>
            </h3>
        </div>
        <div class="widget-body">
                {{-- @if(\Auth::user()->role == 'Administrator' || \Auth::user()->role == 'SDP') --}}
                <div class="row" style="margin: 20px 0">
                    <form method="get" class="form">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="province"><strong>Choose Province</strong></label>
                                <select name="province" id="province" class="form-control" v-model="province">
                                    <option value="%">All Provinces</option>
                                    <option v-for="option in provinces" v-bind:value="option['Province']" >@{{ option['Province'] }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="giving"><strong>Choose Giving Training</strong></label>
                                <select name="giving" id="giving" class="form-control">
                                    <option value="%">All</option>
                                    <option v-for="option in interventions" v-bind:value="option['ID']" >@{{ option['Code'] }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="taking"><strong>Choose Taking Training</strong></label>
                                <select name="taking" id="taking" class="form-control">
                                    <option value="%">All</option> 
                                    <option v-for="option in takings" v-bind:value="option" >@{{ option }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button type="button" id="search-form" class="btn btn-raised btn-primary form-control">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            {{-- @endif --}}
            <table id="DataTables" cellspacing="0" width="100%" class="table table-striped table-centered text-center table-bordered dataTable" role="grid" aria-describedby="example-1_info" style="width: 100%;">
                <thead>
                    <tr class="text-center">
                        <th> លេខរៀង <p>ID</p></th>
                        <th width="80">រូបថត<p>Photo</p></th>
                        <th>គោត្ដនាម<p>Name</p></th>
                        <th>សហគ្រាស<p>Enterprise</p></th>
                        <th>ទីតាំង សហគ្រាស<p>Location Enterprise</p></th>
                        <th>ផ្តល់ការបណ្ដុះបណ្ដាល<p>Giving Training</p></th>
                        <th>ទទួលការបណ្តុះបណ្តាល<p>Taking Training</p></th>
                        <th>វគ្គសិក្សា<p>Course</p></th>
                        <th>អ្នកផ្ដល់ការបណ្ដុះបណ្ដាល<p>Training provider</p></th>
                        <th>វាយតម្លៃ<p>Assessor</p></th>
                        <th>ជំរើស<p>Action</p></th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('scripts')

    <script type="text/javascript">

        var app = new Vue({
            el: '#App',

            data: {
                takings: ['No', 'Yes'], 
                givings: ['No', 'Yes'], 
                provinces: {!! $provinces !!}, 
                interventions: {!! $interventions !!},
                province: '{!! isset($_GET["province"]) ? $_GET["province"] : "%" !!}'
            },
        });

        jQuery(document).ready(function($){
            var table = $('#DataTables').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: true,
                responsive: true,
                order: [[ 0, "desc" ]],
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                pageLength: 10,
                buttons: [
                    {text: 'Reload', action: function ( e, dt, node, config ) { dt.ajax.reload();}}, 
                    {extend: 'excel', text: 'Excel', title: 'Users', exportOptions: {columns: ':visible'}, charset: "UTF-8", bom: true}, 
                    {extend: 'print', text: 'Print', title: 'Users', exportOptions: {columns: ':visible'}, charset: "UTF-8", bom: true}, 
                    {extend: 'colvis', text: 'Option'}
                ],
                stateSave: true,
                initComplete: function(){
                    table.buttons().container().appendTo( $('.col-sm-6:eq(0)', table.table().container()) );
                },
                ajax: {
                    url: '{!! route('industry.datatable') !!}',
                    data: function (d) {
                        d.province = $('#province').val();
                        d.taking = $('#taking').val();
                        d.giving = $('#giving').val();
                    }
                },
                columns: [
                    { data: 'ID', name: 'ID', searchable: false , visible:false},
                    { data: 'Image', name: 'Image', orderable: false, searchable: false },
                    { data: 'Full Name', name: 'Full Name' },
                    { data: 'Enterprise', name: 'Enterprise', orderable: false, searchable: false },
                    { data: 'EnterpriseLocation', name: 'EnterpriseLocation', orderable: false, searchable: false },
                    { data: 'GivingTraining', name: 'GivingTraining', orderable: false, searchable: false },
                    { data: 'TakingTraining', name: 'TakingTraining', orderable: false, searchable: false },
                    { data: 'Course', name: 'Course', orderable: false, searchable: false },
                    { data: 'TrainingProvider', name: 'TrainingProvider', orderable: false, searchable: false },
                    { data: 'Assessor', name: 'Assessor', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
            });

            $('#search-form').on('click', function(e) {
                table.draw();
                e.preventDefault();
            });
        });
    </script>

@endpush