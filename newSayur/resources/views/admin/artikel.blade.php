@extends('layouts.masteradmin')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
        <form action="{{url('admin/artikel/insert')}}">
        <!-- <input type="file" name="thumbnail">
        judul
        <input type="text" name="judul">
        deskripsi
        <textarea type="text" name="deskripsi"></textarea>
        penulis
        <input type="text" name="penulis">
        </form> -->
        
        <div class="container">

<form action="{{url('admin/artikel/insert')}}" enctype="multipart/form-data">
    @csrf
    <div class="col-xs-4">
    	<div class="form-group">
	      <label class="control-label">Thumbnail</label>
	      <input type="file" class="form-control-file" name="thumbnail" data-buttonText="Select a File">
		</div>
    </div>
</div>    
  <div class="form-group">
    <label for="exampleFormControlInput1">Judul</label>
    <input type="text" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Deskripsi</label>
    <textarea type="text" class="form-control" id="exampleFormControlInput1"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Penulis</label>
    <input type="text" class="form-control" id="exampleFormControlInput1">
  </div>
  <button class="btn btn-primary col-md-6 float-right shadow mb-5 rounded" type="submit">Tambah</button>
</form>
</body>
</html>

@endsection