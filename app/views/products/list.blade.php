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
                        {{ Form::open() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Berdasarkan</label>
                                    {{ Form::select('criteria', 
                                        array('name' => 'Nama', 'sku' => 'SKU', 'category' => 'Kategori', 'location' => 'Lokasi'), 
                                        'name', 
                                        array('class' => 'form-control')) 
                                    }}
                                </div>
                            </div>
                            <div class="col-md-5">
                               <div class="form-group">
                                    <label>Kriteria Pencarian</label>
                                    {{ Form::text('query', '' , array('class' => 'form-control')) }}
                                </div>
                            </div>
                            <div class="col-md-3">
                               <div class="form-group">
                                    <label>Order</label>
                                    {{ Form::select('order', 
                                        array('asc' => 'Ascending', 'desc' => 'Descending'), 
                                        'asc', 
                                        array('class' => 'form-control')) 
                                    }}
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i>Filter</button>
                            </div>
                        </div>
                        {{ Form::close() }}
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
                                    <th>SKU</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Lokasi</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stock</th>
                                </tr>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->location->name }}</td>
                                        <td>Rp {{ number_format($product->stock->buy_price, 2, ',', '.') }}</td>
                                        <td>Rp {{ number_format($product->stock->sell_price, 2, ',', '.') }}</td>
                                        <td>{{ $product->stock->stock }}</td>
                                    </tr>
                                @endforeach
                            </tbody></table>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        {{ $products->links(); }}
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /.content -->
@stop
