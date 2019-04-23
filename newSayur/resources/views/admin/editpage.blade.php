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
<form method="POST" action="{{url('admin/user/editt')}}">
<input type="hidden" name="id" value="{{ $user->id }}">
{{ csrf_field() }}
  <div class="form-group">
    <label for="pwd">Username:</label>
    <input type="text" name="name" class="form-control" value=" {{ $user->name }} ">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="email" class="form-control" value=" {{ $user->email }} ">
  </div>
  </div>
  </div>
  <div class="card col-lg-6">
  <div class="card-body">
  <button type="submit" class="btn btn-success">Submit</button>
</form> 
  </div>
  </div>
</div>
</div>
</div>
</section>
@endsection