<?php
require_once ("../includes/connection.php");

//Them du lieu
if(isset($_POST['tentk']))
{
    $tentk = $_POST['tentk'];
    $matkhau = $_POST['matkhau'];
    $cap = $_POST['cap'];
    $email = $_POST['email'];
    $insert = "INSERT INTO taikhoan(tentk,matkhau,cap,email) VALUES ('$tentk','$matkhau','$cap','$email') ";
    $ins = mysqli_query($conn,$insert);

}

//Xoa du lieu

if(isset($_POST['newID'])) {
    $id = $_POST['newID'];
    $delete = "DELETE FROM taikhoan WHERE id ='$id' ";
    $del = mysqli_query($conn, $delete);
}

//Load du lieu
$query = "SELECT * FROM taikhoan";
$result = mysqli_query($conn, $query);
$number_of_rows = mysqli_num_rows($result);
$output = '';
$output .='<table class ="table table-bordered table-triped" style="width : 800px; margin-left: 150px; margin-top: 20px">
<tr>
   <td align = "center">Thứ tự</td>
   <td align = "center">Tên tài khoản</td>
   <td align = "center">Mật khẩu</td>
   <td align = "center">Quyền</td>
   <td align = "center">Email</td>
   <td align = "center">Sửa</td>
   <td align = "center">Xóa</td>
</tr>
';
if($number_of_rows>0){
    $count = 0;
    while($row = mysqli_fetch_array($result)){
        $count ++;
        $output.='<tr>
            <td align = "center">'.$count.'</td>
            <td>'.$row['tentk'].'</td>
            <td align = "center">'.$row['matkhau'].'</td>
            <td align = "center">'.$row['cap'].'</td>
            <td>'.$row['email'].'</td>
            <td align = "center"><button type="button"  class="btn btn-warning btn-xs edit " id="'.$row['id'].'">Cập nhật</button></td>
            <td align = "center"><button type="button"  class="btn btn-danger btn-xs del " id="'.$row['id'].'">Bay màu</button></td>
</tr>';
    }
}
else{
    $output.='<tr>
            <td colspan="7" align="center">Chưa có dữ liệu</td>
</tr>';
}
$output.='</table>';
echo $output;

?>
