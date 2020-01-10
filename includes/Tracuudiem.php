
<?php
require_once ("../includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang chủ</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../font/css/all.css">
	<link rel="stylesheet" href="../css/Trangchu.css">
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<header>
			<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #36deff";>
			  <a class="navbar-brand" href="Trangchu.php"><img src="../img/logo.png" alt="" width="350px" height="70px" style="margin-left: 15px"></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <form class="form-inline my-2 my-lg-0">
			      <button class="btn btn-warning btn-sm" type="button" style="font-size: 18px; margin-left: 200px"><a href="Tracuudiem.php">Tra cứu điểm</a></button>
				  <button type="button" class="btn btn-warning btn-sm" style="font-size: 18px; margin-left: 20px; color: red" ><a href="Dangnhap.php">Đăng nhập</a></button>
			    </form>
			  </div> 
        </nav>
	</header>

	<main>
        <div class="container" style="height: 800px; margin-top: 20px">
            <br />
            <h2 align="center">Tìm Kiếm Điểm</h2><br />
            <div class="form-group">
                <div class="input-group">
                    <button type="button" class="btn btn-secondary">Tìm Kiếm</button>
                    <input type="text" name="timkiem" id="timkiem" placeholder="Nhập mã sinh viên,chứng minh thư" class="form-control" />
                </div>
            </div>
            <br />
            <div id="hienthi"></div>
        </div>
	</main>

	<footer class="page-footer">
		<div class="wrapper">
				<div class="footer-col">
					<h3>MAP</h3>
					<a href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+H%E1%BB%8Dc+Th%E1%BB%A7y+L%E1%BB%A3i/@21.0073828,105.822535,17z/data=!3m1!4b1!4m5!3m4!1s0x3135ac8109765ba5:0xd84740ece05680ee!8m2!3d21.0073828!4d105.8247237?hl=vi-VN">
						<img src="../img/TLU-map.png" alt="" width="80%" height="75%"></a>
				</div>
				<div class="footer-col">
					<h3>TRƯỜNG ĐẠI HỌC THỦY LỢI</h3>
					<ul>
							<li>Địa chỉ: 175 Tây Sơn, Đống Đa, Hà Nội</li>
							<li>Điện thoại: (024) 3852 2201</li>
							<li>Email: phonghcth@tlu.edu.vn</li>
					</ul>
				</div>
				<div class="footer-col">
					<h3>TRƯỜNG ĐẠI HỌC THỦY LỢI - CS2</h3>
					<ul>
							<li>Địa chỉ: Số 2, Đường Trường Sa, P.17, Q.Bình Thạnh, Tp.Hồ Chí Minh </li>
							<li>Điện thoại: (84)028.38 400 532</li>
							<li>Email: cs2@tlu.edu.vn</li>
					</ul>
				</div>
				<div class="footer-col">
					<h3>TRƯỜNG ĐẠI HỌC THỦY LỢI - CS2</h3>
					<ul>
							<li>Địa chỉ: Phường An Thạnh, TX Thuận An, Tỉnh Bình Dương</li>
							<li>Điện thoại: (84).650.3748 620</li>
							<li>Fax: (84).650.3833 489</li>
					</ul>
				</div>
		</div>
	</footer>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script>
        $(document).ready(function(){

            load_data();

            function load_data(query)
            {
                $.ajax({
                    url:"search.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#hienthi').html(data);
                    }
                });
            }
            $('#timkiem').keyup(function(){
                var search = $(this).val();
                if(search != '')
                {
                    load_data(search);
                }
                else
                {
                    load_data();
                }
            });
        });
    </script>

</body>
</html>