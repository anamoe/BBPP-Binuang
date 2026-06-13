<script src="{{ asset ('public/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset ('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset ('public/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset ('public/plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ asset ('public/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset ('public/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset ('public/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset ('public/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset ('public/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset ('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
{{-- <script src="{{ asset ('public/plugins/summernote/summernote-bs4.min.js') }}"></script> --}}
<script src="{{ asset ('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset ('public/dist/js/adminlte.js') }}"></script>
<script src="{{ asset ('public/dist/js/demo.js') }}"></script>
<script src="{{ asset ('public/dist/js/pages/dashboard.js') }}"></script>
<script>
  $(function() {
    var table = $('#data-table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,

      pageLength: 10, // default tampil 10
      lengthMenu: [10, 20, 50, 100], // pilihan jumlah data
      order: [
        [2, 'asc']
      ],
      columnDefs: [
      { orderable: false, targets: 0 } // kolom No tidak bisa disort
    ]

    });
    table.on('order.dt search.dt', function () {
      table.column(0, { search:'applied', order:'applied' }).nodes()
      .each(function (cell, i) {
          cell.innerHTML = i + 1;
      });
  }).draw();
  });
</script>
<!-- DataTables  & Plugins -->
<script src="{{ asset ('public/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset ('public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset ('public/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset ('public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset ('public/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
  $(document).ready(function() {
    $('#desc').summernote({
      height: 200,
      placeholder: 'Tulis deskripsi..',
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['insert', ['link']],
        ['view', ['codeview']]
      ]
    });
  });
</script>