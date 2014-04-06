@extends('layout')

@section('title')
	Sistem Inventeris
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Penjualan
        </h1>
        <small>transaksi penjualan barang, tambah data barang, lalu klik Tombol "Proses"</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Penjualan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-tag"></i>
                        <h3 class="box-title">Data Penjualan</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Kode Referensi Penjualan</label>
                                <input class="form-control" id="exampleInputEmail1" placeholder="" type="email">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pembelian</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" type="text">
                            </div><!-- /.input group -->
                        </div>
                    </div>
                </div>       
            </div>
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-gift"></i>
                        <h3 class="box-title">Data Barang</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Kode/Nama Barang</label>
                                <input class="form-control" id="exampleInputEmail1" placeholder="" type="email">
                        </div>
                        <a class="btn btn-success"><i class="fa fa-plus"></i>Tambah Barang</a>
                    </div>
                </div>       
            </div>
       </div>
       <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                     <div class="box-body">
                        <div class="table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>SKU</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Harga Jual</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>B21-231-3</td>
                                    <td>Komputer Komputer Komputer Komputeran</td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" id="exampleInputEmail1" placeholder="jumlah penjualan" type="email">
                                            <div class="input-group-addon">Unit</div>
                                        </div>    
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-addon">Rp</div>
                                            <input class="form-control" id="exampleInputEmail1" placeholder="Harga jual" type="email">
                                        </div>                                      
                                    </td>
                                    <td><a class="btn btn-danger"><i class="fa fa-trash-o"></i>Hapus</a></td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>
                    <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-lg">Proses <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
            </div>
       </div>
    </section><!-- /.content -->
@stop
