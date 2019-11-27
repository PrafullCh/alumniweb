@extends('layouts.app')
@section('content')

    <div class="container">
        <div id="map" style="width:100%;height:400px;">

        </div>
    </div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwZbTuWhZiYP5vuWTc04Odk1WIBFooLtE&callback=initMap"
    async defer></script>
    <script>
             var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 21.0000, lng: 78.0000},
          zoom: 5
        });
        var marker = new google.maps.marker({
            position:{lat:19.9975,lng:73.7898},
            map:map
        });
      }
    </script>
@endsection