@extends('layouts.masteradmin')

@section('content')

<section class="content">
    <div class="box">
    <div class="col-md-5 col-12 align-self-left">
         <h3 class="text-themecolor m-b-0 m-t-0">Artikel</h3>
    </div>
    <div class="box-body">
    <br>
    <div class="col-lg-12">
    <div class="card col-lg-12">
    <div class="card-body">
        <div class="container">
        <form action="{{url('/artikel/insert')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-xs-4">
                <div class="form-group">
                <label class="control-label">Thumbnail</label>
                <input type="file" class="form-control-file" name="thumbnail" data-buttonText="Select a File">
                </div>
            </div>
        </div>    
        <div class="form-group">
            <label for="exampleFormControlInput1">Judul</label>
            <input type="text" class="form-control" name="judul" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Deskripsi</label>
            <textarea type="text" class="form-control" name="deskripsi" id="exampleFormControlInput1"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Penulis</label>
            <input type="text" class="form-control" name="penulis" id="exampleFormControlInput1">
        </div>
        <button class="btn btn-primary col-md-6 float-right shadow mb-5 rounded" type="submit">Tambah</button>
        </form>
@endsection