<?php
require_once ("../includes/connection.php");
$query = "SELECT * FROM nganhhoc ORDER BY manganh DESC";
$result = mysqli_query($conn, $query);
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
                        <option>----------Chọn ngành----------</option>
                        <?php
                        while($row_nganh=mysqli_fetch_array($result)){
                            echo '<option value="'.$row_nganh['manganh'].'">'.$row_nganh['tennganh'].'</option>';
                        }
                        ?>
                    <br>
                    <center><input type="button" name="insert_data" id="button_them" value="Thêm" class="btn btn-success"></center>
                </form>
                <div id="load_dulieu">
                </div>

            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                //Load du lieu
                function fetch_item_data()
                {
                    $.ajax({
                        url:"quanly-monhoc.php",
                        method:"POST",
                        success:function(data)
                        {
                            $('#load_dulieu').html(data);
                        }
                    });
                }
                fetch_item_data();

                // Xoa du lieu
                $(document).on('click','.del_data',function () {
                    var newID = $(this).data('id_del');
                    $.ajax({
                        url:"quanly-monhoc.php",
                        method: "POST",
                        data:{newID:newID},
                        success:function(data) {
                            alert("Xóa dữ liệu thành công!");
                            fetch_item_data();
                        }
                    });

                });

                //Sua du lieu

                function edit_data(id,text,column_name) {
                    $.ajax({
                        url: "quanly-monhoc.php",
                        method: "POST",
                        data: {id: id, text: text, column_name},
                        success: function (data) {

                            alert("Sửa dữ liệu thành công!");
                            fetch_item_data();
                        }
                    });
                }

                $(document).on('blur', '.tenmon', function () {
                    var id = $(this).data('id_ten');
                    var text = $(this).text();
                    edit_data(id, text, "tenmon");

                });
                $(document).on('blur', '.nganh', function () {
                    var id = $(this).data('id_nganh');
                    var text = $(this).text();
                    edit_data(id, text, "nganh");

                });

                //Them du lieu
                $('#button_them').on('click',function () {
                    var tenmon = $('#tenmon').val();
                    var nganh = $('#nganh').val();
                    if(tenmon == '' || nganh == '' || nganh =='----------Chọn ngành----------')
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
                                fetch_item_data();
                            }
                        });
                    }
                });
            });
        </script>


    </body>
</html>
