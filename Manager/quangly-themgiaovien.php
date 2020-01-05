<?php
require_once ("../includes/connection.php");


//Them du lieu
if(isset($_POST['tengv']))
{
    $tengv = $_POST['tengv'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $insert = "INSERT INTO giaovien(tengv,diachi,sdt) VALUES ('$tengv','$diachi','$sdt') ";
    $ins = mysqli_query($conn,$insert);

}


//Sua du lieu
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $text = $_POST['text'];
    $column_name = $_POST['column_name'];
    $update = "UPDATE giaovien SET $column_name = '$text' where magv = '$id' ";
    $up = mysqli_query($conn, $update);
}

//Xoa du lieu

if(isset($_POST['magv'])) {
    $id = $_POST['magv'];
    $delete = "DELETE FROM giaovien WHERE magv ='$id' ";
    $del = mysqli_query($conn, $delete);
}


//Load du lieu
$output = '';
$query = "SELECT * FROM giaovien ORDER BY magv DESC";
$result = mysqli_query($conn, $query);
$output = '
<br />
<h3 align="center">Danh sách</h3>
<table class="table table-bordered table-striped">
 <tr>
  <th width="30%">Tên giáo viên</th>
  <th width="30%">Địa chỉ</th>
  <th width="30%">Số điện thoại</th>
  <th width="10%">Quản lý</th>
  
 </tr>
';
while($row = mysqli_fetch_array($result))
{
    $output .= '
 <tr>
  <td class="tengv" data-id_ten='.$row['magv'].' contenteditable>'.$row["tengv"].'</td>
  <td class="diachi" data-id_dc='.$row['magv'].' contenteditable>'.$row["diachi"].'</td>
  <td class="sdt" data-id_sdt='.$row['magv'].' contenteditable>'.$row["sdt"].'</td>
  <td><input type="submit" data-id_del='.$row['magv'].' id="xoa" class="btn btn-sm btn-danger del_data" name="xoa_dulieu" value="X"/input></td>
 </tr>
 ';

}
$output .= '</table>';
echo $output;




?>