@extends('layouts.maps')

@section('title','Ngayurs')

@section('content')
<script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />

<link href="css/stylemap.css" rel="stylesheet" type="text/css">
<div class="sidenav shadow-sm p-3 mb-5">
  <img src="{{URL::asset('fotoProfil/'.$pedagang->foto_profil) }}" class="figure-img img-fluid rounded-circle" alt="img">
  
  <div class="container mt-4">
  <h4>{{$pedagang->nama_depan}} {{$pedagang->nama_belakang}}</h4>
  <ul class="list-group shadow-sm">
    <li class="list-group-item text-primary"><b>No Telp : {{$pedagang->nomor_telepon}}</b></li>
    <li class="list-group-item text-primary"><b>Ubah Deskripsi</b>
    <span class="badge badge-primary badge-pill float-right"><a type="button" class="text-light" href="javascript(void:0)" data-toggle="modal" data-target="#exampleModal">Ubah</a></span>
    </li>
    <li class="list-group-item text-primary">Status : {{$pedagang->status}}</li>
  </ul>
    @if($pedagang->status == 'online')
   <a href="pedagang/offline/{{$pedagang->user_id}}" class="col-md-5 mt-2 btn btn-danger shadow-sm">
   Offline
    </a>
    @else
    <a href="pedagang/online/{{$pedagang->user_id}}" class="col-md-5 mt-2 btn btn-success shadow-sm">
    online
    </a>
    @endif
 </div>     
   
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Deskripsi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{url('/editdeskripsi')}}">
      {{ csrf_field() }}
      <input type="hidden" name="user_id" value="{{$pedagang->user_id}}">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Deskripsi</button>
      </form>
      </div>
    </div>
  </div>
</div>

<style>
    .marker{
        border: none;
        cursor: pointer;
        height: 56px;
        width: 56px;
        background-image: url(../assets/marker/person.png);
        background-size: 56px 56px;
        background-color: rgba(0, 0, 0, 0);
    }
</style>
<div id='map'></div>
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoibWlueHMzMyIsImEiOiJjanQ1NHk3dG8wMGRpNGFxZmthc2VsYWlqIn0.3AuuM_viiq5tN45mzyQmzw';
            var map = new mapboxgl.Map({
              container: 'map',
              style: 'mapbox://styles/mapbox/streets-v11',
          center: [{{$pedagang->lon }}, {{$pedagang->lat}}],
          zoom: 16
});
var geojson = {
  type: 'FeatureCollection',
  features: [
  {
    type: 'Feature',
    geometry: {
      type: 'Point',
      coordinates: [{{$pedagang->lon}}, {{$pedagang->lat}}]
    },
    properties: {
      title: 'Mapbox',
      description: 'San Francisco, California'
    }
  }]
};
                       
                
          // add markers to map
geojson.features.forEach(function(marker) {

// create a HTML element for each feature
var el = document.createElement('div');
el.className = 'marker';

// make a marker for each feature and add to the map
new mapboxgl.Marker(el)
  .setLngLat(marker.geometry.coordinates)
  .addTo(map);
});
map.on('load', function (e) {
    geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        bbox: [95.2930261576, -10.3599874813, 141.03385176, 5.47982086834]
    });

    map.addControl(geocoder, 'top-right');

    map.addSource('single-point', {
      "type": "geojson",
      "data": {
        "type": "FeatureCollection",
        "features": []
      }
    });

    map.addLayer({
      "id": "point",
      "source": "single-point",
      "type": "circle",
      "paint": {
        "circle-radius": 10,
        "circle-color": "#007cbf",
        "circle-stroke-width": 3,
        "circle-stroke-color": "#fff"
      }
    });
});

</script>


@endsection