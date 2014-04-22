@extends('layout')

@section('title')
	Sistem Inventeris
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Laporan Penjualan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Laporan</a></li>
            <li class="active">Penjualan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom no-print">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Harian</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Bulanan</a></li>
                        <li><a href="#tab_3" data-toggle="tab">Tahunan</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            {{ Form::open(array('url' => 'sell/report/daily')) }}
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            {{ Form::text('date', null, array('class' => 'form-control', 'placeholder' => 'yyyy-mm-dd')) }}
                                        </div><!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Urutkan Data Berdasarkan</label>
                                        {{ Form::select('criteria', array('products.sku' => 'Kode Barang',
                                                                            'name' => 'Nama Barang',
                                                                            'sell_price' => 'Harga Jual',
                                                                            'buy_price' => 'Harga Beli',
                                                                            'qty' => 'Qty'),
                                                 'sku', array('class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Urutan</label>
                                        {{ Form::select('order', array('asc' => 'Ascending',
                                                                        'desc' => 'Descending'),
                                                'asc', array('class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        {{ Form::text('sku', null, array('class' => 'form-control', 'placeholder' => 'Kode Barang')) }}
                                        <p class="help-block">Isi kode barang jika ingin melihat laporan per barang</p>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                            {{ Form::close() }}
                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            {{ Form::open(array('url' => 'sell/report/monthly')) }}
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Bulan</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            {{ Form::selectMonth('month', null, array('class' => 'form-control')) }}
                                        </div><!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-md-2">
                                     <div class="form-group">
                                        <label>Tahun</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            {{ Sell::getYearTrack() }}
                                        </div><!-- /.input group -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Urutkan Data Berdasarkan</label>
                                        {{ Form::select('criteria', array('products.sku' => 'Kode Barang',
                                                                            'name' => 'Nama Barang',
                                                                            'sell_price' => 'Harga Jual',
                                                                            'buy_price' => 'Harga Beli',
                                                                            'qty' => 'Qty'),
                                                 'sku', array('class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Urutan</label>
                                        {{ Form::select('order', array('asc' => 'Ascending',
                                                                        'desc' => 'Descending'),
                                                'asc', array('class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        {{ Form::text('sku', null, array('class' => 'form-control', 'placeholder' => 'Kode Barang')) }}
                                        <p class="help-block">Isi kode barang jika ingin melihat laporan per barang</p>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                            {{ Form::close() }}
                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            {{ Form::open(array('url' => 'sell/report/year')) }}
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            {{ Sell::getYearTrack() }}
                                        </div><!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Urutkan Data Berdasarkan</label>
                                        {{ Form::select('criteria', array('products.sku' => 'Kode Barang',
                                                                            'name' => 'Nama Barang',
                                                                            'sell_price' => 'Harga Jual',
                                                                            'buy_price' => 'Harga Beli',
                                                                            'qty' => 'Qty'),
                                                 'sku', array('class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Urutan</label>
                                        {{ Form::select('order', array('asc' => 'Ascending',
                                                                        'desc' => 'Descending'),
                                                'asc', array('class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        {{ Form::text('sku', null, array('class' => 'form-control', 'placeholder' => 'Kode Barang')) }}
                                        <p class="help-block">Isi kode barang jika ingin melihat laporan per barang</p>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                            {{ Form::close() }}
                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
                </div><!-- nav-tabs-custom -->
            </div>
            <div class="col-lg-12 col-xs-12">
                {{ $child }}
            </div>
        </div>

    </section><!-- /.content -->
@stop