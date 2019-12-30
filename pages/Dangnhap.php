<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="../css/dangnhap.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
</head>
<body style="background-image: url('../img/tlu3.jpg')">
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
                <input type="text" name="" value="" placeholder="Tài khoản" style="font-size: 20px" >
              </div>
              <div class="input-group" style="font-size: 40px">
                <span><i class="fa fa-key"></i></span>
                <input type="password" name="" value="" placeholder="Mật khẩu" style="font-size: 20px">
            </div>

            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customControlInline">
                <label class="custom-control-label" for="customControlInline">Ghi nhớ</label>
              </div>
            </div>
              <div class=" justify-content-center mt-3 login_container">
          <button type="button" name="button" class="btn-warning login_btn" style="font-size: 18px"><a href="#">Đăng nhập</a></button>
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
</body>
</html>