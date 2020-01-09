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
$output .='<table class ="table table-bordered table-triped">
<tr>
   <th>Thứ tự</th>
   <th>Tên Giao Viên</th>
   <th>Địa chỉ</th>
   <th>Số điện thoại</th>
   <th>Sửa</th>
   <th>Xóa</th>
</tr>
';
if($number_of_rows>0){
    $count = 0;
    while($row = mysqli_fetch_array($result)){
        $count ++;
        $output.='<tr>
            <td>'.$count.'</td>
            <td>'.$row['tengv'].'</td>
            <td>'.$row['diachi'].'</td>
            <td>'.$row['sdt'].'</td>
            <td><button type="button"  class="btn btn-warning btn-xs edit " id="'.$row['magv'].'">Cập nhật</button></td>
            <td><button type="button"  class="btn btn-danger btn-xs del " id="'.$row['magv'].'">Bay màu</button></td>
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