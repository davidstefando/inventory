@extends('layout')

@section('title')
	Sistem Inventeris
@stop

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Daftar Kategori
        </h1>
        <small>Daftar ini digunakan untuk mengkategorikan produk</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Other</a></li>
            <li class="active">Kategori</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="box box-solid">
            <div class="box-header">
                <h3 class="box-title">Data Kategori</h3>
                <div class="box-tools pull-right">
                    <a href="{{ url('category/create') }}" class="btn btn-success"><i class="fa fa-plus fa-inverse">Tambah Kategori</i></a>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive no-padding">
                    <table class="table table-hover">
                    	<thead>
                    		<tr>
                    			<th>ID</th>
	                    		<th>Nama</th>
	                    		<th>Action</th>
                    		</tr>
                    	</thead>
                        <tbody>
                        	@foreach ($categories as $category)
							<tr>
		                        <td>{{ $category->id }}</td>
		                        <td>{{ $category->name }}</td>
		                        <td>
		                        	{{ link_to('category/' . $category->id . '/edit', 'Edit', array('class' => 'label label-primary')) }}
		                        	<!-- {{ Form::open(array('url' => 'category/' . $category->id))}}
                                                                            {{ Form::hidden('_method', 'DELETE') }}
                                                                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                                                        {{ Form::close() }} -->
		                        </td>
		                    </tr>                      
                        	@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-footer clearfix">
            </div>
        </div>
    </section>
@stop