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




//Xoa du lieu

if(isset($_POST['newID'])) {
    $id = $_POST['newID'];
    $delete = "DELETE FROM giaovien WHERE magv ='$id' ";
    $del = mysqli_query($conn, $delete);
}


//Load du lieu
$query = "SELECT * FROM giaovien";
$result = mysqli_query($conn, $query);
$number_of_rows = mysqli_num_rows($result);
$output = '';
$output .='<table class ="table table-bordered table-triped" style = "width : 900px; margin-left: 200px ">
<tr>
   <th align = "center">Thứ tự</th>
   <th align = "center">Tên Giáo Viên</th>
   <th align = "center">Địa chỉ</th>
   <th align = "center">Số điện thoại</th>
   <th align = "center">Sửa</th>
   <th align = "center">Xóa</th>
</tr>
';
if($number_of_rows>0){
    $count = 0;
    while($row = mysqli_fetch_array($result)){
        $count ++;
        $output.='<tr>
            <td align = "center">'.$count.'</td>
            <td align = "center">'.$row['tengv'].'</td>
            <td align = "center">'.$row['diachi'].'</td>
            <td align = "center">'.$row['sdt'].'</td>
            <td align = "center"><button type="button"  class="btn btn-warning btn-xs edit " id="'.$row['magv'].'">Cập nhật</button></td>
            <td align = "center"><button type="button"  class="btn btn-danger btn-xs del " id="'.$row['magv'].'">Bay màu</button></td>
</tr>';
    }
}
else{
    $output.='<tr>
            <td colspan="6" align="center">Chưa có dữ liệu</td>
</tr>';
}
$output.='</table>';
echo $output;
?>