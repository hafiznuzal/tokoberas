@section('css')
@parent
<link href=" {{ url('bower_components/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endsection

@section('js')
@parent
<script type="text/javascript" src="{{ url('bower_components/gentelella/production/js/datepicker/daterangepicker.js')}}"></script>
@endsection