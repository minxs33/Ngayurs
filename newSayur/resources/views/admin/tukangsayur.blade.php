@extends('layouts.masteradmin')
@section('title','Dashboard')
@section('content')
    <section class="content">
    <div class="box">
    <div class="col-md-5 col-8 align-self-center">
         <h3 class="text-themecolor m-b-0 m-t-0">Data Pedagang</h3>
    </div>
    <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><h4><b>Daftar konfirmasi pedagang</b></h4></li>
                            </ol>
                                <div class="table-responsive">
                                    <table class="table data">
                                        <thead>
                                            <tr>
                                                <th>ID User</th>
                                                <th>Nama lengkap</th>
                                                <th>Alamat</th>
                                                <th>Nomor Telepon</th>
                                                <th>Foto Profil</th>
                                                <th>Foto KTP</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($pedagang as $pedagang)
                                            <tr>
                                                <td>{{$pedagang->user_id}}</td>
                                                <td>{{$pedagang->nama_depan}} {{$pedagang->nama_belakang}}</td>
                                                <td>{{$pedagang->alamat}}</td>
                                                <td>{{$pedagang->nomor_telepon}}</td>
                                                <td><img src="{{URL::asset('fotoProfil/'.$pedagang->foto_profil) }}" width="50px" height="50px"></td>
                                                <td><img src="{{URL::asset('fotoKtp/'.$pedagang->foto_ktp) }}" width="50px" height="50px"></td>
                                                <td>{{$pedagang->akses}}</td>
                                                <td><a class="btn btn-primary" href="admin/terima/{{$pedagang->id}}">Terima</a>
                                                    <a class="btn btn-danger" href="admin/tolak/{{$pedagang->id}}">Tolak</a></td>
                                            </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><h4><b>Daftar pedagang</b></h4></li>
                            </ol>
                            <div class="box-header">
                              <br>
                                <div class="box-tools">
                                  <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                    <div class="input-group-btn">
                                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                                <div class="table-responsive">
                                    <table class="table pedagang">
                                        <thead>
                                            <tr>
                                                <th>ID Pedagang</th>
                                                <th>ID User</th>
                                                <th>Nama Lengkap</th>
                                                <th>Deskripsi</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($pedagang1 as $pedagang1)
                                            <tr>
                                                <td>{{$pedagang1->id}}</td>
                                                <td>{{$pedagang1->user_id}}</td>
                                                <td>{{$pedagang1->nama_depan}} {{$pedagang1->nama_belakang}}</td>
                                                <td>{{$pedagang1->deskripsi}}</td>
                                                <td>@if ($pedagang1->status == 'online')
                                                <span class="label label-success">online</span>
                                                @else
                                                <span class="label label-danger">offline</span>
                                                @endif
                                                </td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="card">
                            <div class="card-body">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><h4><b>Lokasi Pedagang Online</b></h4></li>
                            </ol>
                                <div class="table-responsive">
                        <div id='map' style='width: 100%; height: 300px; padding:10px;'></div>
                      <script>
                        mapboxgl.accessToken = 'pk.eyJ1IjoibWlueHMzMyIsImEiOiJjanQ1NHk3dG8wMGRpNGFxZmthc2VsYWlqIn0.3AuuM_viiq5tN45mzyQmzw';
                        var map = new mapboxgl.Map({
                          container: 'map',
                          style: 'mapbox://styles/mapbox/streets-v11',
                          center: [106.838497, -6.362165],
                          zoom: 10
                        });
                      </script>
                            </div>
                          </div>
                        </div>
                    </div>
                    <style>
                    .marker {
                        border: none;
                        cursor: pointer;
                        height: 56px;
                        width: 56px;
                        background-image: url(../assets/marker/marker.png);
                        background-size: 56px 56px;
                        background-color: rgba(0, 0, 0, 0);
                      }
                    </style>
                        <script>
                       map.on('load', function(e) {
                        
                        map.addLayer({
                            "id": "places",
                            "type": "symbol",
                              "source": {
                              "type": "geojson",
                               "data": {
                                  "type": "FeatureCollection",
                                  "features": [
                                    @foreach($pedagang2 as $pedagang2)
                                    {
                                      "type": "Feature",
                                      "properties": {
                                          "description": "<strong>{{$pedagang2->nama_depan}} {{$pedagang2->nama_belakang}}</strong><p>{{$pedagang1->deskripsi}}</p>",
                                          "icon": "garden"
                            },
                            "geometry": {
                              "type": "Point",
                              "coordinates": [{{$pedagang2->lon}}, {{$pedagang2->lat}}]
                            }
                          },
                        @endforeach
                        ]
                         }
                        },
                            "layout": {
                          "icon-image": "{icon}-15",
                          "icon-allow-overlap": true
                          }
                          });

                       map.on('click', 'places', function (e) {
                        var coordinates = e.features[0].geometry.coordinates.slice();
                        var description = e.features[0].properties.description;
                        
                        while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                        }
                        
                        new mapboxgl.Popup()
                        .setLngLat(coordinates)
                        .setHTML(description)
                        .addTo(map);
                      });
                        
                        map.on('mouseenter', 'places', function () {
                        map.getCanvas().style.cursor = 'pointer';
                      });
                        
                        map.on('mouseleave', 'places', function () {
                        map.getCanvas().style.cursor = '';
                      });

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

$(document).ready( function () {
    $('.data').DataTable();
  } 
);
$('.pedagang').DataTable();
  } 
);
            </script>
          </div>
      </div>
    </section
@endsection