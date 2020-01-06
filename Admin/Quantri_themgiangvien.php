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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                            <h3 class="page-header" align="center">Thêm giảng viên</h3>
                        </div>
                        <form name="edit_course">
                        <table class="table-form-edit" align="center" bgcolor="#FFFFFF">
                            <tr>
                                <td width="180" height="50px">Mã giảng viên</td>
                                <td width="300"><input type="text" value="" name="makh" size="40"></td>
                            </tr>
                            <tr>
                                <td height="50px">Tên giảng viên</td>
                                <td><input type="text" value="" size="40"></td>
                            </tr>
                            <tr>
                                <td height="50px">Giới tính</td>
                                <td><input type="radio" > Nam <input type="radio">Nữ</td>
                            </tr>
                            <tr>
                                <td height="50px">SĐT</td>
                                <td><input type="text" value="" size="40"></td>
                            </tr>
                            <tr>
                                <td height="50px">Quê quán</td>
                                <td><input type="text" value="" size="40"></td>
                            </tr>
                            <tr>
                                <td height="50px">Giảng dạy môn</td>
                                <td><input type="text" value="" size="40"></td>
                            </tr>
                            <tr>
                                <td align="center" height="50px"></td>
                                <td><a href="dsgiaovien.html"><input type="submit" value="Thêm" name="submit"></a>
                            </tr>
                        </table>
                    </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
