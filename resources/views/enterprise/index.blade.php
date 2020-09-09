@extends('app')

@section('title')

    បញ្ជីសហគ្រាស | All Enterprises

@endsection

@section('content')

    <div class="widget">
        <div class="widget-heading">
            <h3 class="widget-title">
                <a href="{{ route('enterprise.create') }}" class="btn btn-raised btn-primary"><i class="ti-plus mr-5"></i> New Enterprise | បង្កើតសហគ្រាសថ្មី</a>
            </h3>
        </div>
        <div class="widget-body">
            {{-- @if(\Auth::user()->role == 'Administrator' || \Auth::user()->role == 'SDP') --}}
                <div class="row" style="margin: 20px 0">
                    <form method="get" class="form">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="province"><strong>Choose Province</strong></label>
                                <select name="province" id="province" class="form-control" v-model="province">
                                    <option value="%">All Provinces</option>
                                    <option v-for="option in provinces" v-bind:value="option['Province']" >@{{ option['Province'] }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="district"><strong>Choose District</strong></label>
                                <select name="district" id="district" class="form-control">
                                    <option value="%">All Districts</option>
                                    <option v-for="option in districts[province]" v-bind:value="option['District']" >@{{ option['District'] }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="activity"><strong>Choose Type of business</strong></label>
                                <select name="activity" id="activity" class="form-control">
                                    <option value="%">All Type of business</option>
                                    <option v-for="option in activities" v-bind:value="option['ID']" >@{{ option['Activity'] }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="intervention"><strong>Choose IADC</strong></label>
                                <select name="intervention" id="intervention" class="form-control">
                                    <option value="%">All</option>
                                    <option v-for="option in interventions" v-bind:value="option['ID']" >@{{ option['Code'] }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="hire"><strong>Choose Hire Graduate</strong></label>
                                <select name="hire" id="hire" class="form-control">
                                    <option value="%">All</option> 
                                    <option v-for="option in hires" v-bind:value="option" >@{{ option }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="giving"><strong>Choose Giving Training</strong></label>
                                <select name="giving" id="giving" class="form-control">
                                    <option value="%">All</option> 
                                    <option v-for="option in givings" v-bind:value="option" >@{{ option }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="rpl"><strong>Choose RPL</strong></label>
                                <select name="rpl" id="rpl" class="form-control">
                                    <option value="%">All</option> 
                                    <option v-for="option in rpls" v-bind:value="option" >@{{ option }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button type="button" id="search-form" class="btn btn-raised btn-primary form-control">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            {{-- @endif --}}
            <table id="DataTables" cellspacing="0" width="100%" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="example-1_info" style="width: 100%;">
                <thead>
                    <th> លេខរៀង <p>ID</p></th>
                    <th>  ឈ្មោះសហគ្រាស <p>Name</p></th>
                    <!-- <th>  ឈ្មោះសហគ្រាស(ខ្មែរ) <p>Name (Khmer)</p></th> -->
                    <th> ទីតាំង <p>Location</p></th>
                    <th>  ប្រភេទអាជីវកម្ម <p>Type of business</p></th>
                    <th> ផ្តល់ការបណ្តុះបណ្តាល <p>Giving Training</p></th>
                    <th> IADC </th>
                    <th> ជួលសិក្ខាកាមដែលបានបញ្ចប់ការសិក្សា <p>Hire Graduate</p></th>
                    <th> RPL </th>
                    <th>  ជំរើស <p>Action</p></th>
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
                hires: ['ទេ/No', 'បាទ/Yes'], 
                rpls: ['ទេ/No', 'បាទ/Yes'], 
                givings: ['ទេ/No', 'បាទ/Yes'], 
                provinces: {!! $provinces !!}, 
                districts: {!! $districts !!}, 
                activities: {!! $activities !!}, 
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
                    url: '{!! route('enterprise.datatable') !!}',
                    data: function (d) {
                        d.province = $('#province').val();
                        d.district = $('#district').val();
                        d.intervention = $('#intervention').val();
                        d.hire = $('#hire').val();
                        d.rpl = $('#rpl').val();
                        d.giving = $('#giving').val();
                        d.activity = $('#activity').val();
                    }
                },
                columns: [
                    { data: 'ID', name: 'ID', searchable: false , visible:false},
                    { data: 'Name of enterprise', name: 'Name of enterprise' },
                    // { data: 'Name of enterprise kh', name: 'Name of enterprise kh' },
                    { data: 'Location', name: 'Location', orderable: false, searchable: false  },
                    { data: 'Activity', name: 'Activity', orderable: true, searchable: false  },
                    { data: 'Enterprise involved in SDP training', name: 'Enterprise involved in SDP training' },
                    { data: 'IADC', name: 'IADC', orderable: true, searchable: false },
                    { data: 'Hired graduates', name: 'Hired graduates' },
                    { data: 'RPL participant', name: 'RPL participant' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
            });

            $('#search-form').on('click', function(e) {
                table.draw();
                e.preventDefault();
            });
        });
    </script>

@endpush