@extends('layouts.masteradmin')

@section('title','dashboard')

@section('content')
<section class="content">
<div class="box">
<div class="col-md-5 col-8 align-self-center">
         <h3 class="text-themecolor m-b-0 m-t-0">Data User</h3>
</div>
<div class="box-body">
<div class="col-lg-12">
<div class="card col-lg-6">
<div class="card-body">
<form method="POST" action="{{url('admin/artikel/edit')}}">
<input type="hidden" name="id" value="{{ $posts->artikel_id }}">
{{ csrf_field() }}
  <div class="form-group">
    <label for="pwd">Thumbnail :</label>
    <input type="file" name="thumbnail" class="form-control-file">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="text" name="judul" class="form-control" value=" {{ $posts->judul }} ">
  </div>
  <div class="form-group">
    <label for="email">Deskripsi:</label>
    <textarea type="text" name="deskripsi" class="form-control">{{$posts->deskripsi}}</textarea>
  </div>
  <div class="form-group">
    <label for="email">Penulis:</label>
    <input type="text" name="penulis" class="form-control" value=" {{ $posts->penulis }} ">
  </div>
  </div>
  <button type="submit" class="btn btn-success col-lg-12">Submit</button>
  </div>
  <div class="card col-lg-6">
  <div class="card-body">
</form> 
  </div>
  </div>
</div>
</div>
</div>
</section>
@endsection