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
                                        <a href="Quantri_danhsachquantri.php"><i class="fa fa-list"></i> Quản lý quản trị viên</a>
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
            <div class="container" style="margin-left: 220px">
                <div class="col-md-12">
                    <center><h3 style="margin-top: 70px">Quản Lý Quản trị viên</h3></center>
                    <form method="POST" id="insert_nganhhoc" style="width: 500px; margin-left: 200px">

                        <label style="margin-top: 20px">Tên tài khoản</label>
                        <input type="text" class="form-control" id="tentk1" placeholder="Tên tài khoản" style="margin-left: 120px">
                        <br>
                        <label>Mật khẩu</label>
                        <input type="text" class="form-control" id="matkhau1" placeholder="Mật khẩu" style="margin-left: 120px">
                        <br>
                        <label>Quyền</label>
                        <input type="text" class="form-control" id="cap1" placeholder="" style="margin-left: 120px">
                        <br>
                        <label>Email</label>
                        <input type="text" class="form-control" id="email1" placeholder="Điền email" style="margin-left: 120px">
                        <br>
                        <center style="margin-left: 120px"><input type="button" name="insert_data" id="button_them" value="Thêm" class="btn btn-success"></center>
                    </form>
                    <br>
                    <div class="table-responsive" id="tk_table">
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
                            <h4 class="modal-title" >Cập nhật</h4>
                        </div>
                        <div class="modal-body">

                            <form method="POST" id="edit_tk">
                                <div class="form-group">
                                    <label>Tên tài khoản</label>
                                    <input type="text" class="form-control" id="tentk" name="tentk" >
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="text" class="form-control" id="matkhau" name="matkhau" >
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <input type="text" class="form-control" id="cap" name="cap" >
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="email" name="email" >
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
            <script type="text/javascript">
                $(document).ready(function () {
                    load_du_lieu();
                    function load_du_lieu() {
                        $.ajax({
                            url:"quantri-taikhoan.php",
                            method:"POST",
                            success:function (data) {
                                $('#tk_table').html(data);
                                load_du_lieu();
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
                                $('#tentk').val(data.tentk);
                                $('#matkhau').val(data.matkhau);
                                $('#cap').val(data.cap);
                                $('#email').val(data.email);
                                $('#edit_modal').modal('show');
                            }
                        });
                    });
                    load_du_lieu();
                    $('#edit_tk').on('submit',function (event) {
                        event.preventDefault();
                        if($('#tentk').val()=='' ){
                            alert("Vui lòng nhập đủ thông tin !");
                        }else if($('#matkhau').val()==''){
                            alert("Vui lòng nhập đủ thông tin !");
                        }
                        else if($('#cap').val()=='' || $('#cap').val() >3 ||$('#cap').val() <1){
                            alert("Vui lòng nhập đủ thông tin !");
                        }
                        else if($('#email').val()==''){
                            alert("Vui lòng nhập đủ thông tin !");
                        }
                        else {
                            $.ajax({
                                url:"update.php",
                                method:"POST",
                                data:$('#edit_tk').serialize(),
                                success:function(data){
                                    $('#edit_tk')[0].reset();
                                    $('#edit_tk').modal('hide');
                                    $('#tk_table').html(data);
                                    load_du_lieu();
                                }
                            });
                        }
                    });
                    load_du_lieu();


                    //Them du lieu
                    $('#button_them').on('click',function () {
                        var tentk = $('#tentk1').val();
                        var matkhau = $('#matkhau1').val();
                        var cap = $('#cap1').val();
                        var email = $('#email1').val();
                        if(tentk == '' || matkhau == '' || cap == '' || email == ''||cap <1 ||cap >3)
                        {
                            alert('Vui lòng nhập đầy đủ dữ liệu');
                        }
                        else {
                            $.ajax({
                                url:"quantri-taikhoan.php",
                                method: "POST",
                                data:{tentk:tentk,matkhau:matkhau,cap:cap,email:email},
                                success:function(data) {
                                    alert("Thêm dữ liệu thành công!");
                                    $('#insert_tk')[0].reset();
                                    load_du_lieu();
                                }
                            });
                        }
                    });
                    load_du_lieu();
                    //xoa du lieu
                    $(document).on('click','.del',function () {
                        var newID = $(this).attr("id");
                        if(confirm('Bạn muốn bay màu ngành này ?')){
                            $.ajax({
                                url:"quantri-taikhoan.php",
                                method: "POST",
                                data:{newID:newID},
                                success:function(data) {
                                    load_du_lieu();

                                }
                            });
                        }
                    });
                    load_du_lieu();
                });
            </script>
        </div>
    </body>
</html>
