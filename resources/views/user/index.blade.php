@extends('app')

@section('title')
    បញ្ជីអ្នកប្រើប្រាស់ | User List
@endsection

@section('content')
    <div class="default-style-box">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title user_title"> បញ្ជីអ្នកប្រើប្រាស់ | User List</h3>
            </div>
            <div class="widget-body">
                <table id="DataTables" cellspacing="0" width="100%" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="example-1_info" style="width: 100%;">
                    <thead>
                        <th> លេខរៀង <p>ID</p></th>
                        <th>ឈ្មោះ ​​ <p>Name</p></th>
                        <th>អ៊ីម៉ែល <p>Email</p></th>
                        <th>តួនាទី <p>Role</p></th>
                        <th width="150">ជម្រើស <p>Action</p></th>
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
                order: [[ 0, "desc" ]],
                buttons: [
                    {text: 'Reload', action: function ( e, dt, node, config ) { dt.ajax.reload();}}, 
                    {extend: 'excel', text: 'Excel', title: 'Users', exportOptions: {columns: ':visible'}, charset: "UTF-8", bom: true}, 
                    {extend: 'print', text: 'Print', title: 'Users', exportOptions: {columns: ':visible'}, charset: "UTF-8", bom: true}, 
                    {extend: 'colvis', text: 'Colvis'}
                ],
                stateSave: true,
                initComplete: function(){
                    table.buttons().container().appendTo( $('.col-sm-6:eq(0)', table.table().container()) );
                },
                ajax: '{!! route('user.datatable') !!}',
                columns: [
                    { data: 'ID', name: 'ID', searchable: false , visible:false},
                    { data: 'Full Name', name: 'Full Name' },
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'role' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
            });
        });
    </script>

@endpush