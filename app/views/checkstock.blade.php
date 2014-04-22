@extends('layout')

@section('title')
	Sistem Inventeris
@stop

@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Stock
            <small>Cek detail stock</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Stock</li>
            <li class="active">Check</li>
        </ol>
    </section>

     <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="box">
                    {{ Form::open() }}
                    <div class="box-header">
                        <h3 class="box-title">ID/Nama Produk</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="sku">
                        </div>
                        <button class="btn btn-primary btn-lg" type="submit">Check</button>    
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
            @if (isset($product))
            <div class="col-lg-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <p>
                            Stock   
                        </p>
                        <h3>
                            {{ $product->stock->stock }} Unit
                        </h3>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @if (isset($product))
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Detail Produk</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-striped">
                            <thead>
                                <th>SKU</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Stock Minimum</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>Rp{{ number_format($product->stock->buy_price, 2, ',', '.') }}</td>
                                    <td>Rp{{ number_format($product->stock->sell_price, 2, ',', '.') }}</td>
                                    <td>{{ $product->minimum_stock }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div>
            </div>
        </div>
        @endif
    </section>
@stop