@extends('layout')

@section('title')
	Sistem Inventeris
@stop

@section('content')
	<div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-book"></i>
                        <h3 class="box-title">Laporan Stock {{ Setting::get('organization_name') }}</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-success pull-right no-print" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>Laporan Stock</strong><br>
                                    {{ date('d-F-Y') }}<br>
                                </address>
                            </div><!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>Total Penjualan</strong><br>
                                    <br>
                                </address>
                            </div><!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>Total Barang Terjual</strong><br>
                                    <br>
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
                            </tbody></table>
                        </div>
                    </div>
                </div>
@stop