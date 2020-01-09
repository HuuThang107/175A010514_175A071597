<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Quản trị</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style1.css" rel="stylesheet">
        <link href="../css/style2.css" rel="stylesheet">
        <link href="../css/style3.css" rel="stylesheet">
        <link href="../css/style4.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header" >
                    <a class="navbar-brand" href="#">Hệ thống quản lý - TLU</a>
                </div>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i>Quản trị </a></li>
                </ul>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                            </li>
                            <li>
                                <a href="#" class="active"><i class="fa fa-cog"></i>  Quản trị viên</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="Quantri_danhsachquantri.php"><i class="fa fa-list"></i> Danh sách quản trị viên</a>
                                    </li>
                                    <li>
                                        <a href="Quantri_themquantri.php"><i class="fa fa-plus-square"></i> Thêm quản trị viên</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" ><i class="fa fa-user"></i> Giảng viên</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="Quantri_danhsachgiangvien.php"><i class="fa fa-list"></i> Danh sách giảng viên</a>
                                    </li>
                                    <li>
                                        <a href="Quantri_themgiangvien.php"><i class="fa fa-plus-square"></i> Thêm giảng viên</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" ><i class="fa fa-users"></i></i> Sinh viên</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="Quantri_danhsachsinhvien.php"><i class="fa fa-list"></i> Danh sách sinh viên</a>
                                    </li>
                                    <li>
                                        <a href="Quantri_themsinhvien.php"><i class="fa fa-plus-square"></i> Thêm sinh viên</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="Dangnhap.php" class="active"><i class="fa fa-sign-out"></i>    Đăng xuất</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header" align="center">Danh sách sinh viên</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
