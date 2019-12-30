<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Quản lý</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style1.css" rel="stylesheet">
        <link href="../css/style2.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header" >
                    <a class="navbar-brand" href="#">Hệ thống quản lý - TLU</a>
                </div>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i>Quản lý</a></li>
                </ul>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                            </li>
                            <li>
                                <a href="#" class="active"><i class="fa fa-book"></i>   Ngành học</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="Quanly_danhsachnganh.php"><i class="fa fa-list"></i> Danh sách các ngành</a>
                                    </li>
                                    <li>
                                        <a href="Quanly_themnganh.php"><i class="fa fa-plus-square"></i> Thêm ngành học</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-users"></i></i> Lớp học</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="Quanly_danhsachlop.php"><i class="fa fa-list"></i> Danh sách các lớp</a>
                                    </li>
                                    <li>
                                        <a href="Quanly_themlop.php"><i class="fa fa-plus-square"></i> Thêm lớp học</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-user"></i> Giảng viên</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="Quanly_danhsachgiangvien.php"><i class="fa fa-list"></i> Danh sách giảng viên</a>
                                    </li>
                                    <li>
                                        <a href="Quanly_nhapgiangvien.php"><i class="fa fa-plus-square"></i> Nhập danh sách giảng viên</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="Quanly_phancong.php"><i class="fa fa-address-card"></i>   Phân công giảng dạy</a>
                            </li>
                            <li>
                                <a href="#" class="active"><i class="fa fa-sign-out"></i>    Đăng xuất</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header" align="center">Thêm lớp học</h3>
                        </div>
                        <form name="edit_course">
                        <table class="table-form-edit" align="center" bgcolor="#FFFFFF">
                            <tr>
                                <td width="180" height="50px">Mã lớp học</td>
                                <td width="300"><input type="text" value="" name="makh" size="40"></td>
                            </tr>
                            <tr>
                                <td height="50px">Tên lớp học</td>
                                <td><input type="text" value="" size="40"></td>
                            </tr>
                            <tr>
                                <td height="50px">Tên ngành</td>
                                <td><select >
                                    <option selected="selected">----Chọn ngành-----</option>
                                    <option >CNTT</option>
                                    <option >Công trình</option>
                                    <option >Kinh tế</option>
                                    <option >Cơ khí</option>                                
                                </select></td>
                            </tr>
                            <tr>
                                <td height="50px">Phòng học</td>
                                <td><input type="text"  value="" size="40"></td>
                            </tr>
                            <tr>
                                <td align="center" height="50px"></td>
                                <td><a href="#"><input type="submit" value="Lưu lại" name="submit"></a></td>
                            </tr>
                        </table>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
