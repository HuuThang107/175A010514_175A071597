<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Giảng viên</title>
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
                            <h3 class="page-header" align="center">Thiết lập trọng số điểm</h3>
                        </div>
                        <div class="list-course">
                            <form name="edit_course">
                        <table class="table-form-edit" align="center" bgcolor="#FFFFFF">
                            <tr>
                                <td height="70px" width="350px">Điểm quá trình / Điểm thi</td>
                                <td><select >
                                    <option selected="selected">------Chọn tỷ lệ-------</option>
                                    <option >3 / 7</option>
                                    <option >4 / 6</option>
                                    <option >5 / 5</option>
                                    <option >4 / 6</option>
                                </select></td>
                            </tr>
                            <tr>
                                <td height="70px">Điểm quá trình (Chuyên cần/ Phát biểu/ Kiểm tra)</td>
                                <td><select >
                                    <option selected="selected">------Chọn tỷ lệ-------</option>
                                    <option >2 / 2 / 6</option>
                                    <option >3 / 2 / 5</option>
                                    <option >2 / 3 / 5</option>
                                    <option >3 / 3 / 4</option>
                                </select></td>
                            </tr>
                            <tr>
                                <td align="center" height="70px"></td>
                                <td><a href="#"><input type="submit" value="Lưu lại" name="submit"></a></td>
                            </tr>
                        </table>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
