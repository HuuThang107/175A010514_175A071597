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

            <br /><br />
            <div class="container">
                <br />
                <h2 align="center">Thêm dữ liệu</h2>
                <br />
                <div class="table-responsive">
                    <table class="table table-bordered" id="crud_table">
                        <tr>
                            <th width="30%">Tên Giáo Viên</th>
                            <th width="20%">Địa Chỉ</th>
                            <th width="45%">Số Điện Thoại</th>
                            <th width="5%"></th>
                        </tr>
                        <tr>
                            <td contenteditable="true" class="tengv"></td>
                            <td contenteditable="true" class="diachi"></td>
                            <td contenteditable="true" class="sdt"></td>
                            <td></td>
                        </tr>

                    </table>

                    <div align="center">
                        <button type="button" name="save" id="save" class="btn btn-info">Lưu</button>
                    </div>
                    <br />
                    <div id="inserted_item_data"></div>

                </div>

            </div>
        </div>
    </body>
</html>

<script>
    $(document).ready(function(){
        $('#save').click(function(){
            var tengv = [];
            var diachi = [];
            var sdt = [];
            $('.tengv').each(function(){
                tengv.push($(this).text());
            });
            $('.diachi').each(function(){
                diachi.push($(this).text());
            });
            $('.sdt').each(function(){
                sdt.push($(this).text());
            });

            $.ajax({
                url:"Quanly-Them.php",
                method:"POST",
                data:{tengv:tengv, diachi:diachi, sdt:sdt},
                success:function(data){
                    alert(data);
                    $("td[contentEditable='true']").text("");

                    fetch_item_data();
                }
            });
        });

        function fetch_item_data()
        {
            $.ajax({
                url:"Quanly-load.php",
                method:"POST",
                success:function(data)
                {
                    $('#inserted_item_data').html(data);
                }
            })
        }
        fetch_item_data();

    });
</script>
