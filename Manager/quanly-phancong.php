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
$output .= '<table class ="table table-bordered table-triped" style = "margin-left: 200px ; width: 900px">
<tr>
   <td align = "center">Thứ tự</td>
   <td align = "center">Tên môn</td>
   <td align = "center">Tên giáo viên phụ trách</td>
   <td align = "center">Ghi chú</td>
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
            <td align = "center">' . $row['tenmon'] . '</td>
            <td align = "center">' . $row['tengv'] . '</td>
            <td align = "center">' . $row['ghichu'] . '</td>
            <td align = "center"><button type="button"  class="btn btn-warning btn-xs edit " id="'. $row['magv'] .'">Cập nhật</button></td>
            <td align = "center"><button type="button"  class="btn btn-danger btn-xs del " id="'. $row['magv'].'" >Bay màu</button></td>
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
