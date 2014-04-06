@extends('layout')

@section('title')
	Sistem Inventeris
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Daftar Produk
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">Tambah Produk</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="alert alert-success alert-dismissable">
            Produk berhasil disimpan
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div>
        <div class="row">
            <div class="col-md-8">
                <!-- Custom Tabs (Pulled to the right) -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li><a href="#tab_2-2" data-toggle="tab">Import Data Produk(Excell, CSV)</a></li>
                        <li class="active"><a href="#tab_1-1" data-toggle="tab">Input Data Produk</a></li>
                        <li class="pull-left header"><i class="fa fa-plus"></i> Tambah Data Produk</li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1-1">
                            <p>Lengkapi data dibawah ini, kolom bertanda * wajib diisi</p>
                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="exampleInputEmail1">Kode Barang*</label>
                                        <input class="form-control" id="exampleInputEmail1" placeholder="KB-THN-NO" type="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama*</label>
                                        <input class="form-control" id="exampleInputEmail1" placeholder="Nama Barang" type="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori*</label>
                                        <select class="form-control">
                                            <option>--</option>
                                            <option>Barang Elektronik</option>
                                            <option>Sembako</option>
                                            <option>Baju</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Satuan*</label>
                                        <select class="form-control">
                                            <option>--</option>
                                            <option>KG</option>
                                            <option>Dus</option>
                                            <option>Lusin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stock Awal*</label>
                                        <input class="form-control" id="exampleInputEmail1" placeholder="Stock awal barang" type="email">
                                    </div>
                                    <div class="form-group has-error">
                                        <label for="exampleInputEmail1">Stock Minimal*</label>
                                        <input class="form-control" id="exampleInputEmail1" placeholder="Stock awal barang" type="email">
                                        <label class="control-label">Stock minimal harus lebih dari 0</label>
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Harga Beli*</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">Rp</div>
                                            <input class="form-control" id="exampleInputEmail1" placeholder="Harga beli" type="email">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Harga Jual*</label>
                                         <div class="input-group">
                                            <div class="input-group-addon">Rp</div>
                                            <input class="form-control" id="exampleInputEmail1" placeholder="Harga jual" type="email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success" value="Simpan"> 
                            <input type="reset" class="btn btn-danger" value="Reset">
                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2-2">
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
                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
                </div><!-- nav-tabs-custom -->
            </div>
            <div class="col-md-4">
                <div class="box box-info">
                    <div class="box-body">
                        Petunjuk penggunaan
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
@stop
