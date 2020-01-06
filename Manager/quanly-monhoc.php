<?php

require_once ("../includes/connection.php");

require_once ("../includes/connection.php");
$query = "SELECT * FROM nganhhoc ORDER BY manganh DESC";
$result = mysqli_query($conn, $query);

//Them du lieu
if(isset($_POST['tenmon']))
{
    $tenmon = $_POST['tenmon'];
    $nganh = $_POST['nganh'];
    $insert = "INSERT INTO monhoc(tenmon,nganh) VALUES ('$tenmon','$nganh') ";
    $ins = mysqli_query($conn,$insert);

}


//Sua du lieu
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $text = $_POST['text'];
    $column_name = $_POST['column_name'];
    $update = "UPDATE monhoc SET $column_name = '$text' where mamon = '$id' ";
    $up = mysqli_query($conn, $update);
}

//Xoa du lieu

if(isset($_POST['newID'])) {
    $id = $_POST['newID'];
    $delete = "DELETE FROM monhoc WHERE mamon ='$id'  ";
    $del = mysqli_query($conn, $delete);
}


//Load du lieu
$output = '';
$query = "SELECT mamon,tenmon,tennganh FROM monhoc,nganhhoc where monhoc.nganh = nganhhoc.manganh";
$result = mysqli_query($conn, $query);
$output = '
<br />
<h3 align="center">Danh sách</h3>
<table class="table table-bordered table-striped">
 <tr>
  <th width="45%">Tên Môn</th>
  <th width="45%">Tên Ngành</th>
  <th width="10%">Quản lý</th>
  
 </tr>
';
while($row = mysqli_fetch_array($result))
{
    $output .= '
 <tr>
  <td class="tenmon" data-id_ten='.$row['mamon'].' contenteditable>'.$row["tenmon"].'</td>
  <td class="nganh" data-id_nganh='.$row['mamon'].' contenteditable>'.$row["tennganh"].'</td>
  <td><input type="submit" data-id_del='.$row['mamon'].' id="xoa" class="btn btn-sm btn-danger del_data" name="xoa_dulieu" value="X"/input></td>
 </tr>
 ';

}
$output .= '</table>';
echo $output;
?>