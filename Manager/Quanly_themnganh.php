<?php
require_once ("../includes/connection.php");
function fill_nganhhoc($conn)
{
    $output = '';
    $sql = "SELECT * FROM nganhhoc";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $output .= '<option value="'.$row["manganh"].'">'.$row["tennganh"].'</option>';
    }
    return $output;
}


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <meta charset="utf-8">
        <title>Quản lý</title>


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
                                        <a href="Quanly_danhsachnganh.php"><i class="fa fa-list"></i> Quản lý ngành học</a>
                                    </li>
                                    <li>
                                        <a href="Quanly_themnganh.php"><i class="fa fa-plus-square"></i> Quản lý môn học</a>
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
                                <a href="#" class="active"><i class="fa fa-sign-out"></i>    Đăng xuất</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>

            <div class="container">
                <div class="col-md-12">
                    <center><h3>Quản Lý Dữ Liệu</h3></center>
                    <form method="POST" id="insert_monhoc">

                        <label>Tên môn học</label>
                        <input type="text" class="form-control" id="tenmon" placeholder="Điền tên môn học">
                        <br>
                        <label>Chọn ngành</label>
                        <select class="form-control" id="nganh" name="tennganh">
                            <option value="">Chọn ngành học</option>
                            <?php echo fill_nganhhoc($conn); ?>
                        </select>
                        <br>
                        <center><input type="button" name="insert_data" id="button_them" value="Thêm" class="btn btn-success"></center>
                        <br>
                    </form>
                    <div class="table-responsive" id="mon_table">
                    </div>
                </div>
            </div>

        <script type="text/javascript">
            $(document).ready(function () {
                load_du_lieu();
                function load_du_lieu() {
                    $.ajax({
                        url:"quanly-monhoc.php",
                        method:"POST",
                        success:function (data) {
                            $('#mon_table').html(data);
                        }
                    });
                }


                        //Them du lieu
                $('#button_them').on('click',function () {
                    var tenmon = $('#tenmon').val();
                    var nganh = $('#nganh').val();
                    if(tenmon == '' || nganh =='Chọn ngành học')
                    {
                        alert('Vui lòng nhập đầy đủ dữ liệu');
                    }
                    else {
                        $.ajax({
                            url:"quanly-monhoc.php",
                            method: "POST",
                            data:{tenmon:tenmon,nganh:nganh},
                            success:function(data) {
                                alert("Thêm dữ liệu thành công!");
                                $('#insert_monhoc')[0].reset();
                                load_du_lieu();
                            }
                        });
                    }
                });
                load_du_lieu();
                //xoa du lieu
                $(document).on('click','.del',function () {
                    var newID = $(this).attr("id");
                    if(confirm('Bạn muốn bay màu môn này ?')){
                        $.ajax({
                            url:"quanly-monhoc.php",
                            method: "POST",
                            data:{newID:newID},
                            success:function(data) {
                                load_du_lieu();
                            }
                        });
                    }
                });
                //sua du lieu

            });
        </script>
            <link href="../css/bootstrap.min.css" rel="stylesheet">
            <link href="../css/style1.css" rel="stylesheet">
            <link href="../css/style2.css" rel="stylesheet">
            <link href="../css/style3.css" rel="stylesheet">
            <link href="../css/style4.css" rel="stylesheet">
            <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </body>
</html>


