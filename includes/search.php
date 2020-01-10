<?php
require_once ("../includes/connection.php");
$output = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "
  SELECT tenlophocphan,tensv,cmt,dcc,dgk,dbt,dth,trongso,diemthi,((dcc+dgk+dbt+dth)/4) as dqt,((dcc+dgk+dbt+dth)/4)*(1-trongso)+(diemthi*trongso) as dtk 
   FROM lop_sinhvien,lophocphan,sinhvien 
  WHERE lop_sinhvien.malophocphan=lophocphan.malophocphan and lop_sinhvien.masv=sinhvien.masv and
    cmt LIKE '%" . $search . "%' 
 ";
}
else {
    $query = "
  SELECT tenlophocphan,tensv,dcc,dgk,dbt,dth,trongso,diemthi,((dcc+dgk+dbt+dth)/4) as dqt,((dcc+dgk+dbt+dth)/4)*(1-trongso)+(diemthi*trongso) as dtk  
FROM lop_sinhvien,lophocphan,sinhvien 
where lop_sinhvien.malophocphan=lophocphan.malophocphan and lop_sinhvien.masv=sinhvien.masv
 ";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Tên lớp học phần</th>
     <th>Tên sinh viên</th>
     <th>Điểm chuyên cần</th>
     <th>Điểm giữa kì</th>
     <th>Điểm bài tập</th>
     <th>Điểm thực hành</th>
     <th>Điểm trọng số điểm cuối kì</th>
     <th>Điểm thi cuối kì</th>
     <th>Điểm quá trình</th>
     <th>Điểm tổng kết</th>
    </tr>
 ';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
   <tr>
    <td>' . $row["tenlophocphan"] . '</td>
    <td>' . $row["tensv"] . '</td>
    <td>' . $row["dcc"] . '</td>
    <td>' . $row["dgk"] . '</td>
    <td>' . $row["dbt"] . '</td>
    <td>' . $row["dth"] . '</td>
    <td>' . $row["trongso"] . '</td>
    <td>' . $row["diemthi"] . '</td>
    <td>' . $row["dqt"] . '</td>
    <td>' . $row["dtk"] . '</td>
   </tr>
  ';
    }
    echo $output;
} else {
    echo 'Không có thông tin';
}
?>

