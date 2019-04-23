@extends('layouts.maps')

@section('title','SayurMayur')

@section('content')
        
    <div class='sidebar'>
      <div class='heading'>
        <h1>Lokasi Tukang Sayur</h1>
      </div>
    <div id='listings' class='listings'></div>
    </div>
    <div id='map' class='map'> </div>

  <script>
  // This will let you use the .remove() function later on
  if (!('remove' in Element.prototype)) {
    Element.prototype.remove = function() {
      if (this.parentNode) {
          this.parentNode.removeChild(this);
      }
    };
  }

  mapboxgl.accessToken = 'pk.eyJ1IjoibWlueHMzMyIsImEiOiJjanQ1NHk3dG8wMGRpNGFxZmthc2VsYWlqIn0.3AuuM_viiq5tN45mzyQmzw';

  // This adds the map
  var map = new mapboxgl.Map({
    // container id specified in the HTML
    container: 'map',
    // style URL
    style: 'mapbox://styles/mapbox/light-v10',
    // initial position in [long, lat] format
    center: [106.838497, -6.362165],
    // initial zoom
    zoom: 16
  });

  // Add geolocate control to the map.
  Geolocate = new mapboxgl.GeolocateControl({
    positionOptions: {
    enableHighAccuracy: true
    },
    trackUserLocation: true,
    fitBoundsOptions: {
      maxZoom:18
    }
    });
    map.addControl(Geolocate, 'bottom-left');

  var stores = {
    "type": "FeatureCollection",
    "features": [
      @foreach($Pedagang as $pedagang)
      {
        "type": "Feature",
        "geometry": {
          "type": "Point",
          "coordinates": [
            {{$pedagang->lon}},
            {{$pedagang->lat}}
          ]
        },
        "properties": {
          "nomor_telepon": "{{$pedagang->nomor_telepon}}",
          "nomor": "{{$pedagang->nomor_telepon}}",
          "nama": "{{$pedagang->nama_depan}} {{$pedagang->nama_belakang}}",
          "status": "{{$pedagang->status}}",
          "deskripsi": "{{$pedagang->deskripsi}}",
        }
      },
      @endforeach
      ]
    };
  // This adds the data to the map
  map.on('load', function (e) {
    // This is where your '.addLayer()' used to be, instead add only the source without styling a layer
    map.addSource("places", {
      "type": "geojson",
      "data": stores
    });
    // Initialize the list
    buildLocationList(stores);

    geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        bbox: [95.2930261576, -10.3599874813, 141.03385176, 5.47982086834]
    });

    map.addControl(geocoder, 'top-right');

    map.addSource('single-point', {
      "type": "geojson",
      "data": {
        "type": "FeatureCollection",
        "features": [] // Notice that initially there are no features
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

    geocoder.on('result', function(ev) {
      var searchResult = ev.result.geometry;
      map.getSource('single-point').setData(searchResult);

      var options = {units: 'miles'};
      stores.features.forEach(function(store){
        Object.defineProperty(store.properties, 'distance', {
          value: turf.distance(searchResult, store.geometry, options),
          writable: true,
          enumerable: true,
          configurable: true
        });
      });
      
      stores.features.sort(function(a, b) {
        if (a.properties.distance > b.properties.distance) {
          return 1;
        }
        if (a.properties.distance < b.properties.distance) {
          return -1;
        }
        // a must be equal to b
        return 0;
      });

      var listings = document.getElementById('listings');
        while (listings.firstChild) {
          listings.removeChild(listings.firstChild);
        }

        buildLocationList(stores);

        function sortLonLat(storeIdentifier) {
        var lats = [stores.features[storeIdentifier].geometry.coordinates[1], searchResult.coordinates[1]]
        var lons = [stores.features[storeIdentifier].geometry.coordinates[0], searchResult.coordinates[0]]

        var sortedLons = lons.sort(function(a,b){
            if (a > b) { return 1; }
            if (a.distance < b.distance) { return -1; }
            return 0;
          });
        var sortedLats = lats.sort(function(a,b){
            if (a > b) { return 1; }
            if (a.distance < b.distance) { return -1; }
            return 0;
          });

        map.fitBounds([
          [sortedLons[0], sortedLats[0]],
          [sortedLons[1], sortedLats[1]]
        ], {
          padding: 100
        });
      };

      sortLonLat(0);
      createPopUp(stores.features[0]);

    });
  });


  stores.features.forEach(function(marker, i) {

    var el = document.createElement('div');
    el.id = "marker-" + i;
    el.className = 'marker';

    new mapboxgl.Marker(el, {offset: [0, -23]})
        .setLngLat(marker.geometry.coordinates)
        .addTo(map);

    el.addEventListener('click', function(e){

        flyToStore(marker);


        createPopUp(marker);

        // 3. Highlight listing in sidebar (and remove highlight for all other listings)
        var activeItem = document.getElementsByClassName('active');

        e.stopPropagation();
        if (activeItem[0]) {
           activeItem[0].classList.remove('active');
        }

        var listing = document.getElementById('listing-' + i);
        listing.classList.add('active');

    });
  });


  function flyToStore(currentFeature) {
    map.flyTo({
        center: currentFeature.geometry.coordinates,
        zoom: 18
      });
  }

  function createPopUp(currentFeature) {
    var popUps = document.getElementsByClassName('mapboxgl-popup');
    if (popUps[0]) popUps[0].remove();


    var popup = new mapboxgl.Popup({closeOnClick: false})
          .setLngLat(currentFeature.geometry.coordinates)
          .setHTML('<h3>'+ currentFeature.properties.nama +'</h3>' +
            '<h4>' + currentFeature.properties.deskripsi + '</h4>')
          .addTo(map);
  }


  function buildLocationList(data) {
    for (i = 0; i < data.features.length; i++) {
      var currentFeature = data.features[i];
      var prop = currentFeature.properties;

      var listings = document.getElementById('listings');
      var listing = listings.appendChild(document.createElement('div'));
      listing.className = 'item';
      listing.id = "listing-" + i;

      var link = listing.appendChild(document.createElement('a'));
      link.href = '#';
      link.className = 'title';
      link.dataPosition = i;
      link.innerHTML = prop.nama;

      var details = listing.appendChild(document.createElement('div'));
      details.innerHTML = prop.status;
      if (prop.nomor) {
        details.innerHTML += ' &middot; ' + prop.nomor_telepon;
      }
      if (prop.distance) {
        var roundedDistance = Math.round(prop.distance*160)/100;
        details.innerHTML += '<p><strong>' + roundedDistance + ' KM</strong></p>';
      }



      link.addEventListener('click', function(e){
        // Update the currentFeature to the store associated with the clicked link
        var clickedListing = data.features[this.dataPosition];

        // 1. Fly to the point
        flyToStore(clickedListing);

        // 2. Close all other popups and display popup for clicked store
        createPopUp(clickedListing);

        // 3. Highlight listing in sidebar (and remove highlight for all other listings)
        var activeItem = document.getElementsByClassName('active');

        if (activeItem[0]) {
           activeItem[0].classList.remove('active');
        }
        this.parentNode.classList.add('active');

      });
    }
  }


    </script>
@endsection
