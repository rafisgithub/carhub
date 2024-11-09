<!-- Helpers -->
<script src="{{ asset('backend/assets') }}/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{ asset('backend/assets') }}/js/config.js"></script>
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('backend/assets') }}/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('backend/assets') }}/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('backend/assets') }}/vendor/js/bootstrap.js"></script>
<script src="{{ asset('backend/assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="{{ asset('backend/assets') }}/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('backend/assets') }}/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="{{ asset('backend/assets') }}/js/main.js"></script>

<!-- Page JS -->
<script src="{{ asset('backend/assets') }}/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

{{-- <script src="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.umd.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/41.3.1/ckeditor.min.js"></script>


@stack('scripts')
