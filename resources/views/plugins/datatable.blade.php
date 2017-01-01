@section('css') @parent
<link href="{{ url('bower_components/AdminLTE/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
<link href="{{ url('bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('js') @parent
<script src="{{ url('bower_components/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('bower_components/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ url('bower_components/gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ url('bower_components/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{ url('bower_components/gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{ url('bower_components/gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ url('bower_components/gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ url('bower_components/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{ url('bower_components/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{ url('bower_components/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ url('bower_components/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{ url('bower_components/gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{ url('bower_components/gentelella/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{ url('bower_components/gentelella/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{ url('bower_components/gentelella/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
<script>
$(function () {
  $('.datatabel').each(function() {
    $(this).DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      buttons: [
        {
          extend: "copy",
          className: "btn-sm"
        },
        {
          extend: "csv",
          className: "btn-sm"
        },
        {
          extend: "excel",
          className: "btn-sm"
        },
        {
          extend: "pdfHtml5",
          className: "btn-sm"
        },
        {
          extend: "print",
          className: "btn-sm"
        },
      ],
    });
  });
});
</script>
<div class="hidden">
  $(document).ready(function() {
    var handleDataTableButtons = function() {
      if ($("#datatable-buttons").length) {
        $("#datatable-buttons").DataTable({
          dom: "Bfrtip",
          buttons: [
            {
              extend: "copy",
              className: "btn-sm"
            },
            {
              extend: "csv",
              className: "btn-sm"
            },
            {
              extend: "excel",
              className: "btn-sm"
            },
            {
              extend: "pdfHtml5",
              className: "btn-sm"
            },
            {
              extend: "print",
              className: "btn-sm"
            },
          ],
          responsive: true
        });
      }
    };
    TableManageButtons = function() {
      "use strict";
      return {
        init: handleDataTableButtons
      };
    }();
    $('#datatable').dataTable();
    $('#datatable-keytable').DataTable({
      keys: true
    });
    $('#datatable-responsive').DataTable();
    $('#datatable-scroller').DataTable({
      ajax: "js/datatables/json/scroller-demo.json",
      deferRender: true,
      scrollY: 380,
      scrollCollapse: true,
      scroller: true
    });
    $('#datatable-fixed-header').DataTable({
      fixedHeader: true
    });
    var $datatable = $('#datatable-checkbox');
    $datatable.dataTable({
      'order': [[ 1, 'asc' ]],
      'columnDefs': [
      { orderable: false, targets: [0] }
      ]
    });
    $datatable.on('draw.dt', function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_flat-green'
      });
    });
    TableManageButtons.init();
  });
</div>
@endsection