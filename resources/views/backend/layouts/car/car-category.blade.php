@extends('backend.app')

@section('title', 'Home')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="alert">{{ session('success') }}</h4>

           <!-- Modal Structure -->
<div class="modal fade" id="editCarCategoryModal" tabindex="-1" aria-labelledby="editCarCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCarCategoryModalLabel">Edit Car Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form inside modal -->
                <form id="editCarCategoryForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="categoryId">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="category" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Basic Layout</h5>
                        <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('car-category.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <labe class="form-label" for="basic-default-message">Add Category</label>
                                    <input type="text" name="category" class="form-control" placeholder="Category">
                            </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>



                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    </div>


@endsection


@push('scripts')
    <script>


        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('car-category.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },

                ]
            });
        });

function editCarCategoryModal(button) {
    var categoryId = $(button).data('id');
    var categoryName = $(button).data('category');

    $('#categoryId').val(categoryId);
    $('#categoryName').val(categoryName);

    $('#editCarCategoryModal').modal('show');
}

$(document).ready(function() {

    $('#editCarCategoryForm').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: '{{ route('car-category.update', ':id') }}'.replace(':id', $('#categoryId').val()),
            method: 'PUT',
            data: formData,
            success: function(response) {
                if(response.status == 200) {
                    $('#editCarCategoryModal').modal('hide');

                    $('.data-table').DataTable().ajax.reload();

                    toastr.success(response.message);
                }else {
                    toastr.error(response.message);
                }

            },

        });
    });

        

});


    </script>
@endpush
