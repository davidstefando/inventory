<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{ asset('public/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ asset('public/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('public/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-black">
	<!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="index.html" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
           Sistem Inventaris
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                   
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span> {{ studly_case(Auth::user()->username) }} <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Log out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">                
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <!-- <div class="user-panel">
                    <div class="pull-left image">
                        <img src="public/img/avatar3.png" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p>Hello, Jane</p>
                
                        <a href="#">admin</a>
                    </div>
                </div> -->
                <!-- search form -->
                <!-- <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Pencarian Barang..."/>
                        <span class="input-group-btn">
                            <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form> -->
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="active">
                        <a href="{{ url('') }}">
                            <i class="fa fa-home"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-tags"></i> <span>Produk</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('product') }}"><i class="fa fa-angle-double-right"></i> Daftar Produk</a></li>
                            <li><a href="{{ url('product/add') }}"><i class="fa fa-angle-double-right"></i> Tambah Produk</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('sell') }}">
                            <i class="fa fa-money"></i> <span>Penjualan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('purchase') }}">
                            <i class="fa fa-truck"></i> <span>Pembelian</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('stock/check') }}">
                            <i class="fa fa-signal"></i> <span>Cek Saldo</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Laporan</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('sell/report') }}"><i class="fa fa-angle-double-right"></i> Laporan Penjualan</a></li>
                            <li><a href="{{ url('purchase/report') }}"><i class="fa fa-angle-double-right"></i> Laporan Pembelian</a></li>
                            <li><a href="{{ url('stock/report') }}"><i class="fa fa-angle-double-right"></i> Stock Barang</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-asterisk"></i> <span>Lain - Lain</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('category') }}"><i class="fa fa-angle-double-right"></i> Kategori</a></li>
                            <li><a href="{{ url('unit') }}"><i class="fa fa-angle-double-right"></i> Unit</a></li>
                            <li><a href="{{ url('supplier') }}"><i class="fa fa-angle-double-right"></i> Supplier</a></li>
                            <li><a href="{{ url('location') }}"><i class="fa fa-angle-double-right"></i> Lokasi</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Pengaturan & Backup</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('setting/app') }}"><i class="fa fa-angle-double-right"></i> Pengaturan Aplikasi</a></li>
                            <li><a href="{{ url('setting/user') }}"><i class="fa fa-angle-double-right"></i> Pengaturan User</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <aside class="right-side">
        		@yield('content')
        </aside>
    </div>

	<!-- jQuery 2.0.2 -->
    <script src="{{ asset('public/js/jquery-2.1.0.js') }}"></script>
     <!-- FLOT CHARTS -->
    <script src="{{ asset('public/js/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="{{ asset('public/js/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('public/js/product_transaction.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('public/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/js/AdminLTE/app.js') }}" type="text/javascript"></script>

     <!-- page script -->
    <script type="text/javascript">
        $(function() {
            startTime();
            $(".center").center();
            $(window).resize(function() {
                $(".center").center();
            });
        });

        /*  */
        function startTime()
        {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            var 

            // add a zero in front of numbers<10
            m = checkTime(m);
            s = checkTime(s);

            //Check for PM and AM
            var day_or_night = (h > 11) ? "PM" : "AM";

            //Convert to 12 hours system
            if (h > 12)
                h -= 12;

            //Add time to the headline and update every 500 milliseconds
            $('#time').html(h + ":" + m + ":" + s + " " + day_or_night);
            $('#date').html(today.toLocaleDateString());
            setTimeout(function() {
                startTime()
            }, 500);
        }

        function checkTime(i)
        {
            if (i < 10)
            {
                i = "0" + i;
            }
            return i;
        }

        /* CENTER ELEMENTS IN THE SCREEN */
        jQuery.fn.center = function() {
            this.css("position", "absolute");
            this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
                    $(window).scrollTop()) - 30 + "px");
            this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
                    $(window).scrollLeft()) + "px");
            return this;
        }
    </script>
    <script type="text/javascript">
    /*
                 * LINE CHART
                 * ----------
                 */
                //LINE randomly generated data

                var sin = [], cos = [];
                for (var i = 0; i < 12; i += 0.5) {
                    sin.push([i, Math.sin(i)]);
                    cos.push([i, Math.cos(i)]);
                }
                var line_data1 = {
                    data: sin,
                    color: "#3c8dbc"
                };
                var line_data2 = {
                    data: cos,
                    color: "#00c0ef"
                };
                $.plot("#line-chart", [line_data1, line_data2], {
                    grid: {
                        hoverable: true,
                        borderColor: "#f3f3f3",
                        borderWidth: 1,
                        tickColor: "#f3f3f3"
                    },
                    series: {
                        shadowSize: 0,
                        lines: {
                            show: true
                        },
                        points: {
                            show: true
                        }
                    },
                    lines: {
                        fill: false,
                        color: ["#3c8dbc", "#f56954"]
                    },
                    yaxis: {
                        show: true,
                    },
                    xaxis: {
                        show: true
                    }
                });
                //Initialize tooltip on hover
                $("<div class='tooltip-inner' id='line-chart-tooltip'></div>").css({
                    position: "absolute",
                    display: "none",
                    opacity: 0.8
                }).appendTo("body");
                $("#line-chart").bind("plothover", function(event, pos, item) {

                    if (item) {
                        var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);

                        $("#line-chart-tooltip").html(item.series.label + " of " + x + " = " + y)
                                .css({top: item.pageY + 5, left: item.pageX + 5})
                                .fadeIn(200);
                    } else {
                        $("#line-chart-tooltip").hide();
                    }

                });
                /* END LINE CHART */


    </script>
</body>
</html>