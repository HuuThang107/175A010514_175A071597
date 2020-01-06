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


        </div>
        <div class="container">
            <div class="col-md-12">
                <center><h3>Quản Lý Dữ Liệu</h3></center>
                <form method="POST" id="insert_taikhoan">

                    <label>Tên tài khoản</label>
                    <input type="text" class="form-control" id="tentk" placeholder="Tên tài khoản">
                    <br>
                    <label>Mật khẩu</label>
                    <input type="text" class="form-control" id="matkhau" placeholder="Mật khẩu">
                    <br>
                    <label>Quyền</label>
                    <input type="text" class="form-control" id="cap" placeholder="Quyền">
                    <br>
                    <label>Tên người dùng</label>
                    <input type="text" class="form-control" id="tennguoidung" placeholder="Tên người dùng">
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
                        url:"quantri-taikhoan.php",
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
                        url:"quantri-taikhoan.php",
                        method: "POST",
                        data:{newID:newID},
                        success:function(data) {
                            fetch_item_data();
                        }
                    });

                });

                //Sua du lieu

                function edit_data(id,text,column_name) {
                    $.ajax({
                        url: "quantri-taikhoan.php",
                        method: "POST",
                        data: {id: id, text: text, column_name},
                        success: function (data) {

                            alert("Sửa dữ liệu thành công!");
                            fetch_item_data();
                        }
                    });
                }

                $(document).on('blur', '.tentk', function () {
                    var id = $(this).data('id_ten');
                    var text = $(this).text();
                    edit_data(id, text, "tentk");

                });
                $(document).on('blur', '.matkhau', function () {
                    var id = $(this).data('id_mk');
                    var text = $(this).text();
                    edit_data(id, text, "matkhau");

                });
                $(document).on('blur', '.cap', function () {
                    var id = $(this).data('id_lv');
                    var text = $(this).text();
                    edit_data(id, text, "cap");

                });
                $(document).on('blur', '.tennguoidung', function () {
                    var id = $(this).data('id_tennd');
                    var text = $(this).text();
                    edit_data(id, text, "tennguoidung");

                });

                //Them du lieu
                $('#button_them').on('click',function () {
                    var tentk = $('#tentk').val();
                    var matkhau = $('#matkhau').val();
                    var level = $('#cap').val();
                    var tennguoidung = $('#tennguoidung').val();
                    if(tentk == '' || matkhau == '' || level =='' || tennguoidung == '' || level >3 || level ==0 )
                    {
                        alert('Vui lòng nhập đầy đủ và đúng dữ liệu');
                    }
                    else {
                        $.ajax({
                            url:"quantri-taikhoan.php",
                            method: "POST",
                            data:{tentk:tentk,matkhau:matkhau,level:level,tennguoidung:tennguoidung},
                            success:function(data) {

                                alert("Thêm dữ liệu thành công!");

                                $('#insert_taikhoan')[0].reset();
                                fetch_item_data();
                            }
                        });
                    }
                });




            });

        </script>
    </body>
</html>
