@extends('backend.app')

@section('title', 'Transmission')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
           Add Seller Type
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
                        <form id="CarSellerTypeForm">
                            <input type="hidden" name="id" id="hiddenInput">
                            <div class="mb-3">
                                <input id="SellerTypeInput" type="text" class="form-control" placeholder="Seller Type" name="seller_type">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submitCarSelerTypeFormButton">Add</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-dark data-table mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Seller Type</th>
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

        $("#submitCarSelerTypeFormButton").click(function(event) {
            event.preventDefault();

            let form = $("#CarSellerTypeForm");
            let url, type;

            let sellerTypeId = $('#hiddenInput').val();

            if (sellerTypeId) {
                $('#hiddenInput').val('');
                url = "{{ route('seller-type.update', ':id') }}".replace(':id', sellerTypeId);
                type = "PUT";
            } else {
                
                url = "{{ route('seller-type.store') }}";
                type = "POST";
            }

            $.ajax({
                type: type,
                url: url,
                data: form.serialize(),
                success: function(response) {
                    toastr.success(response.message);
                    $('#exampleModal').modal('hide');
                    $('#CarSellerTypeForm').trigger("reset");
                    $('#submitCarSelerTypeFormButton').text('Add');
                    $('hiddenInput').val('');
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
            ajax: "{{ route('seller-type.index') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'seller_type', name: 'seller_type' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
        });


        function EditSellerType(id, seller_type)
        {
        $('#hiddenInput').val(id);
        $('#SellerTypeInput').val(seller_type);

        $('#submitCarSelerTypeFormButton').text('Update');
        $('#exampleModal').modal('show');
        }


        function DeleteSellerType(id)
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
                    url: "{{ route('seller-type.destroy', ':id') }}".replace(':id', id),
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
