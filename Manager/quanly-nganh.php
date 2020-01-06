<?php
require_once ("../includes/connection.php");


//Them du lieu
if(isset($_POST['tennganh']))
{
    $tennganh = $_POST['tennganh'];
    $mota = $_POST['mota'];
    $insert = "INSERT INTO nganhhoc(tennganh,mota) VALUES ('$tennganh','$mota') ";
    $ins = mysqli_query($conn,$insert);

}


//Sua du lieu
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $text = $_POST['text'];
    $column_name = $_POST['column_name'];
    $update = "UPDATE nganhhoc SET $column_name = '$text' where manganh = '$id' ";
    $up = mysqli_query($conn, $update);
}

//Xoa du lieu

if(isset($_POST['newID'])) {
    $id = $_POST['newID'];
    $delete = "DELETE FROM nganhhoc WHERE manganh ='$id' ";
    $del = mysqli_query($conn, $delete);
}


//Load du lieu
$output = '';
$query = "SELECT * FROM nganhhoc ORDER BY manganh DESC";
$result = mysqli_query($conn, $query);
$output = '
<br />
<h3 align="center">Danh sách</h3>
<table class="table table-bordered table-striped">
 <tr>
  <th width="45%">Tên ngành học</th>
  <th width="45%">Mô tả</th>
  <th width="10%">Quản lý</th>
  
 </tr>
';
while($row = mysqli_fetch_array($result))
{
    $output .= '
 <tr>
  <td class="tennganh" data-id_ten='.$row['manganh'].' contenteditable>'.$row["tennganh"].'</td>
  <td class="mota" data-id_mt='.$row['manganh'].' contenteditable>'.$row["mota"].'</td>
  <td><input type="submit" data-id_del='.$row['manganh'].' id="xoa" class="btn btn-sm btn-danger del_data" name="xoa_dulieu" value="X"/input></td>
 </tr>
 ';

}
$output .= '</table>';
echo $output;
?>
