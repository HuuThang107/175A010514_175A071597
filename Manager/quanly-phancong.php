<?php
require_once("../includes/connection.php");

//Them du lieu
if (isset($_POST['mamon'])) {
    $mamon = $_POST['mamon'];
    $magv = $_POST['magv'];
    $ghichu = $_POST['ghichu'];
    $insert = "INSERT INTO giaovien_mon(magv,mamon,ghichu) VALUES ('$magv','$mamon','$ghichu')  ";
    $ins = mysqli_query($conn, $insert);
}


//Xoa du lieu

if (isset($_POST['newID'])) {
    $id = $_POST['newID'];
    $delete = "DELETE FROM giaovien_mon WHERE id ='$id'  ";
    $del = mysqli_query($conn, $delete);
}


//Load du lieu
$query = "SELECT id,tenmon,tengv,ghichu FROM giaovien_mon,giaovien,monhoc where giaovien_mon.mamon=monhoc.mamon and giaovien_mon.magv=giaovien.magv";
$result = mysqli_query($conn, $query);
$number_of_rows = mysqli_num_rows($result);
$output = '';
$output .= '<table class ="table table-bordered table-triped" style="width:900px; margin-left: 230px">
<tr>
   <td align ="center">Thứ tự</td>
   <td align ="center">Tên môn</td>
   <td align ="center">Tên giáo viên phụ trách</td>
   <td align ="center">Ghi chú</td>
   <td align ="center">Xóa</td>
</tr>
';
if ($number_of_rows > 0) {
    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        $count++;
        $output .= '<tr>
            <td align ="center">' . $count . '</td>
            <td align ="center">' . $row['tenmon'] . '</td>
            <td align ="center">' . $row['tengv'] . '</td>
            <td align ="center">' . $row['ghichu'] . '</td>
            <td align ="center"><button type="button"  class="btn btn-danger btn-xs del " id="'. $row['id'].'" >Bay màu</button></td>
            
</tr>';
    }
} else {
    $output .= '<tr>
            <td colspan="5" align="center">Chưa có dữ liệu</td>
</tr>';
}
$output .= '</table>';
echo $output;
?>
