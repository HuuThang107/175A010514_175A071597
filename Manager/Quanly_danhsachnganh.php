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


        <div class="container" style="margin-left: 220px ">
            <div class="col-md-12">
                <center><h3>Quản Lý Dữ Liệu</h3></center>
                <form method="POST" id="insert_nganhhoc">

                    <label>Tên ngành</label>
                    <input type="text" class="form-control" id="tennganh" placeholder="Điền tên ngành">
                    <br>
                    <label>Mô tả</label>
                    <input type="text" class="form-control" id="mota" placeholder="Mô tả chung cho ngành">
                    <br>
                    <center><input type="button" name="insert_data" id="button_them" value="Thêm" class="btn btn-success"></center>
                </form>
                <br>
                <div class="table-responsive" id="nganh_table">
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
                            <form method="POST" id="edit_nganh">
                            <div class="form-group">
                                <label>Tên ngành</label>
                                <input type="text" class="form-control" id="tennganh" name="tennganh" >
                            </div>
                                <br>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input type="text" class="form-control" id="mota" name="mota" >
                            </div>
                                <br>
                                <input type="hidden" name="manganh" id="manganh">
                                <input type="submit" name="submit" class="btn btn-info" value="Cập Nhật">
                                <br>
                            </form>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>

            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    load_du_lieu();
                    function load_du_lieu() {
                        $.ajax({
                            url:"quanly-nganh.php",
                            method:"POST",
                            success:function (data) {
                                $('#nganh_table').html(data);
                            }
                        });
                    }
                    load_du_lieu();
                    $(document).on('click','.edit',function () {
                        var manganh = $(this).attr("id");
                        $.ajax({
                            url:"edit-nganh.php",
                            method: "POST",
                            data:{manganh:manganh},
                            dataType:"json",
                            success:function(data) {
                                $('#tennganh').val(data.tennganh);
                                $('#mota').val(data.mota);
                                $('#manganh').val(data.manganh)
                                $('#edit_modal').modal('show');
                            }
                        });
                    });
                    load_du_lieu();
                    $('#edit_nganh').on('submit',function (event) {
                        event.preventDefault();
                        if($('#tennganh').val()=='' ){
                            alert("Vui lòng nhập đủ thông tin !");
                        }else if($('#mota').val()==''){
                            alert("Vui lòng nhập đầy đủ thông tin!")
                        }
                        else {
                            $.ajax({
                                url:"update-nganh.php",
                                method:"POST",
                                data:$('#edit_nganh').serialize(),
                                success:function(data){
                                    $('#edit_nganh')[0].reset();
                                    $('#edit_nganh').modal('hide');
                                    $('#nganh_table').html(data);
                                    load_du_lieu();
                                }
                            });
                        }

                    });
                    load_du_lieu();


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
                                    $('#insert_nganhhoc')[0].reset();
                                    load_du_lieu();
                                }
                            });
                        }
                    });
                    load_du_lieu();
                    //xoa du lieu
                    $(document).on('click','.del',function () {
                        var newID = $(this).attr("id");
                        if(confirm('Bạn muốn bay màu nganh này ?')){
                            $.ajax({
                                url:"quanly-nganh.php",
                                method: "POST",
                                data:{newID:newID},
                                success:function(data) {
                                    load_du_lieu();

                                }
                            });
                        }
                    });
                });
            </script>
    </body>
</html>






