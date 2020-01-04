<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="../css/dangnhap.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
</head>
<body>
  <form method="POST" action="Dangnhap.php">
<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
      <div class="user_card">
        <div class="d-flex justify-content-center">
          <div class="brand_logo_container">
            <img src="../img/icon.png" class="brand_logo" alt="Logo">
          </div>
        </div>
        <div class="form_container">
          <form>
              <div class="input-group" style="font-size: 50px">
                <span><i class="fa fa-user"></i></span>
                <input type="text" name="username" value="" placeholder="Tài khoản" style="font-size: 20px" >
              </div>
              <div class="input-group" style="font-size: 40px">
                <span><i class="fa fa-key"></i></span>
                <input type="password" name="password" value="" placeholder="Mật khẩu" style="font-size: 20px">
            </div>

            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customControlInline">
                <label class="custom-control-label" for="customControlInline">Ghi nhớ</label>
              </div>
            </div>
              <div class=" justify-content-center mt-3 login_container">
          <input type="submit" name="btn_submit" class="btn-warning login_btn" style="font-size: 18px" value="Đăng Nhập">
           </div>
          </form>
        </div>

        <div class="mt-4">
          <div class="d-flex justify-content-center links">
            <a href="#">Quên mật khẩu ?</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
</body>
</html>

<?php
session_start();
?>

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
        echo "username hoặc password bạn không được để trống!";
    }else{
        $sql = "select * from taikhoan where tentk = '$username' and matkhau = '$password' ";

        $query = mysqli_query($conn,$sql);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows==0) {
            echo "tên đăng nhập hoặc mật khẩu không đúng !";
        }else{

            while ( $data = mysqli_fetch_array($query) ) {
                $_SESSION["id"] = $data["id"];
                $_SESSION['tentk'] = $data["tentk"];
                $_SESSION["matkhau"] = $data["mk"];
                $_SESSION["level"] = $data["level"];
                if($data['level']==3){
                    header("location: ../Admin/Quantri_danhsachgiangvien.php");
                }
                elseif ($data['level']==2){
                    header("location: ../Manager/Quanly_danhsachlop.php");
                }
                else{
                    header("location: ../Teacher/Giangvien_danhsachsinhvien.php");
                }

            }



        }
    }
}
?>