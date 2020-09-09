@extends('app')

@push('styles')

@endpush

@section('title')

បញ្ជីសិក្ខាកាម / TRAINEE LIST

@endsection

@section('content')

<div class="widget">
    <div class="widget-heading">
        <h3 class="widget-title">
            <a href="{{ route('trainee.create') }}" class="btn btn-raised btn-primary"><i class="ti-plus mr-5"></i> បង្កើតសិក្ខាកាមថ្មី / New Trainee</a>
        </h3>
    </div>
    <div class="widget-body">
        {{-- @if(\Auth::user()->role == 'Administrator' || \Auth::user()->role == 'SDP') --}}
        <div class="row" style="margin: 20px 0">
            <form method="get" class="form">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="institution"><strong>Choose Institution</strong></label>
                        <select name="institution" id="institution" class="form-control">
                            <option value="%">All Institutions</option>
                            <option v-for="option in institutions" v-bind:value="option['ID']">@{{ option['Name organization_institution'] }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="course"><strong>Choose Course</strong></label>
                        <select name="course" id="course" class="form-control">
                            <option value="%">All Courses</option>
                            <option v-for="option in courses" v-bind:value="option['Course code']">@{{ option['Course'] }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="batchid"><strong>Choose BatchID</strong></label>
                        <select name="batchid" id="batchid" class="form-control">
                            <option value="%">All BatchID</option>
                            <option v-for="option in batches" v-bind:value="option['ID']">@{{ option['FullBatchID'] }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="province"><strong>Choose Province</strong></label>
                        <select name="province" id="province" class="form-control" v-model="province">
                            <option value="%">All Provinces</option>
                            <option v-for="option in provinces" v-bind:value="option['Province']">@{{ option['Province'] }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="district"><strong>Choose District</strong></label>
                        <select name="district" id="district" class="form-control">
                            <option value="%">All Districts</option>
                            <option v-for="option in districts[province]" v-bind:value="option['District']">@{{ option['District'] }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
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
                    <th width="80"> រូបថត<p>Photo</p>
                    </th>
                    <th> លេខរៀង <p>ID</p>
                    </th>
                    <th> គោត្ដនាម <p>Name</p>
                    </th>
                    <th> ឈ្មោះខ្មែរ | <p>Khmer Name</p>
                    </th>
                    <th> ភេទ <p>Sex</p>
                    </th>
                    <th> ថ្ងៃខែឆ្នាំកំណើត <p>Date of Birth</p>
                    </th>
                    <th> ខេត្ដ <p>Province</p>
                    </th>
                    <th> ស្រុក <p>District</p>
                    </th>
                    <th> មុខវិជ្ជា <p>Course</p>
                    </th>
                    <th> លេខសម្គាល់​​​​​​​​​​​​​ <p>BatchID</p>
                    </th>
                    <th> ស្ថានភាព <p>Status</p>
                    </th>
                    <th> លេខទូរសព្ទ័ <p>Phone</p>
                    </th>
                    <th> ស្ថាបន័ <p>Instution</p>
                    </th>
                    <th> ជំរើស <p>Action</p>
                    </th>
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
                institutions: {!! $institutions !!}, 
                courses: {!! $courses !!}, 
                provinces: {!! $provinces !!}, 
                districts: {!! $districts !!}, 
                batches: {!! $batches !!}, 
                province: '{!! isset($_GET["province"]) ? $_GET["province"] : "" !!}'
            },
        })
        jQuery(document).ready(function($){
            var table = $('#DataTables').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: true,
                responsive: true,
                order: [[ 1, "desc" ]],
                lengthMenu: [[10, 25, 50, 500], [10, 25, 50, 500]],
                pageLength: 10,
                buttons: [
                    {text: 'Reload', action: function ( e, dt, node, config ) { dt.ajax.reload();}}, 
                    {extend: 'excel', text: 'Excel', title: 'Trainee List', exportOptions: {columns: ':visible'}, charset: "UTF-8", bom: true}, 
                    {extend: 'print', text: 'Print', title: 'Trainee List', exportOptions: {columns: ':visible'}, charset: "UTF-8", bom: true}, 
                    {extend: 'colvis', text: 'Options'}
                ],
                stateSave: false,
                initComplete: function(){
                    table.buttons().container().appendTo( $('.col-sm-6:eq(0)', table.table().container()) );
                },
                ajax: {
                    url: '{!! route('trainee.datatable') !!}',
                    data: function (d) {
                        d.province = $('#province').val();
                        d.district = $('#district').val();
                        d.institution = $('#institution').val();
                        d.course = $('#course').val();
                        d.batchid = $('#batchid').val();
                    }
                },
                columns: [
                    { data: 'Image', name: 'Image', orderable: false, searchable: false },
                    { data: 'ID', name: 'ID', searchable: false , visible:false},
                    { data: 'Full Name', name: 'Full Name' },
                    { data: 'KhmerName', name: 'KhmerName'},
                    { data: 'Sex', name: 'Sex' },
                    { data: 'Date Of Birth', name: 'Date Of Birth' },
                    { data: 'Province', name: 'Province' , searchable: false, orderable: false },
                    { data: 'District', name: 'District', searchable: false, orderable: false  },
                    { data: 'Course', name: 'Course', searchable: false, orderable: false  },
                    { data: 'BatchID', name: 'BatchID', searchable: false, orderable: false  },
                    { data: 'Status', name: 'Status' },
                    { data: 'Phone No', name: 'Phone No' },
                    { data: 'Institution', name: 'Institution', orderable: false, searchable: false },
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