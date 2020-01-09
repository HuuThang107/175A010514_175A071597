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
    $delete = "DELETE FROM lop_sinhvien WHERE lop_sinhvien.masv ='$id'  ";
    $del = mysqli_query($conn, $delete);
}


//Load du lieu
$query = "SELECT lop_sinhvien.masv,tenlophocphan,tensv,dcc,dgk,dbt,dth,trongso,diemthi,((dcc+dgk+dbt+dth)/4) as dqt,(((dcc+dgk+dbt+dth)/4)*trongso)+(diemthi*(1-trongso)) as dtk  FROM lop_sinhvien,lophocphan,sinhvien where lop_sinhvien.malophocphan=lophocphan.malophocphan and lop_sinhvien.masv=sinhvien.masv";
$result = mysqli_query($conn, $query);
$number_of_rows = mysqli_num_rows($result);
$output = '';
$output .= '<table class ="table table-bordered table-triped">
<tr>
   <th>Thứ tự</th>
   <th>Tên Lớp học phần</th>
   <th>Tên sinh viên</th>
   <th>Điểm chuyên cần</th>
   <th>Điểm giữa kì</th>
   <th>Điểm bài tập</th>
   <th>Điểm thực hành</th>
   <th>Trọng số điểm quá trình</th>
   <th>Điểm thi</th>
   <th>Điểm quá trình</th>
   <th>Điểm tổng kết</th>
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
            <td>' . $row['tenlophocphan'] . '</td>
            <td>' . $row['tensv'] . '</td>
            <td>' . $row['dcc'] . '</td>
            <td>' . $row['dgk'] . '</td>
            <td>' . $row['dbt'] . '</td>
            <td>' . $row['dth'] . '</td>
            <td>' . $row['trongso'] . '</td>
            <td>' . $row['diemthi'] . '</td>
            <td>' . $row['dqt'] . '</td>
            <td>' . $row['dtk'] . '</td>
            <td><button type="button"  class="btn btn-warning btn-xs edit " id="'. $row['masv'] .'">Cập nhật</button></td>
            <td><button type="button"  class="btn btn-danger btn-xs del " id="'. $row['masv'].'" >Bay màu</button></td>
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