<?php
require_once("../includes/connection.php");

//Them du lieu
if (isset($_POST['malophocphan']) && isset($_POST['masv'])) {
    $malophocphan = $_POST['malophocphan'];
    $masv = $_POST['masv'];
    $trongso = $_POST['trongso'];
    $dcc = $_POST['dcc'];
    $dgk = $_POST['dgk'];
    $dbt = $_POST['dbt'];
    $dth = $_POST['dth'];
    $diemthi = $_POST['diemthi'];
    $insert = "INSERT INTO lop_sinhvien(malophocphan,masv,trongso,dcc,dgk,dbt,dth,diemthi) VALUES ('$malophocphan','$masv','$trongso','$dcc','$dgk','$dbt','$dth','$diemthi')  ";
    $ins = mysqli_query($conn, $insert);
}


//Xoa du lieu

if (isset($_POST['newID'])) {
    $id = $_POST['newID'];
    $delete = "DELETE FROM lop_sinhvien WHERE id ='$id'  ";
    $del = mysqli_query($conn, $delete);
}


//Load du lieu
$query = "SELECT id,tenlophocphan,tensv,dcc,dgk,dbt,dth,trongso,diemthi,((dcc+dgk+dbt+dth)/4) as dqt,((dcc+dgk+dbt+dth)/4)*(1-trongso)+(diemthi*trongso) as dtk  
FROM lop_sinhvien,lophocphan,sinhvien 
where lop_sinhvien.malophocphan=lophocphan.malophocphan and lop_sinhvien.masv=sinhvien.masv";
$result = mysqli_query($conn, $query);
$number_of_rows = mysqli_num_rows($result);
$output = '';
$output .= '<table class ="table table-bordered table-triped" style = "width : 1050px; margin-left : 10px">
<tr>
   <td align = "center">Thứ tự</td>
   <td align = "center">Tên Lớp học phần</td>
   <td align = "center">Tên sinh viên</td>
   <td align = "center">Điểm chuyên cần</td>
   <td align = "center">Điểm giữa kì</td>
   <td align = "center">Điểm bài tập</td>
   <td align = "center">Điểm thực hành</td>
   <td align = "center">Trọng số điểm cuối kì</td>
   <td align = "center">Điểm thi</td>
   <td align = "center">Điểm quá trình</td>
   <td align = "center">Điểm tổng kết</td>
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
            <td align = "center">' . $row['tenlophocphan'] . '</td>
            <td align = "center">' . $row['tensv'] . '</td>
            <td align = "center">' . $row['dcc'] . '</td>
            <td align = "center">' . $row['dgk'] . '</td>
            <td align = "center">' . $row['dbt'] . '</td>
            <td align = "center">' . $row['dth'] . '</td>
            <td align = "center">' . $row['trongso'] . '</td>
            <td align = "center">' . $row['diemthi'] . '</td>
            <td align = "center">' . $row['dqt'] . '</td>
            <td align = "center">' . $row['dtk'] . '</td>
            <td align = "center"><button type="button"  class="btn btn-warning btn-xs edit "  id="'. $row['id'] .'">Cập nhật</button></td>
            <td align = "center"><button type="button"  class="btn btn-danger btn-xs del " id="'.$row['id'].'" >Bay màu</button></td>
</tr>';
    }
} else {
    $output .= '<tr>
            <td colspan="11" align="center">Chưa có dữ liệu</td>
</tr>';
}
$output .= '</table>';
echo $output;
?>