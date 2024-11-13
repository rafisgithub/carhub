@extends('backend.app')

@section('title', 'Transmission')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Transmission
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="CarTransmissionForm">
                            <input type="hidden" name="id" id="HidenInput">
                            <div class="mb-3">
                                <input id="TransmissionTypeInput" type="text" class="form-control" placeholder="Transmission Type" name="transmission_type">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submitCarTransmissionForm">Add</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-dark data-table mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Transmission Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {


            $("#submitCarTransmissionForm").click(function(event) {
                event.preventDefault();

                let form = $("#CarTransmissionForm");
                let url, type;

                let transmissionId = $('#HidenInput').val();
                if (transmissionId) {
                    url = "{{ route('car-transmission.update', ':id') }}".replace(':id', transmissionId);
                    type = "PUT";
                } else {
                    url = "{{ route('car-transmission.store') }}";
                    type = "POST";
                }

                $.ajax({
                    type: type,
                    url: url,
                    data: form.serialize(),
                    success: function(response) {
                        toastr.success(response.message);
                        $('#exampleModal').modal('hide');
                        $('#CarTransmissionForm').trigger("reset");
                        $('#submitCarTransmissionForm').text('Add');
                        $('.data-table').DataTable().ajax.reload();
                    },
                    error: function(data) {
                        alert("Error occurred while submitting the form");
                    }
                });
            });


            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('car-transmission.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'transmission_type', name: 'transmission_type' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });


        function EditCarTransmission(id, transmission_type) {
            $('#HidenInput').val(id);
            $('#TransmissionTypeInput').val(transmission_type);
            $('#submitCarTransmissionForm').text('Update');
            $('#exampleModal').modal('show');
        }

        function DeleteCarTransmission(id)
        {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('car-transmission.destroy', ':id') }}".replace(':id', id),
                        success: function(response) {
                            toastr.success(response.message);
                            $('.data-table').DataTable().ajax.reload();
                        },
                        error: function(data) {
                            alert("Error occurred while deleting the data");
                        }
                    });
                }
            });
        }
        </script>
@endpush
