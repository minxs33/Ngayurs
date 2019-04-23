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
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data User</h4>
                                <div class="table-responsive color-table info-table">
                                    <table class="table color-table primary-table text-center">
                                        <thead>
                                            <tr class="bg-primary">
                                                <th>ID</th>
                                                <th>username</th>
                                                <th>Email</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td><a class="btn btn-success" href="user/edit/{{$user->id}}">Edit</a>
                                                    <a class="btn btn-danger" href="user/hapus/{{$user->id}}">Hapus</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection

@section ('script')

    $(document).ready(function(){
        
    });

@endsection