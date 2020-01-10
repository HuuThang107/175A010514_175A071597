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
$output .= '<table class ="table table-bordered table-triped" style="width : 900px; margin-left : 100px">
<tr>
   <td align = "center">Thứ tự</td>
   <td align = "center">Tên sinh viên</td>
   <td align = "center">Chứng minh thư</td>
   <td align = "center">Địa chỉ</td>
   <td align = "center">Lớp</td>
   <td align = "center">Sửa</td>
   <td align = "center">Xóa</td>
</tr>
';
if ($number_of_rows > 0) {
    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        $count++;
        $output .= '<tr>
            <td align = "center">' . $count . '</td>
            <td align = "center">' . $row['tensv'] . '</td>
            <td align = "center">' . $row['cmt'] . '</td>
            <td align = "center">' . $row['diachi'] . '</td>
            <td align = "center">' . $row['lop'] . '</td>
            <td align = "center"><button type="button"  class="btn btn-warning btn-xs edit " id="' . $row['masv'] . '">Cập nhật</button></td>
            <td align = "center"><button type="button"  class="btn btn-danger btn-xs del " id="' . $row['masv'] . '">Bay màu</button></td>
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