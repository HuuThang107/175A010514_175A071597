
<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Giảng viên</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
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
                                        <a href="Giangvien_nhap.php"><i class="fa fa-plus-square"></i> Quản lý sinh viên</a>
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

        <div class="container" style="margin-left: 220px">
            <div class="col-md-12">
                <center><h3 style="margin-top: 70px">Quản Lý Sinh Viên</h3></center>
                <form method="POST" id="insert_sinhvien" style="width: 500px; margin-left: 200px">
                    <br>
                    <label>Tên sinh viên</label>
                    <input type="text" class="form-control" id="tensv1" placeholder="Tên sinh viên" style="margin-left: 120px">
                    <br>
                    <label>Chứng minh thư</label>
                    <input type="text" class="form-control" id="cmt1" placeholder="Chứng minh thư" style="margin-left: 120px">
                    <br>
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" id="diachi1" placeholder="Địa Chỉ" style="margin-left: 120px">
                    <br>
                    <label>Lớp</label>
                    <input type="text" class="form-control" id="lop1" placeholder="Lớp" style="margin-left: 120px">
                    <br>
                    <center><input type="button" name="insert_data" id="button_them" value="Thêm" class="btn btn-success" style="margin-left: 100px"></center>
                    <br>
                </form>
                <br>
                <div class="table-responsive" id="sinhvien_table">
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

                            <form method="POST" id="edit_sv">
                                <div class="form-group">
                                    <label>Tên sinh viên</label>
                                    <input type="text" class="form-control" id="tensv" name="tensv" >
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Chứng minh thư</label>
                                    <input type="text" class="form-control" id="cmt" name="cmt" >
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" id="diachi" name="diachi" >
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Lớp</label>
                                    <input type="text" class="form-control" id="lop" name="lop" >
                                </div>
                                <br>
                                <input type="hidden" name="masv" id="masv">
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

                $(document).on('click','.edit',function () {
                    var masv = $(this).attr("id");
                    $.ajax({
                        url:"edit.php",
                        method: "POST",
                        data:{masv:masv},
                        dataType:"json",
                        success:function(data) {
                            $('#masv').val(data.masv);
                            $('#tensv').val(data.tensv);
                            $('#cmt').val(data.cmt);
                            $('#diachi').val(data.diachi);
                            $('#lop').val(data.lop);
                            $('#edit_modal').modal('show');
                        }
                    });
                });

                load_du_lieu();
                $('#edit_sv').on('submit',function (event) {
                    event.preventDefault();
                    if($('#tensv').val()=='' ){
                        alert("Vui lòng nhập đủ thông tin !");
                    }else if($('#cmt').val() == ''){
                        alert("Vui lòng nhập đủ thông tin!");
                    }
                    else if($('#diachi').val() == ''){
                        alert("Vui lòng nhập đủ thông tin!");
                    }
                    else if($('#lop').val() == ''){
                        alert("Vui lòng nhập đủ thông tin!");
                    }
                    else {
                        $.ajax({
                            url:"update.php",
                            method:"POST",
                            data:$('#edit_sv').serialize(),
                            success:function(data){
                                $('#edit_sv')[0].reset();
                                $('#edit_sv').modal('hide');
                                $('#sinhvien_table').html(data);
                                load_du_lieu();
                            }
                        });
                    }
                });
                load_du_lieu();

                //Them du lieu
                $('#button_them').on('click', function () {
                    var tensv = $('#tensv1').val();
                    var cmt = $('#cmt1').val();
                    var diachi = $('#diachi1').val();
                    var lop = $('#lop1').val();
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
