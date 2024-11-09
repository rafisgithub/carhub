@extends('backend.app')

@section('title', 'Home')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ session('success') }}</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Basic Layout</h5>
            <small class="text-muted float-end">Default label</small>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('store.about.section') }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" value="1" name="value">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Title</label>
                <input type="text" name="title" class="form-control" id="basic-default-fullname" placeholder="Title" />
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-message">Description</label>

                    <textarea name="description" id="editor" ></textarea>

              </div>
              <div class="mb-3">
                  <label for="Image">CEO profile</label>
                    <input type="file" name="image" class="form-control" id="Image">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
  @push('scripts')

    <script>
        ClassicEditor
      .create(document.querySelector('#editor'))
      .then(editor => {
          console.log('Editor was initialized', editor);
      })
      .catch(error => {
          console.error(error.stack);
      });
    </script>



  @endpush

@endsection
