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
                                                <th>ID Artikel</th>
                                                <th>Thumbnail</th>
                                                <th>Judul</th>
                                                <th>Deskripsi</th>
                                                <th>Penulis</th>
                                                <th>Tanggal dibuat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($posts as $posts)
                                                <tr>
                                                <td>{{$posts->artikel_id}}</td>
                                                <td><img src="{{URL::asset('/fotoThumbnail/'.$posts->thumbnail) }}" style="width:75px; height:75px;"></td>
                                                <td>{{$posts->judul}}</td>
                                                <td>@if (strlen(strip_tags($posts->deskripsi)) > 50)
                                                    <p>{{ str_limit(strip_tags($posts->deskripsi), 50) }}</p></td>
                                                    @endif
                                                <td>{{$posts->penulis}}</td>
                                                <td>{{$posts->created_at->format('Y-m-d')}}
                                                <td><a class="btn btn-primary" href="admin/terima/{{$posts->id}}">Edit</a>
                                                    <a class="btn btn-danger" href="admin/tolak/{{$posts->id}}">Delete</a>
                                                </td>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
<script>
$(document).ready( function () {
    $('.data').DataTable();
} );
</script>
                    @endsection