<?php
require_once("../includes/connection.php");

//Them du lieu
if (isset($_POST['mamon']) && isset($_POST['magv'])) {
    $mamon = $_POST['mamon'];
    $magv = $_POST['magv'];
    $ghichu = $_POST['ghichu'];
    $insert = "INSERT INTO giaovien_mon(magv,mamon,ghichu) VALUES ('$magv','$mamon','$ghichu')  ";
    $ins = mysqli_query($conn, $insert);
}


//Xoa du lieu

if (isset($_POST['newID'])) {
    $id = $_POST['newID'];
    $delete = "DELETE FROM giaovien_mon WHERE giaovien_mon.magv ='$id'  ";
    $del = mysqli_query($conn, $delete);
}


//Load du lieu
$query = "SELECT giaovien_mon.magv,tenmon,tengv,ghichu FROM giaovien_mon,giaovien,monhoc where giaovien_mon.mamon=monhoc.mamon and giaovien_mon.magv=giaovien.magv";
$result = mysqli_query($conn, $query);
$number_of_rows = mysqli_num_rows($result);
$output = '';
$output .= '<table class ="table table-bordered table-triped">
<tr>
   <th>Thứ tự</th>
   <th>Tên môn</th>
   <th>Tên giáo viên phụ trách</th>
   <th>Ghi chú</th>
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
            <td>' . $row['tenmon'] . '</td>
            <td>' . $row['tengv'] . '</td>
            <td>' . $row['ghichu'] . '</td>
            <td><button type="button"  class="btn btn-warning btn-xs edit " id="'. $row['magv'] .'">Cập nhật</button></td>
            <td><button type="button"  class="btn btn-danger btn-xs del " id="'. $row['magv'].'" >Bay màu</button></td>
</tr>';
    }
} else {
    $output .= '<tr>
            <td colspan="6" align="center">Chưa có dữ liệu</td>
</tr>';
}
$output .= '</table>';
echo $output;
?>
