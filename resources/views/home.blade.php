   
@extends('layouts.main')

@section('container')
    <div id="calendar" style="width: 80%; height: 50%"></div>
    {{-- class="d-flex justify-content-end" https://getbootstrap.com/docs/5.2/utilities/flex/ --}}
    <script>
        $(document).ready(function() {
        
          var events = @json($events); //ambil data events dari controller dengan format jsom
          // console.log(events) // cara cek data sudah masuk atau belum dd vardump nya di json cek di inspect element bagian console
        
          $('#calendar').fullCalendar({
            header: {
              left: 'prev, next today',
              center: 'title',
              right: 'month, agendaWeek'
            //   right: 'month, agendaWeek, agendaDay'
            },
            events: events, //events: adalah property dari calendar js
            selectable: true,
            // selectHelper: true,
          })
        })
    </script>

@endsection
