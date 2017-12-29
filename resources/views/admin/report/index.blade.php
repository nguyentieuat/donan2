<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <title>Admin</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('report/css/adminStyle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('report/css/datepicker3.css') }}">

</head>

<body>

    <div id="wrapper">
        <!-- Page Content -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Area</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        @if(isset($currentUser))
                        <li><a href="admin/user/edit/{{$currentUser->id}}"><i class="fa fa-user fa-fw"></i> {{$currentUser->name}}</a>
                        </li>
                        <li><a href="admin/user/edit/{{$currentUser->id}}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="admin/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                        @endif
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            @include('admin.layout.menu')
        </nav>
        
        <section class='' id="page-wrapper">
            <!-- The breadcrumb -->
            <header>
                <ol class="breadcrumb">
                    <li><a href="{!! url('admin') !!}">Trang chủ</a>
                    </li>
                    <li>Thống kê</li>
                </ol>
            </header>
            <!-- Main content -->
            <article>
                <header style='text-align: center;' class='col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3'>
                    <form action="{{route('report')}}" method="post">
                        {{ csrf_field() }}
                        <div class='form-group col-xs-9'>
                            <input class='form-control form-val datepicker' name='fromDate' style='width:45%;float:left'>
                            <div style='width:10%;text-align: center;float:left;'> - </div>
                            <input class='form-control form-val datepicker' name='toDate' style='width:45%'>
                        </div>
                        <div class='form-group col-xs-3'>
                            <button type='submit' id='btn-filter' class='btn btn-primary'>Lọc</button>
                        </div>
                    </form>
                </header>
                <div id='list-data' style='clear:both;'>
                    @include('admin.report.content')
                </div>
            </article>
        </section>
        <!-- customer info -->

        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('report/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('report/js/chart.min.js') }}"></script>
    <script src="{{ asset('report/js/admin.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>

    @yield('script')
</body>

</html>