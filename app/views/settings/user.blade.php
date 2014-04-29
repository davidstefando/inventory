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
    	{{ Form::open() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Toko*</label>
            {{ Form::text('sku', Input::old('sku'), array('class' => 'form-control')) }}
        </div>
        <input type="submit" class="btn btn-success" value="Simpan"> 
        <input type="reset" class="btn btn-danger" value="Reset">
        {{ Form::close() }}
    </section><!-- /.content -->
@stop