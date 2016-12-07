@extends('app')
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Laporan Penjualan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      
                    </p>

                    <!-- <div class="col-md-4"> -->
                        <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                          <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                        </div>
                        <br></br>
                      <!-- </div> -->
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No Nota</th>
                          <th>Nama Pemesan</th>
                          <th>Jumlah Pemesanan</th>
                          <th>Tanggal Pemesanan</th>
                     
                        </tr>
                      </thead>


                      <tbody>
                        <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Garrett Winters</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Ashton Cox</td>
                          <td>Junior Technical Author</td>
                          <td>San Francisco</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Cedric Kelly</td>
                          <td>Senior Javascript Developer</td>
                          <td>Edinburgh</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Airi Satou</td>
                          <td>Accountant</td>
                          <td>Tokyo</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Brielle Williamson</td>
                          <td>Integration Specialist</td>
                          <td>New York</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Herrod Chandler</td>
                          <td>Sales Assistant</td>
                          <td>San Francisco</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Rhona Davidson</td>
                          <td>Integration Specialist</td>
                          <td>Tokyo</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Colleen Hurst</td>
                          <td>Javascript Developer</td>
                          <td>San Francisco</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Sonya Frost</td>
                          <td>Software Engineer</td>
                          <td>Edinburgh</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Jena Gaines</td>
                          <td>Office Manager</td>
                          <td>London</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Quinn Flynn</td>
                          <td>Support Lead</td>
                          <td>Edinburgh</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Charde Marshall</td>
                          <td>Regional Director</td>
                          <td>San Francisco</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Haley Kennedy</td>
                          <td>Senior Marketing Designer</td>
                          <td>London</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Tatyana Fitzpatrick</td>
                          <td>Regional Director</td>
                          <td>London</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Michael Silva</td>
                          <td>Marketing Designer</td>
                          <td>London</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Paul Byrd</td>
                          <td>Chief Financial Officer (CFO)</td>
                          <td>New York</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Gloria Little</td>
                          <td>Systems Administrator</td>
                          <td>New York</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Bradley Greer</td>
                          <td>Software Engineer</td>
                          <td>London</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Dai Rios</td>
                          <td>Personnel Lead</td>
                          <td>Edinburgh</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Jenette Caldwell</td>
                          <td>Development Lead</td>
                          <td>New York</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Yuri Berry</td>
                          <td>Chief Marketing Officer (CMO)</td>
                          <td>New York</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Caesar Vance</td>
                          <td>Pre-Sales Support</td>
                          <td>New York</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Doris Wilder</td>
                          <td>Sales Assistant</td>
                          <td>Sidney</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Angelica Ramos</td>
                          <td>Chief Executive Officer (CEO)</td>
                          <td>London</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Gavin Joyce</td>
                          <td>Developer</td>
                          <td>Edinburgh</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Jennifer Chang</td>
                          <td>Regional Director</td>
                          <td>Singapore</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Brenden Wagner</td>
                          <td>Software Engineer</td>
                          <td>San Francisco</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Fiona Green</td>
                          <td>Chief Operating Officer (COO)</td>
                          <td>San Francisco</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Shou Itou</td>
                          <td>Regional Marketing</td>
                          <td>Tokyo</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Michelle House</td>
                          <td>Integration Specialist</td>
                          <td>Sidney</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Suki Burks</td>
                          <td>Developer</td>
                          <td>London</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Prescott Bartlett</td>
                          <td>Technical Author</td>
                          <td>London</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Gavin Cortez</td>
                          <td>Team Leader</td>
                          <td>San Francisco</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Martena Mccray</td>
                          <td>Post-Sales support</td>
                          <td>Edinburgh</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Unity Butler</td>
                          <td>Marketing Designer</td>
                          <td>San Francisco</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Howard Hatfield</td>
                          <td>Office Manager</td>
                          <td>San Francisco</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Hope Fuentes</td>
                          <td>Secretary</td>
                          <td>San Francisco</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Vivian Harrell</td>
                          <td>Financial Controller</td>
                          <td>San Francisco</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Timothy Mooney</td>
                          <td>Office Manager</td>
                          <td>London</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Jackson Bradshaw</td>
                          <td>Director</td>
                          <td>New York</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Olivia Liang</td>
                          <td>Support Engineer</td>
                          <td>Singapore</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Bruno Nash</td>
                          <td>Software Engineer</td>
                          <td>London</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Sakura Yamamoto</td>
                          <td>Support Engineer</td>
                          <td>Tokyo</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Thor Walton</td>
                          <td>Developer</td>
                          <td>New York</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Finn Camacho</td>
                          <td>Support Engineer</td>
                          <td>San Francisco</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Serge Baldwin</td>
                          <td>Data Coordinator</td>
                          <td>Singapore</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Zenaida Frank</td>
                          <td>Software Engineer</td>
                          <td>New York</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Zorita Serrano</td>
                          <td>Software Engineer</td>
                          <td>San Francisco</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Jennifer Acosta</td>
                          <td>Junior Javascript Developer</td>
                          <td>Edinburgh</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Cara Stevens</td>
                          <td>Sales Assistant</td>
                          <td>New York</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Hermione Butler</td>
                          <td>Regional Director</td>
                          <td>London</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Lael Greer</td>
                          <td>Systems Administrator</td>
                          <td>London</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Jonas Alexander</td>
                          <td>Developer</td>
                          <td>San Francisco</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Shad Decker</td>
                          <td>Regional Director</td>
                          <td>Edinburgh</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Michael Bruce</td>
                          <td>Javascript Developer</td>
                          <td>Singapore</td>
                          <th>19/02/95</th>
                          </tr>
                        <tr>
                          <td>Donna Snider</td>
                          <td>Customer Support</td>
                          <td>New York</td>
                          <th>19/02/95</th>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@endsection

@section('javascript')

@endsection
@section('js')
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
    <script src="{{ url('bower_components/gentelella/vendors/datatables.net-scroller/js/datatables.scroller.min.js')}}"></script>
    <script src="{{ url('bower_components/gentelella/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ url('bower_components/gentelella/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ url('bower_components/gentelella/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

    <script src="{{ url('bower_components/gentelella/vendors/moment/min/moment.min.js')}}"></script>
     <script src="{{ url('bower_components/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ url('bower_components/gentelella/build/js/custom.min.js')}}"></script>

    <!-- Datatables -->
    <script>
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
            init: function() {
              handleDataTableButtons();
            }
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
    </script>
    <script>
      $(document).ready(function() {
        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange_right span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2020',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'right',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };

        $('#reportrange_right span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

        $('#reportrange_right').daterangepicker(optionSet1, cb);

        $('#reportrange_right').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange_right').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange_right').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange_right').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });

        $('#options1').click(function() {
          $('#reportrange_right').data('daterangepicker').setOptions(optionSet1, cb);
        });

        $('#options2').click(function() {
          $('#reportrange_right').data('daterangepicker').setOptions(optionSet2, cb);
        });

        $('#destroy').click(function() {
          $('#reportrange_right').data('daterangepicker').remove();
        });

      });
    </script>

    <script>
      $(document).ready(function() {
        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2020',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>
@endsection    