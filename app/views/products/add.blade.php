@extends('layout')

@section('title')
	Sistem Inventeris
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Produk Baru
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">Tambah Produk</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        @if (Session::get('message'))
            <div class="alert alert-success alert-dismissable">
                Produk berhasil disimpan
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
                        <li><a href="#tab_2-2" data-toggle="tab">Import Data Produk(Excell, CSV)</a></li>
                        <li class="active"><a href="#tab_1-1" data-toggle="tab">Input Data Produk</a></li>
                        <li class="pull-left header"><i class="fa fa-plus"></i> </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1-1">
                            {{ Form::open() }}
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
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Lokasi*</label>
                                        {{ Form::select('location_id', $location, null ,array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Satuan*</label>
                                        {{ Form::select('unit_id', $unit, null ,array('class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stock Awal***</label>
                                        {{ Form::text('stock', Input::old('stock'), array('class' => 'form-control', 'placeholder' => 'Stock Awal Barang')) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stock Minimal*</label>
                                        {{ Form::text('minimum_stock', Input::old('minimum_stock'), array('class' => 'form-control', 'placeholder' => 'Stock Minimal')) }}
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Harga Beli***</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Rp</div>
                                            {{ Form::text('buy_price', Input::old('buy_price'), array('class' => 'form-control', 'placeholder' => 'Harga Beli')) }}
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Harga Jual***</label>
                                         <div class="input-group">
                                            <div class="input-group-addon">Rp</div>
                                            {{ Form::text('sell_price', Input::old('sell_price'), array('class' => 'form-control', 'placeholder' => 'Harga Jual')) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <blockquote>
                                <small>Kolom bertanda * wajib diisi</small>
                                <small>Kolom bertanda ** dapat diisi dengan "0" jika data belum tersedia</small>
                                <small>Kolom bertanda *** wajib diisi dan dapat diisi dengan "0" jika data belum tersedia</small>
                            </blockquote>
                            <input type="submit" class="btn btn-success" value="Simpan"> 
                            <input type="reset" class="btn btn-danger" value="Reset">
                            {{ Form::close() }}
                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2-2">
                            {{ Form::open() }}
                            <div class="row">
                                <div class="col-md-8">
                                    <p>Import data dari excell, gunakan menu ini jika anda ingin memasukkan banyak data sekaligus</p>
                                    <p>Urutan data yang benar adalah (Kode Produk, Nama Produk, Kategori, Satuan, Stock Awal, Stock Minimal, Harga Beli, Harga Jual) anda harus mengikuti aturan urutan data ini dan semua kolom harus diisi</p>
                                    <p>Lengkapi data dibawah ini</p>
                                   <div class="form-group">
                                        <label for="exampleInputFile">Pilih File Yang Akan Diimport</label>
                                        <input id="exampleInputFile" type="file">
                                    </div>
                                    <input class="btn btn-success" id="exampleInputFile" type="submit" value="Import">
                                </div>
                                <div class="col-md-4">
                                    <input type="button" class="btn btn-primary btn-block" value="Download Sample File">
                                </div>
                            </div>
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
