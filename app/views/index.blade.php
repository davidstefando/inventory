@extends('layout')

@section('title')
	Sistem Inventeris
@stop

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Halaman utama</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>
                                15:00
                            </h3>
                            <p>
                                Senin, 21 Maret 2014
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-calendar"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                                5 Produk
                            </h3>
                            <p>
                                Mencapai Stock Minimum
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-truck"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Statistik Perkembangan Toko</h3>
                    </div>
                    <div class="box-body">
                       
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        
                    </div><!-- /.box-footer-->
                </div>

    </section><!-- /.content -->
@stop
