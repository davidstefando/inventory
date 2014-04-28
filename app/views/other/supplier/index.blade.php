@extends('layout')

@section('title')
	Sistem Inventeris
@stop

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Supplier
        </h1>
        <small>Daftar supplier produk</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Other</a></li>
            <li class="active">Supplier</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-solid">
            <div class="box-header">
                <h3 class="box-title">Data Supplier</h3>
                <div class="box-tools pull-right">
                    <a href="{{ url('supplier/create') }}" class="btn btn-success"><i class="fa fa-plus fa-inverse">Tambah Data Supplier</i></a>
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
                            @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->id }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>
                                    {{ link_to('supplier/' . $supplier->id . '/edit', 'Edit', array('class' => 'label label-primary')) }}
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