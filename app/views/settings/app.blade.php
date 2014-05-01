@extends('layout')

@section('title')
	Sistem Inventeris
@stop

@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pengaturan Aplikasi
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Pengaturan</li>
            <li class="active">Aplikasi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	{{ Form::open(array('files' => true)) }}
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Toko*</label>
            {{ Form::text('organization_name', Setting::get('organization_name'), array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Logo Toko*</label>
            {{ Form::file('organization_logo', null, array('class' => 'form-control')) }}
        </div>
        <input type="submit" class="btn btn-success" value="Simpan"> 
        <input type="reset" class="btn btn-danger" value="Reset">
        {{ Form::close() }}
    </section><!-- /.content -->
@stop