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
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                                        <a href="Quanly_themlop.php"><i class="fa fa-list"></i> Quản lý lớp học</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-user"></i> Giảng viên</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="Quanly_nhapgiangvien.php"><i class="fa fa-list"></i> Quản lý giảng viên</a>
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
        <div class="container" style="margin-left: 220px ">
            <div class="col-md-12">
                <center><h3 style="margin-top: 70px">Quản Lý Lớp học</h3></center>
                <form method="POST" id="insert_lophocphan" style="width: 500px; margin-left: 200px">
                    <label style="margin-top: 20px">Tên lớp học phần</label>
                    <input type="text" class="form-control" id="tenlophocphan1" placeholder="Điền tên lớp học phần" style="margin-left: 120px">
                    <br>
                    <label>Chọn môn</label>
                    <select class="form-control" id="mamon1" name="mamon1" style="margin-left: 120px">
                        <option value="">Chọn môn học</option>
                        <?php echo fill_monhoc($conn); ?>
                    </select>
                    <br>
                    <label>Chọn giáo viên</label>
                    <select class="form-control" id="magv1" name="magv1" style="margin-left: 120px">
                    </select>
                    <br>
                    <label>Năm học</label>
                    <input type="text" class="form-control" id="namhoc1" placeholder="Năm học" style="margin-left: 120px">
                    <br>
                    <label>Học kì</label>
                    <input type="text" class="form-control" id="hocki1" placeholder="Học kì" style="margin-left: 120px">
                    <br>
                    <label>Giai đoạn</label>
                    <input type="text" class="form-control" id="giaidoan1" placeholder="Giai đoạn" style="margin-left: 120px">
                    <br>
                    <center><input type="button" name="insert_data" id="button_them" value="Thêm" class="btn btn-success" style="margin-left: 120px"></center>
                    <br>
                </form>
                <br>
                <div class="table-responsive" id="lophocphan_table">
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit_modal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cập nhật</h4>
                    </div>
                    <div class="modal-body">

                        <form method="POST" id="edit_lophocphan">
                            <div class="form-group">
                                <label>Tên lớp học phần</label>
                                <input type="text" class="form-control" id="tenlophocphan" name="tenlophocphan" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Chọn môn</label>
                                <select class="form-control" id="mamon" name="mamon">
                                    <option value="">Chọn môn học</option>
                                    <?php echo fill_monhoc($conn); ?>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Chọn giáo viên</label>
                                <select class="form-control" id="magv" name="magv" >
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Năm học</label>
                                <input type="text" class="form-control" id="namhoc" name="namhoc" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Học kì</label>
                                <input type="text" class="form-control" id="hocki" name="hocki" >
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Giai đoạn</label>
                                <input type="text" class="form-control" id="giaidoan" name="giaidoan" >
                            </div>
                            <br>
                            <input type="hidden" name="malophocphan" id="malophocphan">
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
        <script type="text/javascript">
            $(document).ready(function () {
                $('#mamon1').change(function () {
                    var mamon1 = $(this).val();
                    $.ajax({
                        url: "quanly-lophocphan.php",
                        method: "POST",
                        data:{mamon1:mamon1},
                        success: function (data) {
                            $('#magv1').html(data);
                        }
                    });

                });
            });
            $(document).ready(function () {
                $('#mamon').change(function () {
                    var mamon = $(this).val();
                    $.ajax({
                        url: "quanly-lophocphan.php",
                        method: "POST",
                        data:{mamon:mamon},
                        success: function (data) {
                            $('#magv').html(data);
                        }
                    });

                });

            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                load_du_lieu();
                function load_du_lieu() {
                    $.ajax({
                        url: "quanly-lophocphan.php",
                        method: "POST",
                        success: function (data) {
                            $('#lophocphan_table').html(data);
                        }
                    });
                }
                load_du_lieu();

                $(document).on('click','.edit',function () {
                    var malophocphan = $(this).attr("id");
                    $.ajax({
                        url:"edit.php",
                        method: "POST",
                        data:{malophocphan:malophocphan},
                        dataType:"json",
                        success:function(data) {
                            $('#malophocphan').val(data.malophocphan);
                            $('#tenlophocphan').val(data.tenlophocphan);
                            $('#mamon').val(data.mamon);
                            $('#magv').val(data.magv);
                            $('#namhoc').val(data.namhoc);
                            $('#hocki').val(data.hocki);
                            $('#giaidoan').val(data.giaidoan);
                            $('#edit_modal').modal('show');
                        }
                    });
                });
                load_du_lieu();
                $('#edit_lophocphan').on('submit',function (event) {
                    event.preventDefault();
                    if($('#tenlophocphan').val()=='' ){
                        alert("Vui lòng nhập đủ thông tin !");
                    }else if($('#mamon').val() == 'Chọn môn học'){
                        alert("Vui lòng nhập đủ thông tin!");
                    }
                    else if($('#magv').val() == 'Chọn giáo viên'){
                        alert("Vui lòng nhập đủ thông tin!");
                    }
                    else if($('#namhoc').val() == ''){
                        alert("Vui lòng nhập đủ thông tin!");
                    }
                    else if($('#hocki').val() == ''){
                        alert("Vui lòng nhập đủ thông tin!");
                    }
                    else if($('#giaidoan').val() == ''){
                        alert("Vui lòng nhập đủ thông tin!");
                    }
                    else {
                        $.ajax({
                            url:"update.php",
                            method:"POST",
                            data:$('#edit_lophocphan').serialize(),
                            success:function(data){
                                $('#edit_lophocphan')[0].reset();
                                $('#edit_lophocphan').modal('hide');
                                $('#lophocphan_table').html(data);
                                load_du_lieu();
                            }
                        });
                    }
                });
                load_du_lieu();

                //Them du lieu
                $('#button_them').on('click', function () {
                    var tenlophocphan = $('#tenlophocphan1').val();
                    var mamon = $('#mamon1').val();
                    var magv = $('#magv1').val();
                    var namhoc = $('#namhoc1').val();
                    var hocki = $('#hocki1').val();
                    var giaidoan = $('#giaidoan1').val();
                    if (tenlophocphan == ''  || mamon == '----------Chọn môn----------' || magv == '----------Chọn giáo viên----------' || namhoc == '' || hocki == '' || giaidoan == '') {
                        alert('Vui lòng nhập đầy đủ dữ liệu');
                    } else {
                        $.ajax({
                            url: "quanly-lophocphan.php",
                            method: "POST",
                            data: {
                                tenlophocphan: tenlophocphan,
                                mamon: mamon,
                                magv: magv,
                                namhoc: namhoc,
                                hocki: hocki,
                                giaidoan: giaidoan
                            },
                            success: function (data) {
                                alert("Thêm dữ liệu thành công!");
                                $('#insert_lophocphan')[0].reset();
                                load_du_lieu();
                            }
                        });
                    }
                });
                load_du_lieu();
                //xoa du lieu
                $(document).on('click', '.del', function () {
                    var newID = $(this).attr("id");
                    if (confirm('Bạn muốn bay màu môn này ?')) {
                        $.ajax({
                            url: "quanly-lophocphan.php",
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
