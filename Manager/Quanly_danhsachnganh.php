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
                <form method="POST" id="insert_nganh">

                    <label>Tên ngành</label>
                    <input type="text" class="form-control" id="tennganh" placeholder="Điền tên ngành">
                    <br>
                    <label>Mô tả</label>
                    <input type="text" class="form-control" id="mota" placeholder="Mô tả chung cho ngành">
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
                        url:"quanly-nganh.php",
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
                        url:"quanly-nganh.php",
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
                        url: "quanly-nganh.php",
                        method: "POST",
                        data: {id: id, text: text, column_name},
                        success: function (data) {

                            alert("Sửa dữ liệu thành công!");
                            fetch_item_data();
                        }
                    });
                }

                $(document).on('blur', '.tennganh', function () {
                    var id = $(this).data('id_ten');
                    var text = $(this).text();
                    edit_data(id, text, "tennganh");

                });
                $(document).on('blur', '.mota', function () {
                    var id = $(this).data('id_mt');
                    var text = $(this).text();
                    edit_data(id, text, "mota");

                });

                //Them du lieu
                $('#button_them').on('click',function () {
                    var tennganh = $('#tennganh').val();
                    var mota = $('#mota').val();
                    if(tennganh == '' || mota == '' )
                    {
                        alert('Vui lòng nhập đầy đủ dữ liệu');
                    }
                    else {
                        $.ajax({
                            url:"quanly-nganh.php",
                            method: "POST",
                            data:{tennganh:tennganh,mota:mota},
                            success:function(data) {

                                alert("Thêm dữ liệu thành công!");

                                $('#insert_nganh')[0].reset();
                                fetch_item_data();
                            }
                        });
                    }
                });




            });

        </script>
    </body>
</html>

