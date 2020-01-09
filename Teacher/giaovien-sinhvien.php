<?php
require_once("../includes/connection.php");


//Them du lieu
if (isset($_POST['tensv'])) {
    $tensv = $_POST['tensv'];
    $cmt = $_POST['cmt'];
    $diachi = $_POST['diachi'];
    $lop = $_POST['lop'];
    $insert = "INSERT INTO sinhvien(tensv,cmt,diachi,lop) VALUES ('$tensv','$cmt','$diachi','$lop') ";
    $ins = mysqli_query($conn, $insert);

}




//Xoa du lieu

if (isset($_POST['newID'])) {
    $id = $_POST['newID'];
    $delete = "DELETE FROM sinhvien WHERE masv ='$id' ";
    $del = mysqli_query($conn, $delete);
}


//Load du lieu
$query = "SELECT * FROM sinhvien ";
$result = mysqli_query($conn, $query);
$number_of_rows = mysqli_num_rows($result);
$output = '';
$output .= '<table class ="table table-bordered table-triped">
<tr>
   <th>Thứ tự</th>
   <th>Tên sinh viên</th>
   <th>Chứng minh thư</th>
   <th>Địa chỉ</th>
   <th>Lớp</th>
   <th>Sửa</th>
   <th>Xóa</th>
</tr>
';
if ($number_of_rows > 0) {
    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        $count++;
        $output .= '<tr>
            <td>' . $count . '</td>
            <td>' . $row['tensv'] . '</td>
            <td>' . $row['cmt'] . '</td>
            <td>' . $row['diachi'] . '</td>
            <td>' . $row['lop'] . '</td>
            <td><button type="button"  class="btn btn-warning btn-xs edit " id="' . $row['masv'] . '">Cập nhật</button></td>
            <td><button type="button"  class="btn btn-danger btn-xs del " id="' . $row['masv'] . '">Bay màu</button></td>
</tr>';
    }
} else {
    $output .= '<tr>
            <td colspan="7" align="center">Chưa có dữ liệu</td>
</tr>';
}
$output .= '</table>';
echo $output;
?>