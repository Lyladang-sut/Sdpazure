@extends('app')

@section('title')

    RIL LISTS

@endsection

@section('content')
    <div class="widget">
        <div class="widget-heading">
            <h3 class="widget-title">
                <a href="{{ route('rpl.create') }}" class="btn btn-raised btn-primary"><i class="ti-plus mr-5"></i>បង្កើតថ្មី | New RPL</a>
            </h3>
        </div>
        <div class="widget-body">

            <table id="DataTables" cellspacing="0" width="100%" class="table table-striped table-centered text-center table-bordered dataTable" role="grid" aria-describedby="example-1_info" style="width: 100%;">
                <thead>
                    <tr class="text-center">
                        <th> លេខរៀង <p>ID</p></th>
                        <th width="80">ថ្ងៃសាកល្បង<p>Date of test</p></th>
                        <th>RPL provider</th>
                        <th>កន្លែងសាកល្បង <p>Location test</p></th>
                        <th>Assesment Sector</th>
                        <th>មុខរបរ <p>Occupation</p></th>
                        <th>លេខសំគាល់ជំនាន់ <p>Batch id</p></th>
                        <th>ជម្រើស <p>Action</p></th>
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
        jQuery(document).ready(function($){
            var table = $('#DataTables').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: true,
                responsive: true,
                pageLength: 20,
                order: [[ 0, "desc" ]],
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
                ajax: '{!! route('rpl.datatable') !!}',
                columns: [
                    { data: 'ID', name: 'ID', searchable: false , visible:false},
                    { data: 'Date of test', name: 'Date of test', orderable: false, searchable: false },
                    { data: 'RPL provider', name: 'RPL provider' },
                    { data: 'Location', name: 'Location', orderable: false, searchable: false },
                    { data: 'Assesment Sector', name: 'Assesment Sector', orderable: false, searchable: false },
                    { data: 'Course', name: 'Course', orderable: false, searchable: false },
                    { data: 'Batch', name: 'Batch', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
            });
        });
    </script>
@endpush 