<?php
require_once ("../includes/connection.php");


//Them du lieu
if(isset($_POST['tentk']))
{
    $tentk = $_POST['tentk'];
    $matkhau = $_POST['matkhau'];
    $level = $_POST['cap'];
    $tennguoidung = $_POST['tennguoidung'];
    $insert = "INSERT INTO taikhoan(tentk,matkhau,cap,tennguoidung) VALUES ('$tentk','$matkhau','$level','$tennguoidung') ";
    $ins = mysqli_query($conn,$insert);

}


//Sua du lieu
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $text = $_POST['text'];
    $column_name = $_POST['column_name'];
    $update = "UPDATE taikhoan SET $column_name = '$text' where id = '$id' ";
    $up = mysqli_query($conn, $update);
}

//Xoa du lieu

if(isset($_POST['newID'])) {
    $id = $_POST['newID'];
    $delete = "DELETE FROM taikhoan WHERE id ='$id' and cap <3 ";
    $del = mysqli_query($conn, $delete);
}


//Load du lieu
$output = '';
$query = "SELECT * FROM taikhoan ORDER BY id DESC";
$result = mysqli_query($conn, $query);
$output = '
<br />
<h3 align="center">Danh sách</h3>
<table class="table table-bordered table-striped">
 <tr>
  <th width="20%">Tên tài khoản</th>
  <th width="20%">Mật khẩu</th>
  <th width="20%">Level</th>
    <th width="30%">Tên người dùng</th>
  <th width="10%">Quản lý</th>
  
 </tr>
';
while($row = mysqli_fetch_array($result))
{
    $output .= '
 <tr>
  <td class="tengv" data-id_ten='.$row['id'].' contenteditable>'.$row["tentk"].'</td>
  <td class="matkhau" data-id_mk='.$row['id'].' contenteditable>'.$row["matkhau"].'</td>
  <td class="cap" data-id_lv='.$row['id'].' contenteditable>'.$row["cap"].'</td>
  <td class="tennguoidung" data-id_tennd='.$row['id'].' contenteditable>'.$row["tennguoidung"].'</td>
  <td><input type="submit" data-id_del='.$row['id'].' id="xoa" class="btn btn-sm btn-danger del_data" name="xoa_dulieu" value="X"/input></td>
 </tr>
 ';

}
$output .= '</table>';
echo $output;
?>
