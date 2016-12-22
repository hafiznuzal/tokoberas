@section('js') @parent
<script type="text/javascript" src="{{ url('bower_components/cleave.js/dist/cleave.min.js')}}"></script>
<script type="text/javascript" src="{{ url('bower_components/numeral/min/numeral.min.js')}}"></script>
<script>
(function() {
  var cleave = new Cleave('.input-numeric', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
  });
})()
</script>
@endsection