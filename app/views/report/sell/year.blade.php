<div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-book"></i>
                        <h3 class="box-title">Laporan Penjualan {{ Setting::get('organization_name') }}</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-success pull-right no-print" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>Laporan Tahunan</strong><br>
                                    {{ $year }}<br>
                                </address>
                            </div><!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>Total Penjualan</strong><br>
                                    Rp {{ number_format($total_sell, 2, ',', '.') }}<br>
                                </address>
                            </div><!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <address>
                                    <strong>Total Barang Terjual</strong><br>
                                    {{ $total_qty }}<br>
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
                                @foreach ($product_list as $product)
                                    <tr>
                                        <td> {{ $product->sku }} </td>
                                        <td> {{ $product->name }} </td>
                                        <td> {{ $product->date }} </td>
                                        <td> Rp{{ number_format($product->buy_price, 2, ',', '.') }} </td>
                                        <td> Rp{{ number_format($product->sell_price, 2, ',', '.') }} </td>
                                        <td> {{ $product->qty }} </td>
                                        <td> Rp{{ number_format($product->total, 2, ',', '.') }} </td>
                                    </tr>
                                @endforeach
                            </tbody></table>
                        </div>
                    </div>
                </div>