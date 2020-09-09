@extends('app')

@section('title')

    MANUAL RESULT ENTRY LISTS

@endsection

@section('content')

<div class="default-style-box">
    <div class="widget">
        <div class="widget-heading">
            <h3 class="widget-title">
                <a href="{{ route('manual-result.create') }}" class="btn btn-raised btn-primary"><i class="ti-plus mr-5"></i>បង្កើតថ្មី | New Manual Result</a>
            </h3>
        </div>
        <div class="widget-body">
            <table id="DataTables" cellspacing="0" width="100%" class="table table-striped table-centered text-center table-bordered dataTable" role="grid" aria-describedby="example-1_info" style="width: 100%;">
                <thead>
                    <tr class="text-center">
                        <th> លេខរៀង <p>ID</p></th>
                        <th>កាលបរិច្ឆេទ​ចូល    <p>Entry date</p></th>
                        <th>សូចនករ          <p>Indicator</p></th>
                        <th>លទ្ធផល           <p>Result</p></th>
                        <th>ភេទ              <p>Sex</p></th>
                        <th width="350">ចំណាំ <p>Notes</p></th>
                        <th>ជម្រើស            <p>Action</p></th>
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
                lengthChange: false,
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
                ajax: '{!! route('manual-result.datatable') !!}',
                columns: [
                    { data: 'ID', name: 'ID', searchable: false , visible:false},
                    { data: 'Entry date', name: 'Entry date', orderable: false, searchable: false },
                    { data: 'Indicator', name: 'Indicator' },
                    { data: 'Result', name: 'Result', orderable: false, searchable: false },
                    { data: 'Sex', name: 'Sex', orderable: false, searchable: false },
                    { data: 'Notes', name: 'Notes', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
            });
        });
    </script>
@endpush 