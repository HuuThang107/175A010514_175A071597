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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Quản lý sinh viên</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="Giangvien_nhap.php"><i class="fa fa-plus-square"></i> Danh sách sinh viên</a>
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
        </div>
        </div>
        <div class="container"  style="margin-left: 220px">
            <div class="col-md-12">
                <center><h3 style="margin-top: 70px">Thiết lập đầu điểm</h3></center>
                <form method="POST" id="insert_diem" style="width: 500px; margin-left: 250px">
                    <label style="margin-top: 20px">Nhập trọng số điểm thi cuối kì</label>
                    <input type="text" class="form-control" id="trongso1" placeholder="Nhập trọng số dạng số thập phân" style="margin-left: 120px">
                    <br>
                    <label>Chọn lớp</label>
                    <select class="form-control" id="malophocphan1" name="malophocphan1" style="margin-left: 120px">
                        <option value="">Chọn lớp học</option>
                        <?php echo fill_lophoc($conn); ?>
                    </select>
                    <br>
                    <label>Chọn sinh viên</label>
                    <select class="form-control" id="masv1" name="masv1"style="margin-left: 120px">
                        <option value="">Chọn sinh viên</option>
                        <?php echo fill_sinhvien($conn); ?>
                    </select>
                    <br>
                    <label>Điểm chuyên cần</label>
                    <input type="text" class="form-control" id="dcc1" placeholder="Điểm chuyên cần"style="margin-left: 120px">
                    <br>
                    <label>Điểm giữa kì</label>
                    <input type="text" class="form-control" id="dgk1" placeholder="Điểm giữa kì"style="margin-left: 120px">
                    <br>
                    <label>Điểm bài tập</label>
                    <input type="text" class="form-control" id="dbt1" placeholder="Điểm bài tập"style="margin-left: 120px">
                    <br>
                    <label>Điểm thực hành</label>
                    <input type="text" class="form-control" id="dth1" placeholder="Điểm thực hành"style="margin-left: 120px">
                    <br>
                    <label>Điểm Thi</label>
                    <input type="text" class="form-control" id="diemthi1" placeholder="Điểm thi hết môn"style="margin-left: 120px">
                    <br>
                    <center><input type="button" name="insert_data" id="button_them" value="Thêm" class="btn btn-success" style="margin-left: 50px"></center>
                    <br>

                </form>
                <br>
                <div class="table-responsive" id="diem_table">
                </div>
            </div>
        </div>

        <!-- Modal  edit-->
        <div class="modal fade" id="edit_modal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cập nhật</h4>
                    </div>
                    <div class="modal-body">

                        <form method="POST" id="edit_diem">

                            <div class="form-group">
                                <label>Trọng số điểm cuối kì</label>
                                <input type="text" class="form-control" id="trongso" name="trongso" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Điểm chuyền cần</label>
                                <input type="text" class="form-control" id="dcc" name="dcc" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Điểm giữa kì</label>
                                <input type="text" class="form-control" id="dgk" name="dgk" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Điểm bài tập</label>
                                <input type="text" class="form-control" id="dbt" name="dbt" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Điểm thực hành</label>
                                <input type="text" class="form-control" id="dth" name="dth" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Điểm thi</label>
                                <input type="text" class="form-control" id="diemthi" name="diemthi" >
                            </div>
                            <br>
                            <input type="hidden" name="id" id="id">
                            <input type="submit" name="submit" class="btn btn-info" value="Cập Nhật">
                            <br>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    </div>
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

            $(document).on('click','.edit',function () {
                var id = $(this).attr("id");
                $.ajax({
                    url:"edit.php",
                    method: "POST",
                    data:{id:id},
                    dataType:"json",
                    success:function(data) {
                        $('#id').val(data.id);
                        $('#trongso').val(data.trongso);
                        $('#dcc').val(data.dcc);
                        $('#dgk').val(data.dgk);
                        $('#dbt').val(data.dbt);
                        $('#dth').val(data.dth);
                        $('#diemthi').val(data.diemthi);
                        $('#edit_modal').modal('show');
                    }
                });
            });
            load_du_lieu();
            $('#edit_diem').on('submit',function (event) {
                event.preventDefault();
                if($('#trongso').val()=='' ){
                    alert("Vui lòng nhập đủ thông tin !");
                }else if($('#dcc').val() == ''){
                    alert("Vui lòng nhập đủ thông tin!");
                }
                else if($('#dgk').val() == ''){
                    alert("Vui lòng nhập đủ thông tin!");
                }
                else if($('#dbt').val() == ''){
                    alert("Vui lòng nhập đủ thông tin!");
                }
                else if($('#dth').val() == ''){
                    alert("Vui lòng nhập đủ thông tin!");
                }
                else if($('#diemthi').val() == ''){
                    alert("Vui lòng nhập đủ thông tin!");
                }
                else {
                    $.ajax({
                        url:"update.php",
                        method:"POST",
                        data:$('#edit_diem').serialize(),
                        success:function(data){
                            $('#edit_diem')[0].reset();
                            $('#edit_diem').modal('hide');
                            $('#diem_table').html(data);
                            load_du_lieu();
                        }
                    });
                }
            });
            load_du_lieu();

            //Them du lieu
            $('#button_them').on('click', function () {
                var malophocphan = $('#malophocphan1').val();
                var masv = $('#masv1').val();
                var trongso = $('#trongso1').val();
                var dcc = $('#dcc1').val();
                var dgk = $('#dgk1').val();
                var dbt = $('#dbt1').val();
                var dth = $('#dth1').val();
                var diemthi = $('#diemthi1').val();
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
