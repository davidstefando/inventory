@extends('layout')

@section('title')
	Sistem Inventeris
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Produk
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">Edit Produk</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        @if (Session::get('message'))
            <div class="alert alert-success alert-dismissable">
                Produk berhasil disimpan {{ link_to('product', "Kembali Ke Daftar Product", array('class' => 'label label-success')) }}
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
                <!-- Custom Tabs (Pulled to the right) -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li class="active"><a href="#tab_1-1" data-toggle="tab">Input Data Produk</a></li>
                        <li class="pull-left header"><i class="fa fa-plus"></i> </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1-1">
                            {{ Form::model($model, array('product.update', $model->sku)) }}
                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="exampleInputEmail1">Kode Barang*</label>
                                        {{ Form::text('sku', Input::old('sku'), array('class' => 'form-control', 'placeholder' => 'KB-THN-NO')) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama*</label>
                                        {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'Nama Produk')) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori*</label>
                                        {{ Form::select('category_id', $category, null ,array('class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Lokasi*</label>
                                        {{ Form::select('location_id', $location, null ,array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Satuan*</label>
                                        {{ Form::select('unit_id', $unit, null ,array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stock Minimal*</label>
                                        {{ Form::text('minimum_stock', Input::old('minimum_stock'), array('class' => 'form-control', 'placeholder' => 'Stock Minimal')) }}
                                    </div>
                                </div>
                            </div>
                            <blockquote>
                                <small>Kolom bertanda * wajib diisi</small>
                            </blockquote>
                            <input type="submit" class="btn btn-success" value="Simpan"> 
                            <input type="reset" class="btn btn-danger" value="Reset">
                            {{ Form::close() }}
                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
                </div><!-- nav-tabs-custom -->
            </div>
            <!-- <div class="col-md-4">
                <div class="box box-info">
                    <div class="box-body">
                        Petunjuk penggunaan
                    </div>
                </div>
            </div> -->
        </div>
    </section><!-- /.content -->
@stop
