<?php
require_once ("../includes/connection.php");
$output = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "
  SELECT id,tenlophocphan,tensv,cmt,dcc,dgk,dbt,dth,trongso,diemthi,((dcc+dgk+dbt+dth)/4) as dqt,((dcc+dgk+dbt+dth)/4)*(1-trongso)+(diemthi*trongso) as dtk 
   FROM lop_sinhvien,lophocphan,sinhvien 
  WHERE  
    (cmt LIKE '%" . $search . "%'
     or lop_sinhvien.masv LIKE '%" . $search . "%' )and lop_sinhvien.malophocphan = lophocphan.malophocphan and lop_sinhvien.masv=sinhvien.masv 
 ";
}
else {
    $query = "
  SELECT id,tenlophocphan,tensv,dcc,dgk,dbt,dth,trongso,diemthi,((dcc+dgk+dbt+dth)/4) as dqt,((dcc+dgk+dbt+dth)/4)*(1-trongso)+(diemthi*trongso) as dtk  
FROM lop_sinhvien,lophocphan,sinhvien 
where lop_sinhvien.malophocphan=lophocphan.malophocphan and lop_sinhvien.masv=sinhvien.masv
 ";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '
  <div class="table-responsive">
   <table class="table table-bordered table-triped" style = "width : 1100px">
    <tr>
     <td align = "center">Tên lớp học phần</td>
     <td align = "center">Tên sinh viên</td>
     <td align = "center">Điểm chuyên cần</td>
     <td align = "center">Điểm giữa kì</td>
     <td align = "center">Điểm bài tập</td>
     <td align = "center">Điểm thực hành</td>
     <td align = "center">Điểm trọng số điểm cuối kì</td>
     <td align = "center">Điểm thi cuối kì</td>
     <td align = "center">Điểm quá trình</td>
     <td align = "center">Điểm tổng kết</td>
    </tr>
 ';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
   <tr>
    <td align="center">' . $row["tenlophocphan"] . '</td>
    <td align="center">' . $row["tensv"] . '</td>
    <td align="center">' . $row["dcc"] . '</td>
    <td align="center">' . $row["dgk"] . '</td>
    <td align="center">' . $row["dbt"] . '</td>
    <td align="center">' . $row["dth"] . '</td>
    <td align="center">' . $row["trongso"] . '</td>
    <td align="center">' . $row["diemthi"] . '</td>
    <td align="center">' . $row["dqt"] . '</td>
    <td align="center">' . $row["dtk"] . '</td>
   </tr>
  ';
    }
    echo $output;
} else {
    echo 'Không có thông tin';
}
?>

