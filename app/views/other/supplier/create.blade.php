@extends('layout')

@section('title')
	Sistem Inventeris
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Supplier Baru
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Supplier</a></li>
            <li class="active">Tambah Supplier</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        @if (Session::get('message'))
            <div class="alert alert-success alert-dismissable">
                Supplier berhasil disimpan {{ link_to('supplier', "Kembali Ke Daftar Supplier", array('class' => 'label label-success')) }}
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
        @elseif (!$errors->isEmpty())
            <div class="alert alert-danger alert-dismissable">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>  
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                {{ Form::open(array('url' => 'supplier')) }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Supplier*</label>
                    {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                </div>
                <input type="submit" class="btn btn-success" value="Simpan"> 
                <input type="reset" class="btn btn-danger" value="Reset">
                {{ Form::close() }}
            </div>
                    
        </div>
    </section><!-- /.content -->
@stop
