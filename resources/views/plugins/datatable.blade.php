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
      dom: "Bfrtip",
      paging: true,
      lengthChange: false,
      searching: true,
      ordering: true,
      info: true,
      autoWidth: false,
      buttons: [
        // {
        //   extend: "copy",
        //   className: "btn-sm btn-default"
        // },
        {
          extend: "csv",
          className: "btn-sm btn-default"
        },
        {
          extend: "excel",
          className: "btn-sm btn-default"
        },
        {
          extend: "pdfHtml5",
          className: "btn-sm btn-default"
        },
        {
          extend: "print",
          className: "btn-sm btn-default"
        },
      ],
    });
  });
});
</script>
@endsection