<?php
//fetch.php
require_once ("../includes/connection.php");
$output = '';
$query = "SELECT * FROM giaovien ORDER BY magv DESC";
$result = mysqli_query($conn, $query);
$output = '
<br />
<h3 align="center">Danh sach</h3>
<table class="table table-bordered table-striped">
 <tr>
  <th width="30%">Tên giáo viên</th>
  <th width="20%">Địa chỉ</th>
  <th width="50%">Số điện thoại</th>
  
 </tr>
';
while($row = mysqli_fetch_array($result))
{
    $output .= '
 <tr>
  <td>'.$row["tengv"].'</td>
  <td>'.$row["diachi"].'</td>
  <td>'.$row["sdt"].'</td>
 </tr>
 ';
}
$output .= '</table>';
echo $output;
?>
