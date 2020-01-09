
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

        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/metisMenu.min.js"></script>
        <script src="../js/startmin.js"></script>
        <link rel="stylesheet" href="../css/bootstrap-social.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
                                <a href="../includes/Dangnhap.php" class="active"><i class="fa fa-sign-out"></i>    Đăng xuất</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>

        <div class="container">
            <div class="col-md-12">
                <center><h3 style="margin-top: 80px">Quản Lý Dữ Liệu</h3></center>
                <form method="POST" id="insert_sinhvien" style="margin-left: 320px; width: 500px">
                    <br>
                    <label style="">Tên sinh viên</label>
                    <input type="text" class="form-control" id="tensv" placeholder="Tên sinh viên" style="margin-left: 120px">
                    <br>
                    <label>Chứng minh thư</label>
                    <input type="text" class="form-control" id="cmt" placeholder="Chứng minh thư" style="margin-left: 120px">
                    <br>
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" id="diachi" placeholder="Địa Chỉ" style="margin-left: 120px">
                    <br>
                    <label>Lớp</label>
                    <input type="text" class="form-control" id="lop" placeholder="Lớp" style="margin-left: 120px">
                    <br>
                    <center><input type="button" name="insert_data" id="button_them" value="Thêm" class="btn btn-success" style="margin-left: 100px"></center>
                    <br>
                </form>
                <br>
                <div class="table-responsive" id="sinhvien_table">
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function () {
                load_du_lieu();
                function load_du_lieu() {
                    $.ajax({
                        url: "giaovien-sinhvien.php",
                        method: "POST",
                        success: function (data) {
                            $('#sinhvien_table').html(data);
                        }
                    });
                }
                load_du_lieu();

                //Them du lieu
                $('#button_them').on('click', function () {
                    var tensv = $('#tensv').val();
                    var cmt = $('#cmt').val();
                    var diachi = $('#diachi').val();
                    var lop = $('#lop').val();
                    if (tensv == ''  || cmt == '' || diachi == '' || lop == '' ) {
                        alert('Vui lòng nhập đầy đủ dữ liệu');
                    } else {
                        $.ajax({
                            url: "giaovien-sinhvien.php",
                            method: "POST",
                            data: {
                                tensv:tensv,
                                cmt:cmt,
                                diachi:diachi,
                                lop:lop
                            },
                            success: function (data) {
                                alert("Thêm dữ liệu thành công!");
                                $('#insert_sinhvien')[0].reset();
                                load_du_lieu();
                            }
                        });
                    }
                });
                load_du_lieu();
                //xoa du lieu
                $(document).on('click', '.del', function () {
                    var newID = $(this).attr("id");
                    if (confirm('Bạn muốn bay màu học sinh này ?')) {
                        $.ajax({
                            url: "giaovien-sinhvien.php",
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
