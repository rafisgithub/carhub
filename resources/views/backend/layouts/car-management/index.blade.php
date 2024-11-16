@extends('backend.app')

@section('title', 'Car Management')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="table-responsive">
            <table class="table table-bordered data-table table-dark">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Car Owner</th>
                        <th>Contact Number</th>
                        <th>Car Model</th>
                        <th>VIN Number</th>
                        <th>Car Image</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection


@push('scripts')
    <script>



        $(document).ready(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('car-management.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'user.name', name: 'user.name'},
                    {data: 'contact_number', name: 'contact_number'},
                    {data: 'model', name: 'model'},
                    {data: 'vin_number', name: 'vin_number'},
                    {data: 'thumbnail', name: 'thumbnail'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    {data: 'status', name: 'status', orderable: false, searchable: false},

                ]
            });


        });

        function ChaneStatus(id) {
        $.ajax({
            url: "{{ route('change.status',':id') }}".replace(':id', id) ,
            type: "POST",
            success: function(response) {
                toastr.success(response.message);
                $('.data-table').DataTable().ajax.reload();
            },
            error: function(data) {
                alert("Error occurred while changing the status");
            }
        });
    }

    </script>
@endpush

