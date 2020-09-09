@extends('app')

@push('styles')

    //Style 

@endpush

@section('title')

បញ្ជីអ្នកបណ្ដុះបណ្ដាល | TRAINING PROVIDERS LISTS

@endsection

@section('content')

    <div class="default-style-box">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">
                    <a href="{{ route('provider.create') }}" class="btn btn-raised btn-primary"><i class="ti-plus mr-5"></i>បង្កើតអ្នកបណ្ដុះបណ្ដាល | New Training Provider</a>
                </h3>
            </div>
            <div class="widget-body">
                <table id="DataTables" cellspacing="0" width="100%" class="table table-striped table-centered text-center table-bordered dataTable" role="grid" aria-describedby="example-1_info" style="width: 100%;">
                    <thead>
                        <tr class="text-center">
                            <th> លេខរៀង <p>ID</p></th>
                            <th>ស្ថាបន័<p>Orginisation/ Institute</p></th>
                            <th>ប្រភេទ<p>Type</p></th>
                            <th>តំបន់<p>Sector/ Focus Area</p></th>
                            <th>គោលដៅ បង្រៀន<p>Target learner type</p></th>
                            <th>ទីតាំង<p>Location</p></th>
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
                lengthChange: true,
                responsive: true,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
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
                ajax: '{!! route('provider.datatable') !!}',
                columns: [
                    { data: 'ID', name: 'ID', searchable: false , visible:false},
                    { data: 'Name organization_institution', name: 'Name organization_institution' },
                    { data: 'Type', name: 'Type', orderable: false, searchable: false },
                    { data: 'Sector', name: 'Sector', orderable: false, searchable: false },
                    { data: 'Target learner type', name: 'Target learner type', orderable: false, searchable: false },
                    { data: 'Location', name: 'Location', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
            });
        });
    </script>

@endpush