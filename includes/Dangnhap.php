<?php ob_start() ?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../img/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!--===============================================================================================-->

</head>
<body>
<a href="Trangchu.php">Quay lại</a>
<div class="limiter">
    <div class="container-login100" style="background-image: url('../img/bg-01.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="Dangnhap.php">
          <span class="login100-form-logo">
            <i class="zmdi zmdi-landscape"></i>
          </span>

                <span class="login100-form-title p-b-34 p-t-27">
            Log in
          </span>

                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="text" name="username" placeholder="Tài khoản">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Mật khẩu">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>


                <div class="container-login100-form-btn">
                    <input class="login100-form-btn" type="submit" name="btn_submit" value="Login">
                </div>
                <div class="text-center p-t-90">
                    <a class="txt1" href="#">
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="../vendor/bootstrap/js/popper.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="../vendor/daterangepicker/moment.min.js"></script>
<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="../js/main.js"></script>

</body>

</html>
<?php
require_once ("../includes/connection.php");

if (isset($_POST["btn_submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    if ($username == "" || $password =="") {
        echo ("username hoặc password bạn không được để trống!") ;
    }else{
        $sql = "select * from taikhoan where tentk = '$username' and matkhau = '$password' ";

        $query = mysqli_query($conn,$sql);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows==0) {
            echo("tên đăng nhập hoặc mật khẩu không đúng !") ;
        }else{

            while ( $data = mysqli_fetch_array($query) ) {
                $_SESSION["id"] = $data["id"];
                $_SESSION['tentk'] = $data["tentk"];
                $_SESSION["matkhau"] = $data["matkhau"];
                $_SESSION["cap"] = $data["cap"];
                $_SESSION["email"] = $data["email"];

                if($data['cap']==3){
                    header("location: ../Admin/Quantri_danhsachquantri.php");
                }
                elseif ($data['cap']==2){
                    header("location: ../Manager/Quanly_danhsachnganh.php");
                }
                elseif($data['cap']==1){
                    header("location: ../Teacher/Giangvien_nhap.php");
                }

            }
        }
    }
}
?>


