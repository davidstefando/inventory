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
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" type="text">
                                        </div><!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Urutkan Data Berdasarkan</label>
                                        <select class="form-control">
                                            <option>Kode Barang</option>
                                            <option>Nama</option>
                                            <option>Harga Beli</option>
                                            <option>Harga Jual</option>
                                            <option>Qty</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Urutan</label>
                                        <select class="form-control">
                                            <option>Ascending</option>
                                            <option>Descending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        <input class="form-control" type="text" placeholder="kode barang">
                                        <p class="help-block">Isi kode barang jika ingin melihat laporan per barang</p>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Bulan</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <select class="form-control"></select>
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
                                            <select class="form-control"></select>
                                        </div><!-- /.input group -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Urutkan Data Berdasarkan</label>
                                        <select class="form-control">
                                            <option>Kode Barang</option>
                                            <option>Nama</option>
                                            <option>Harga Beli</option>
                                            <option>Harga Jual</option>
                                            <option>Qty</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Urutan</label>
                                        <select class="form-control">
                                            <option>Ascending</option>
                                            <option>Descending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        <input class="form-control" type="text" placeholder="kode barang">
                                        <p class="help-block">Isi kode barang jika ingin melihat laporan per barang</p>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <select class="form-control"></select>
                                        </div><!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Urutkan Data Berdasarkan</label>
                                        <select class="form-control">
                                            <option>Kode Barang</option>
                                            <option>Nama</option>
                                            <option>Harga Beli</option>
                                            <option>Harga Jual</option>
                                            <option>Qty</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Urutan</label>
                                        <select class="form-control">
                                            <option>Ascending</option>
                                            <option>Descending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        <input class="form-control" type="text" placeholder="kode barang">
                                        <p class="help-block">Isi kode barang jika ingin melihat laporan per barang</p>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
                </div><!-- nav-tabs-custom -->
            </div>
            <div class="col-lg-12 col-xs-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-book"></i>
                        <h3 class="box-title">Laporan Penjualan "Toko Jaya"</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-success pull-right no-print" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>Laporan Harian</strong><br>
                                    26/12/2014<br>
                                </address>
                            </div><!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>Total Penjualan</strong><br>
                                    Rp 1.000.000,00<br>
                                </address>
                            </div><!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>Total Barang Terjual</strong><br>
                                    521<br>
                                </address>
                            </div><!-- /.col -->
                              
                        </div>
                        <div class="table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>SKU</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <td>B0213-231</td>
                                    <td>Indomie Goreng</td>
                                    <td>11-7-2014</td>
                                    <td>Rp 20.000</td>
                                    <td>Rp 21.000</td>
                                    <td>102</td>
                                    <td>Rp 252.000</td> 
                                </tr>
                                <tr>
                                    <td>B0213-231</td>
                                    <td>Lotek Instant</td>
                                    <td>11-7-2014</td>
                                    <td>Rp 3.500</td>
                                    <td>Rp 4.000</td>
                                    <td>400</td>
                                    <td>Rp 1.600.000</td> 
                                </tr>
                            </tbody></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /.content -->
@stop