<!-- base:js -->
<script src="{{ url('templates/backend') }}/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{ url('templates/backend') }}/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ url('templates/backend') }}/js/off-canvas.js"></script>
<script src="{{ url('templates/backend') }}/js/hoverable-collapse.js"></script>
<script src="{{ url('templates/backend') }}/js/template.js"></script>
<!-- endinject -->
{{-- DataTables --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<!-- plugin js for this page -->
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="{{ url('templates/backend') }}/js/dashboard.js"></script>
<!-- End custom js for this page-->

<script>
    $('.datatables').DataTable();
</script>


@stack('after-script')
