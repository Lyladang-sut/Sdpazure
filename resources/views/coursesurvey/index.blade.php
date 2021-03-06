@extends('app')

@section('title')

បញ្ជីតាមដានបណ្តុះបណ្តាល | COURSE SURVEY LISTS

@endsection

@section('content')

<div class="default-style-box">
    <div class="widget">
        <div class="widget-heading">
            <h3 class="widget-title">
                <a href="{{ route('course-survey.create') }}" class="btn btn-raised btn-primary"><i class="ti-plus mr-5"></i>បង្កើតថ្មី | New Course Survey</a>
            </h3>
        </div>
        <div class="widget-body">
            <table id="DataTables" cellspacing="0" width="100%" class="table table-striped table-centered text-center table-bordered dataTable" role="grid" aria-describedby="example-1_info" style="width: 100%;">
                <thead>
                    <tr class="text-center">
                        <th>លេខសំគាល់ជំនាន់ <p>Batch ID</p></th>
                        <th>Training Provider</th>
                        <th>ភេទអ្នកឆ្លើយសំនួរ <p>Sex respondent</p></th>
                        <th>អ្នកដាក់ស្នើ <p>Submitter</p></th>
                        <th>ជម្រើស <p>Action</p></th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function($){
            var table = $('#DataTables').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                lengthChange: false,
                pageLength: 20,
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
                ajax: '{!! route('course-survey.datatable') !!}',
                columns: [
                    { data: 'Course Batch ID', name: 'Course Batch ID', orderable: false, searchable: false },
                    { data: 'Training Provider', name: 'Training Provider' },
                    { data: 'Sex respondent', name: 'Name Of Trainer', orderable: false, searchable: false },
                    { data: 'Submitter', name: 'Submitter', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
            });
        });
    </script>
@endpush 