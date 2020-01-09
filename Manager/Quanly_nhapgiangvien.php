


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Quản lý</title>
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
                                        <a href="Quanly_themnganh.php"><i class="fa fa-plus-square"></i> Quản lý ngành học</a>
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
                                        <a href="Quanly_themlop.php"><i class="fa fa-plus-square"></i> Quản lý lớp học</a>
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
                                        <a href="Quanly_nhapgiangvien.php"><i class="fa fa-plus-square"></i> Quản lý giảng viên</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="Quanly_phancong.php"><i class="fa fa-address-card"></i>   Phân công giảng dạy</a>
                            </li>
                            <li>
                                <a href="../includes/Dangnhap.php" class="active"><i class="fa fa-sign-out"></i>    Đăng xuất</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    <div class="container">
        <div class="col-md-12">
            <center><h3 style="margin-top: 70px">Quản Lý Dữ Liệu</h3></center>
            <form method="POST" id="insert_gv" style="width: 500px; margin-left: 300px">
            <label>Tên giáo viên</label>
            <input type="text" class="form-control" id="tengv" placeholder="Điền tên giáo viên" style="margin-left: 120px">
            <br>
            <label>Địa chỉ</label>
            <input type="text" class="form-control" id="diachi" placeholder="Điền địa chỉ giáo viên" style="margin-left: 120px">
            <br>
            <label>Số điện thoại</label>
            <input type="text" class="form-control" id="sdt" placeholder="Điền số điện thoại giáo viên" style="margin-left: 120px">
                <br>
            <center><input type="button" name="insert_data" id="button_them" value="Thêm" class="btn btn-success"></center>
                <br>
            </form>
            <div class="table-responsive" id="gv_table">

        </div>
    </div>
        <script type="text/javascript">

                $(document).ready(function () {
                    load_du_lieu();

                    function load_du_lieu() {
                        $.ajax({
                            url: "quanly-giaovien.php",
                            method: "POST",
                            success: function (data) {
                                $('#gv_table').html(data);
                            }
                        });
                    }

                    load_du_lieu();
                    //Them du lieu
                    $('#button_them').on('click', function () {
                        var tengv = $('#tengv').val();
                        var diachi = $('#diachi').val();
                        var sdt = $('#sdt').val();
                        if (tengv == '' || diachi == '' || sdt == '' ) {
                            alert('Vui lòng nhập đầy đủ dữ liệu');
                        } else {
                            $.ajax({
                                url: "quanly-giaovien.php",
                                method: "POST",
                                data: {tengv: tengv, diachi: diachi, sdt: sdt},
                                success: function (data) {

                                    alert("Thêm dữ liệu thành công!");

                                    $('#insert_gv')[0].reset();
                                    load_du_lieu()
                                }
                            });
                        }
                    });
                    $(document).on('click', '.del', function () {
                        var newID = $(this).attr("id");
                        if (confirm('Bạn muốn bay màu giáo viên này ?')) {
                            $.ajax({
                                url: "quanly-giaovien.php",
                                method: "POST",
                                data: {newID: newID},
                                success: function (data) {
                                    load_du_lieu();
                                }
                            });
                        }
                    });
                });
        </script>
    </body>
</html>









