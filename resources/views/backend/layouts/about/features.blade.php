@extends('backend.app')

@section('title', 'Home')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="alert">{{ session('success') }}</h4>
    <div class="card">
        <h5 class="card-header">Features</h5>
            <button class="btn btn-primary" id="AddFreatues">Add Feature</button>
        <div class="card-body">
            <form action="{{ route('store.features') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="form-append">
                    <h2>Feature 1</h2>
                    <input type="hidden" id="hidderField" value="3" name="value[]">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title[]">
                        <div class="text-danger">
                            @error('title.0')
                                {{ $message }}
                            @enderror
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" class="editor" name="content[]"></textarea>
                        <div class="text-danger">
                            @error('content.0')
                                {{ $message }}
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon</label>
                        <input type="file" class="form-control" id="icon" name="image[]">
                        <div class="text-danger">
                            @error('image.0')
                                {{ $message }}
                            @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

  </div>
  @push('scripts')

  <script>
    // Initialize the editor for the initially existing textarea
    ClassicEditor
        .create(document.querySelector('.editor'))
        .then(editor => {
            console.log('Initial Editor was initialized', editor);
        })
        .catch(error => {
            console.error(error.stack);
        });

    let feature = 1;

    document.querySelector('#AddFreatues').addEventListener('click', function() {
        let formAppend = document.querySelector('#form-append');
        let div = document.createElement('div');

        feature++;
        div.innerHTML = `
            <h2>Feature ${feature}</h2>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title[]">
                @error('title.${feature}')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control editor" name="content[]"></textarea>
                @error('content.${feature}')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="icon" class="form-label">Icon</label>
                <input type="file" class="form-control" name="image[]">
                @error('image.${feature}')
                    {{ $message }}
                @enderror
            </div>
        `;
        formAppend.appendChild(div);

        // Initialize ClassicEditor for each newly added textarea
        div.querySelectorAll('.editor').forEach((textarea) => {
            ClassicEditor
                .create(textarea)
                .then(editor => {
                    console.log(`Editor for Feature ${feature} was initialized`, editor);
                })
                .catch(error => {
                    console.error(error.stack);
                });
        });
    });
</script>




  @endpush

@endsection
