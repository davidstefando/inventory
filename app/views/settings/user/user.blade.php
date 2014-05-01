@extends('layout')

@section('title')
	Sistem Inventeris
@stop

@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pengaturan User
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Pengaturan</li>
            <li class="active">User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box-tools pull-right">
            <a href="{{ url('setting/user/add') }}" class="btn btn-primary"><i class="fa fa-plus fa-inverse">Tambah User</i></a>
            <a href="{{ url('setting/user/password') }}" class="btn btn-danger"><i class="fa fa-refresh fa-inverse">Ganti Password</i></a>
        </div>
        
        
        <table class="table">
            <thead>
                <th>Username</th>
                <th>Email</th>
                <th>Registered</th>
                <th>Action</th>
            </thead>
        	@foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td><a href="{{ url('setting/user/delete/' . $user->id) }}" class="btn btn-danger"><i class="fa fa-trash-o fa-inverse">Hapus</i></a></td>
                </tr>
            @endforeach
        </table>
    </section><!-- /.content -->
@stop