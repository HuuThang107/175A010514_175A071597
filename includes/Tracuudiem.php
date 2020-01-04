<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang chủ</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../font/css/all.css">
	<link rel="stylesheet" href="../css/Trangchu.css">
</head>
<body>
	<header>
			<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #ff8936";>
			  <a class="navbar-brand" href="Trangchu.php"><img src="../img/logo.png" alt="" width="350px" height="70px" style="margin-left: 15px"></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <form class="form-inline my-2 my-lg-0">
			      <button class="btn btn-warning btn-sm" type="button" style="font-size: 18px; margin-left: 10px"><a href="Tracuudiem.php">Tra cứu điểm</a></button>
				  <button type="button" class="btn btn-warning btn-sm" style="font-size: 18px; margin-left: 20px; color: red" ><a href="Dangnhap.php">Đăng nhập</a></button>
			    </form>
			  </div> 
        </nav>
	</header>

	<main>
		<div class="container">
							<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
				    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>				  </ol>
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img src="../img/slide1.png" class="d-block w-100" alt="...">
				      <div class="carousel-caption d-none d-md-block">
				        <h5>Lễ kỉ niệm</h5>
				        <p>60 năm thành lập trường (1959 -2019)</p>
				      </div>
				    </div>
				    <div class="carousel-item">
				      <img src="../img/slide2.png" class="d-block w-100" alt="...">
				      <div class="carousel-caption d-none d-md-block">
				        <h5>Chuỗi hoạt động </h5>
				        <p>60 năm thành lập trường (1959- 2019)</p>
				      </div>
				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
		</div>

		<div class="row">
  			

		</div>
		<div style="height: 300px">
		<div class="container">
			<div class="row" style="margin-top: 50px">
			<div class="col-md-push-3" style="margin-left: 30px; height:100%"><h2 style="color: blue">Tra cứu điểm thi</h2></div>
			<div class="col-md-push-9">
				<form class="form-inline my-2 my-lg-0" style="margin-left: 200px">
      				<input class="form-control mr-sm-2" type="search" placeholder="Nhập MSV, CMT" aria-label="Search" style="height: 30px;">
      				<button type="button" class="btn btn-danger btn-sm " style="font-size: 10px;">Tìm</button>
    			</form>
			</div>
			<form class="form-group row" style="margin-left: 180px ; margin-top: 20px">
			<div class="label">Năm học :</div>
			<div class="value" style="margin-left: 10px">
				<select name="select" id="">
					<option selected="selected">2018-2019</option>
					<option value="1">2017-2018</option>
					<option value="1">2016-2017</option>
				</select>
			</div>
			<div class="label" style="margin-left: 30px">Học kì :</div>
			<div class="value" style="margin-left: 10px">
				<select name="select" id="">
					<option selected="selected">Học kì II 2018-2019</option>
					<option value="1">Học kì I 2018-2019</option>
					<option value="1">Học kì II 2017-2018</option>
					<option value="1">Học kì I 2017-2018</option>
					<option value="1">Học kì II 2016-2017</option>
					<option value="1">Học kì I 2016-2017</option>
				</select>
			</div>
			<div class="label" style="margin-left: 30px">Giai đoạn :</div>
			<div class="value" style="margin-left: 10px">
				<select name="select" id="">
					<option selected="selected">Học kì II 2018-2019 (GĐ2)</option>
					<option selected="selected">Học kì II 2018-2019 (GĐ1)</option>
					<option value="1">Học kì I 2018-2019(GĐ2)</option>
					<option value="1">Học kì I 2018-2019(GĐ1)</option>
					<option value="1">Học kì II 2017-2018(GĐ2)</option>
					<option value="1">Học kì II 2017-2018(GĐ1)</option>
					<option value="1">Học kì I 2017-2018(GĐ2)</option>
					<option value="1">Học kì I 2017-2018(GĐ1)</option>
					<option value="1">Học kì II 2016-2017(GĐ2)</option>
					<option value="1">Học kì II 2016-2017(GĐ1)</option>
					<option value="1">Học kì I 2016-2017(GĐ2)</option>
					<option value="1">Học kì I 2016-2017(GĐ1)</option>
				</select>
			</div>
                <div class="example">
                    <div class="container">
                        <div class="row">
                            <h2>Thông tin điểm</h2>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Lớp</th>
                                        <th>Tên sinh viên</th>
                                        <th>Điểm chuyên cần</th>
                                        <th>Điểm giữa kì</th>
                                        <th>Điểm quá trình</th>
                                        <th>Điểm thi</th>
                                        <th>Điểm KTHP</th>
                                        <th>Điểm chữ</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
			</form>
			</div>
		</div>
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
				<div class="footer-col-social">
					<h3>Liên hệ</h3>
					<ul>
							<li><a href="https://www.facebook.com/groups/dhthuyloi/" class="fb"><i class="fa fa-facebook"></i></a></li>
							<li><a href="http://www.tlu.edu.vn/" class="gg"><i class="fa fa-google"></i></a></li>
					</ul>
				</div>
		</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="../css/bootstrap.js"></script>
</body>
</html>