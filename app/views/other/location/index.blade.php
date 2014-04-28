@extends('layout')

@section('title')
	Sistem Inventeris
@stop

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Daftar Lokasi
        </h1>
        <small>Daftar lokasi produk</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Other</a></li>
            <li class="active">Lokasi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-solid">
            <div class="box-header">
                <h3 class="box-title">Data Lokasi Barang</h3>
                <div class="box-tools pull-right">
                    <a href="{{ url('location/create') }}" class="btn btn-success"><i class="fa fa-plus fa-inverse">Tambah Data Lokasi</i></a>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($locations as $location)
                            <tr>
                                <td>{{ $location->id }}</td>
                                <td>{{ $location->name }}</td>
                                <td>
                                    {{ link_to('location/' . $location->id . '/edit', 'Edit', array('class' => 'label label-primary')) }}
                                </td>
                            </tr>                      
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-footer clearfix">
            </div>
        </div>
    </section>
@stop