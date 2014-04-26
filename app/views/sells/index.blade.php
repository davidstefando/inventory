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
        @if (Session::get('message') == "success")
            <div class="alert alert-success alert-dismissable">
                Transaksi penjualan produk berhasil disimpan
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
        @elseif (Session::get('message') == "failed")
            <div class="alert alert-danger alert-dismissable">
                Transaksi penjualan produk gagal
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
        @endif
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
                                <input class="form-control" id="exampleInputEmail1"  placeholder="" type="text" value="{{ Sell::getRefCode(); }}"  disabled>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pembelian (yyyy-mm-dd)</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control" type="text" value="{{ date('Y-m-d') }}" disabled>
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
                        <form method="post" id="add-product-to-sell">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kode/Nama Barang</label>
                            <input class="form-control" id="sku" autocomplete="off" name="sku" type="text" url="{{ url('product/autocomplete') }}">
                            <div id="autocomplete-result"></div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah</label>
                            <input class="form-control" id="qty" placeholder="" name="qty" type="text">
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>Tambah Barang</button>
                        </form>
                    </div>
                </div>       
            </div>
       </div>
       <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    {{ Form::open() }}
                     <div class="box-body">
                        <div class="table-responsive no-padding">
                            <table class="table table-hover" id="temp-product">
                                <tbody><tr>
                                    <th>SKU</th>
                                    <th>Nama</th>
                                    <th>Stock</th>
                                    <th>Jumlah</th>
                                    <th>Harga Sebelumnya</th>
                                    <th>Harga Jual Sekarang</th>
                                    <th>Action</th>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>
                    <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-lg">Selesai <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
       </div>
    </section><!-- /.content -->
@stop
