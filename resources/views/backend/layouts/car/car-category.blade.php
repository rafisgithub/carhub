@extends('backend.app')

@section('title', 'Transmission')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
           Car Category
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
                        <form id="CarCategoryForm">
                            <input type="hidden" name="id" id="HidenInput">
                            <div class="mb-3">
                                <input id="CarCategoryInput" type="text" class="form-control" placeholder="Car Category" name="category">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submitCarCategoryForm">Add</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-dark data-table ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Car Category</th>
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


            $("#submitCarCategoryForm").click(function(event) {
                event.preventDefault();

                let form = $("#CarCategoryForm");
                let url, type;

                let transmissionId = $('#HidenInput').val();
                if (transmissionId) {
                    url = "{{ route('car-category.update', ':id') }}".replace(':id', transmissionId);
                    type = "PUT";
                } else {
                    url = "{{ route('car-category.store') }}";
                    type = "POST";
                }

                $.ajax({
                    type: type,
                    url: url,
                    data: form.serialize(),
                    success: function(response) {
                        toastr.success(response.message);
                        $('#exampleModal').modal('hide');
                        $('#CarCategoryForm').trigger("reset");
                        $('#submitCarCategoryForm').text('Add');
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
                ajax: "{{ route('car-category.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'category', name: 'category' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });


        function EditCarTransmission(id, category) {
            $('#HidenInput').val(id);
            $('#CarCategoryInput').val(category);
            $('#submitCarCategoryForm').text('Update');
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
                        url: "{{ route('car-category.destroy', ':id') }}".replace(':id', id),
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
