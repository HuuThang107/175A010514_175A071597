<?php
require_once ("../includes/connection.php");
function fill_lophoc($conn)
{
    $output = '';
    $sql = "SELECT * FROM lophocphan";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $output .= '<option value="'.$row["malophocphan"].'">'.$row["tenlophocphan"].'</option>';
    }
    return $output;
}
function fill_sinhvien($conn)
{
    $output = '';
    $sql = "SELECT * FROM sinhvien";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $output .= '<option value="'.$row["masv"].'">'.$row["tensv"].'</option>';
    }
    return $output;
}
?>




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
                                <a href="#" class="active"><i class="fa fa-sign-out"></i>    Đăng xuất</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        </div>
        <div class="container">
            <div class="col-md-12">
                <center><h3>Quản Lý Dữ Liệu</h3></center>
                <form method="POST" id="insert_diem" >
                    <label>Nhập trọng số điểm quá trình</label>
                    <input type="text" class="form-control" id="trongso" placeholder="Nhập trọng số">
                    <br>
                    <label>Chọn lớp</label>
                    <select class="form-control" id="malophocphan" name="malophocphan">
                        <option value="">Chọn lớp học</option>
                        <?php echo fill_lophoc($conn); ?>
                    </select>
                    <br>
                    <label>Chọn sinh viên</label>
                    <select class="form-control" id="masv" name="masv">
                        <option value="">Chọn sinh viên</option>
                        <?php echo fill_sinhvien($conn); ?>
                    </select>
                    <br>
                    <label>Điểm chuyên cần</label>
                    <input type="text" class="form-control" id="dcc" placeholder="Điểm chuyên cần">
                    <br>
                    <label>Điểm giữa kì</label>
                    <input type="text" class="form-control" id="dgk" placeholder="Điểm giữa kì">
                    <br>
                    <label>Điểm bài tập</label>
                    <input type="text" class="form-control" id="dbt" placeholder="Điểm bài tập">
                    <br>
                    <label>Điểm thực hành</label>
                    <input type="text" class="form-control" id="dth" placeholder="Điểm thực hành">
                    <br>
                    <label>Điểm Thi</label>
                    <input type="text" class="form-control" id="diemthi" placeholder="Điểm thi hết môn">
                    <br>
                    <center><input type="button" name="insert_data" id="button_them" value="Thêm" class="btn btn-success"></center>
                    <br>

                </form>
                <br>
                <div class="table-responsive" id="diem_table">
                </div>
            </div>
        </div>

    </body>
    <script type="text/javascript">
        $(document).ready(function () {
            load_du_lieu();
            function load_du_lieu() {
                $.ajax({
                    url: "giaovien-phancong.php",
                    method: "POST",
                    success: function (data) {
                        $('#diem_table').html(data);
                    }
                });
            }
            load_du_lieu();

            //Them du lieu
            $('#button_them').on('click', function () {
                var malophocphan = $('#malophocphan').val();
                var masv = $('#masv').val();
                var trongso = $('#trongso').val();
                var dcc = $('#dcc').val();
                var dgk = $('#dgk').val();
                var dbt = $('#dbt').val();
                var dth = $('#dth').val();
                var diemthi = $('#diemthi').val();
                if ( malophocphan == 'Chọn lớp học'  || masv == 'Chọn sinh viên' || trongso == ''|| dcc == '' || dgk == '' || dbt == '' || dth == '' ||diemthi == ''||trongso <0||trongso >1) {
                    alert('Vui lòng nhập đầy đủ dữ liệu');
                } else {
                    $.ajax({
                        url: "giaovien-phancong.php",
                        method: "POST",
                        data: {
                            malophocphan:malophocphan,
                            masv:masv,
                            trongso:trongso,
                            dcc:dcc,
                            dgk:dgk,
                            dbt:dbt,
                            dth:dth,
                            diemthi:diemthi,
                        },
                        success: function (data) {
                            alert("Thêm dữ liệu thành công!");
                            $('#insert_diem')[0].reset();
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
                        url: "giaovien-phancong.php",
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
</html>
