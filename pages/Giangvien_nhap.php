<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Giảng viên</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style1.css" rel="stylesheet">
        <link href="../css/style2.css" rel="stylesheet">
        <link href="../css/style3.css" rel="stylesheet">
        <link href="../css/style4.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">

    </head>
    <body>

        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Hệ thống quản lý - TLU</a>
                </div>
                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i>Giảng viên</a></li>
                </ul>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                            </li>
                             <li>
                                <a href="Giangvien_danhsachsinhvien.php" class="active"><i class="fa fa-list"></i>   Danh sách sinh viên</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Quản lý sinh viên</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="Giangvien_nhap.php"><i class="fa fa-plus-square"></i> Nhập danh sách sinh viên</a>
                                    </li>
                                    <li>
                                        <a href="Giangvien_thietlapdiem.php"><i class="fa fa-wrench"></i> Thiết lập đầu điểm</a>
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
                            <h3 class="page-header" align="center">Nhập danh sách sinh viên</h3>
                        </div>
                        <div class="list-course">
                            <form name="edit_course">
                                    <table class="table-form-edit" align="center" bgcolor="#FFFFFF">
                                        <tr>
                                            <td width="180" height="50px">Mã sinh viên</td>
                                            <td width="300"><input type="text" value="" name="masv" size="40"></td>
                                        </tr>
                                        <tr>
                                            <td height="50px">Tên sinh viên</td>
                                            <td><input type="text" value="" size="40"></td>
                                        </tr>
                                        <tr>
                                            <td height="50px">Lớp</td>
                                            <td><input type="text" value="" size="40"></td>
                                        </tr>
                                        <tr>
                                            <td height="50px">Giới tính</td>
                                            <td><input type="radio" > Nam <input type="radio">Nữ</td>
                                        <tr>
                                            <td align="center" height="50px" ></td>
                                            <td><a href="#"><input type="submit" value="Thêm" name="submit"></td>
                                        </tr>
                                    </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
