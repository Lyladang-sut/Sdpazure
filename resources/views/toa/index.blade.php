@extends('app')

@push('styles')

@endpush

@section('title')

    TOA LISTS

@endsection

@section('content')

    <div class="default-style-box">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">
                    <a href="{{ route('toa.create') }}" class="btn btn-raised btn-primary"><i class="ti-plus mr-5"></i>បង្កើតថ្មី | New TOA</a>
                </h3>
            </div>
            <div class="widget-body">
                <table id="DataTables" cellspacing="0" width="100%" class="table table-striped table-centered text-center table-bordered dataTable" role="grid" aria-describedby="example-1_info" style="width: 100%;">
                    <thead>
                        <tr class="text-center">
                            <th> លេខរៀង <p>ID</p></th>
                            <th>ការបណ្តុះបណ្តាល     <p>Training Orginisation</p></th>
                            <th>អន្តរាគមន៍       ​​  <p>Intervention</p></th>
                            <th>វគ្គបណ្ដុះបណ្ដាល      <p>Course Trained</p></th>
                            <th>ថ្ងៃចាប់ផ្ដើម         <p>Start Date</p></th>
                            <th>ថ្ងៃបញ្ចប់            <p>End Date</p></th>
                            <th>Number of sessions</th>
                            <th>Delivery Channel</th>
                            <th>ជម្រើស              <p>Action</p></th>
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
                ajax: '{!! route('toa.datatable') !!}',
                columns: [
                    { data: 'ID', name: 'ID', searchable: false , visible:false},
                    { data: 'Training Orginisation', name: 'Training Orginisation', orderable: false, searchable: false },
                    { data: 'Intervention', name: 'Intervention' },
                    { data: 'Course Trained', name: 'Course Trained' },
                    { data: 'Start Date', name: 'Start Date' },
                    { data: 'End Date', name: 'End Date' },
                    { data: 'Number of sessions', name: 'Number of sessions' },
                    { data: 'Delivery Channel', name: 'Delivery Channel' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
            });
        });
    </script>
@endpush