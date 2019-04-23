@extends('layouts.maps')
@section('title','Daftar Pedagang')
@section('content')
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-header" style="font-size:20px;"><b>{{ __('Daftar Pengajuan Pedagang') }}</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/insertPedagang') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                        <label for="exampleFormControlFile1">Nama Depan</label>
                        <input class="form-control" type="text" name="nama_depan">
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlFile1">Nama Belakang</label>    
                        <input class="form-control" type="text" name="nama_belakang">
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlFile1">Nomor Telepon</label>
                        <input class="form-control" type="text" name="nomor_telepon">
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlFile1">Foto Profil</label>
                        <input class="form-control-file" type="file" name="foto_profil">
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlFile1">Foto KTP</label>
                        <input class="form-control-file" type="file" name="foto_ktp">
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlFile1">Alamat</label>
                        <textarea class="form-control" type="text" name="alamat"></textarea>
                        </div>
                        <div class="form-group">
                        <div id="map" class="card">
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlFile1">Garis Lintang</label>  <a class="text-primary" href="https://www.google.com/maps">Cari disini</a>
                        <input class="form-control" id="lintang" type="text" name="lat">
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlFile1">Garis Bujur</label>
                        <input class="form-control" id="bujur" type="text" name="lon">
                        </div>
                        <button class="btn btn-primary col-md-6 float-right shadow mb-5 rounded" type="submit">Daftar</button>
                        <a class="btn btn-danger col-md-6 float-left shadow mb-5 rounded" href="{{ url('/home') }}">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #map{
        width:100%;
        height:380px;
}
</style>

<script>
mapboxgl.accessToken = 'pk.eyJ1IjoibWlueHMzMyIsImEiOiJjanQ1NHk3dG8wMGRpNGFxZmthc2VsYWlqIn0.3AuuM_viiq5tN45mzyQmzw';
var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/streets-v10',
    center: [-74.50, 40],
    zoom: 9
});

map.on('click', function (e) {
    document.getElementById('lintang').value = JSON.stringify(e.lngLat.lng);
    document.getElementById('bujur').value = JSON.stringify(e.lngLat.lat);
    map.setPaintProperty('point', 'circle-color', '#3887be');
});
</script>

@endsection