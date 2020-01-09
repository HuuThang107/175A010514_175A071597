
<?php
require_once ("../includes/connection.php");
function fill_monhoc($conn)
{
    $output = '';
    $sql = "SELECT * FROM monhoc";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $output .= '<option value="'.$row["mamon"].'">'.$row["tenmon"].'</option>';
    }
    return $output;
}
function fill_giaovien($conn)
{
    $output = '';
    $sql = "SELECT * FROM giaovien ";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $output .= '<option value="'.$row["magv"].'">'.$row["tengv"].'</option>';
    }
    return $output;
}

?>


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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
                                <a href="Quanly_phancong"><i class="fa fa-address-card"></i>   Phân công giảng dạy</a>
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
                <form method="POST" id="insert_gv_mon" style="width: 500px; margin-left: 300px">
                    <label>Chọn môn học</label>
                    <select class="form-control" id="mamon" name="mamon" style="margin-left: 120px">
                        <option value="">Chọn môn học</option>
                        <?php echo fill_monhoc($conn); ?>
                    </select>
                    <br>
                    <label>Chọn giáo viên</label>
                    <select class="form-control" id="magv" name="magv" style="margin-left: 120px">
                        <option value="">Chọn giáo viên</option>
                        <?php echo fill_giaovien($conn); ?>
                    </select>
                    <br>
                    <label>Ghi chú</label>
                    <input type="text" class="form-control" id="ghichu" placeholder="Ghi chú phân công" style="margin-left: 120px">
                    <br>
                    <center><input type="button" name="insert_data" id="button_them" value="Thêm" class="btn btn-success"></center>
                    <br>
                </form>
                <br>
                <div class="table-responsive" id="gv_mon_table">
                </div>
            </div>
        </div>

    </body>
    <script type="text/javascript">
        $(document).ready(function () {
            load_du_lieu();
            function load_du_lieu() {
                $.ajax({
                    url: "quanly-phancong.php",
                    method: "POST",
                    success: function (data) {
                        $('#gv_mon_table').html(data);
                    }
                });
            }
            load_du_lieu();

            //Them du lieu
            $('#button_them').on('click', function () {
                var mamon = $('#mamon').val();
                var magv = $('#magv').val();
                var ghichu = $('#ghichu').val();
                if ( mamon == 'Chọn môn học'  || magv == 'Chọn giáo viên'  || ghichu == '') {
                    alert('Vui lòng nhập đầy đủ dữ liệu');
                } else {
                    $.ajax({
                        url: "quanly-phancong.php",
                        method: "POST",
                        data: {
                           mamon:mamon,
                            magv:magv,
                            ghichu:ghichu
                        },
                        success: function (data) {
                            alert("Thêm dữ liệu thành công!");
                            $('#gv_mon_diem')[0].reset();
                            load_du_lieu();
                        }
                    });
                }
            });

            load_du_lieu();
            //xoa du lieu
            $(document).on('click', '.del', function () {
                var newID = $(this).attr("id");
                if (confirm('Bạn muốn bỏ phân công giáo viên này ?')) {
                    $.ajax({
                        url: "quanly-phancong.php",
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
