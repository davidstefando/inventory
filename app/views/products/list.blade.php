@extends('layout')

@section('title')
	Daftar Produk
@stop

@section('content')           
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Daftar Produk
        </h1>
        <small>Daftar produk-produk, data produk ini digunakan saat proses penjualan dan pembelian barang</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">Daftar Produk</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <!-- small box -->
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Jumlah Data</label>
                                    <select class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Berdasarkan</label>
                                    <select class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label>Kriteria Pencarian</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i>Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Data barang</h3>
                        <div class="box-tools pull-right">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>Tambah Produk</button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Reason</th>
                                </tr>
                                <tr>
                                    <td>183</td>
                                    <td>John Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="label label-success">Approved</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>219</td>
                                    <td>Jane Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>657</td>
                                    <td>Bob Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="label label-primary">Approved</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>175</td>
                                    <td>Mike Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="label label-danger">Denied</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>175</td>
                                    <td>Mike Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="label label-danger">Denied</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>175</td>
                                    <td>Mike Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="label label-danger">Denied</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                                <tr>
                                    <td>175</td>
                                    <td>Mike Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="label label-danger">Denied</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /.content -->
@stop
