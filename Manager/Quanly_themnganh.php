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
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style1.css" rel="stylesheet">
        <link href="../css/style2.css" rel="stylesheet">
        <link href="../css/style3.css" rel="stylesheet">
        <link href="../css/style4.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
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


        <div class="container" style="margin-left: 220px">
                <div class="col-md-12">
                    <center><h3 style="margin-top: 70px">Quản Lý Môn học</h3></center>
                    <form method="POST" id="insert_monhoc" style="width: 500px; margin-left: 250px">
                        <label style="margin-top: 20px">Tên môn học</label>
                        <input type="text" class="form-control" id="tenmon1" placeholder="Điền tên môn học" style="margin-left: 120px">
                        <br>
                        <label>Chọn ngành</label>
                        <select class="form-control" id="nganh1" name="tennganh1" style="margin-left: 120px">
                            <option value="">Chọn ngành học</option>
                            <?php echo fill_nganhhoc($conn); ?>
                        </select>
                        <br>
                        <center><input type="button" name="insert_data" id="button_them" value="Thêm" class="btn btn-success" style="margin-left: 50px"></center>
                        <br>
                    </form>
                    <div class="table-responsive" id="mon_table">
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

                        <form method="POST" id="edit_mon">
                            <div class="form-group">
                                <label>Tên môn</label>
                                <input type="text" class="form-control" id="tenmon" name="tenmon" >
                            </div>
                            <br>
                            <div class="form-group">
                                <select class="form-control" id="nganh" name="nganh">
                                    <label>Chọn ngành</label>
                                    <option value="">Chọn ngành học</option>
                                    <?php echo fill_nganhhoc($conn); ?>
                                </select>
                            </div>
                            <br>
                            <input type="hidden" name="mamon" id="mamon">
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
                        url:"quanly-monhoc.php",
                        method:"POST",
                        success:function (data) {
                            $('#mon_table').html(data);
                        }
                    });
                }

                $(document).on('click','.edit',function () {
                    var mamon = $(this).attr("id");
                    $.ajax({
                        url:"edit.php",
                        method: "POST",
                        data:{mamon:mamon},
                        dataType:"json",
                        success:function(data) {
                            $('#mamon').val(data.mamon);
                            $('#tenmon').val(data.tenmon);
                            $('#nganh').val(data.nganh);
                            $('#edit_modal').modal('show');
                        }
                    });
                });
                load_du_lieu();
                $('#edit_mon').on('submit',function (event) {
                    event.preventDefault();
                    if($('#tenmon').val()=='' ){
                        alert("Vui lòng nhập đủ thông tin !");
                    }else if($('#nganh').val() == 'Chọn ngành học'){
                        alert("Vui lòng nhập đủ thông tin!");
                    }
                    else {
                        $.ajax({
                            url:"update.php",
                            method:"POST",
                            data:$('#edit_mon').serialize(),
                            success:function(data){
                                $('#edit_mon')[0].reset();
                                $('#edit_mon').modal('hide');
                                $('#mon_table').html(data);
                                load_du_lieu();
                            }
                        });
                    }
                });
                load_du_lieu();


                        //Them du lieu
                $('#button_them').on('click',function () {
                    var tenmon = $('#tenmon1').val();
                    var nganh = $('#nganh1').val();
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
            });
        </script>
    </body>
</html>


