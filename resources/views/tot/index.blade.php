@extends('app')

@push('styles')

    //Style 

@endpush

@section('title')

  ការបណ្តុះបណ្តាលគ្រូបង្គោល | Training of Trainers

@endsection

@section('content')
   
    <div class="default-style-box ">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">
                    <a href="{{ route('tot.create') }}" class="btn btn-raised btn-primary"><i class="ti-plus mr-5"></i>បង្កើតថ្មី | New TOT</a>
                </h3>
            </div>
            <div class="widget-body">
                <table id="DataTables" cellspacing="0" width="100%" class="table table-striped table-centered text-center table-bordered dataTable" role="grid" aria-describedby="example-1_info" style="width: 100%;">
                    <thead>
                        <tr class="text-center">
                            <th> លេខរៀង <p>ID</p></th>
                            <th><p>Traning Org</p></th>
                            <th>កាលបវិច្ឆេគ<p>Date</p></th>
                            <th>ប្រធានបទ<p>Topic</p></th>
                            <th><p>IADC</p></th>
                            <th>អ្នកចូលរួម<p>Attendees</p></th>
                            <th>ជំរើស<p>Action</p></th>
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
                ajax: '{!! route('tot.datatable') !!}',
                columns: [
                    { data: 'ID', name: 'ID', searchable: false , visible:false},
                    { data: 'TrainingOrg', name: 'TrainingOrg', orderable: false, searchable: false },
                    { data: 'Start Date', name: 'Start Date' },
                    { data: 'Topic', name: 'Topic', orderable: false, searchable: false },
                    { data: 'IADC', name: 'IADC', orderable: false, searchable: false },
                    { data: 'Attendees', name: 'Attendees', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
            });
        });
    </script>

@endpush