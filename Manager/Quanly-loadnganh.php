<?php
require_once ("../includes/connection.php");
$output = '';
$query = "SELECT * FROM nganhhoc ORDER BY manganh DESC";
$result = mysqli_query($conn, $query);
$output = '
<br />
<h3 align="center">Danh sách</h3>
<table class="table table-bordered table-striped">
 <tr>
  <th width="30%">Tên Ngành</th>
  <th width="20%">Mô tả</th>
  
 </tr>
';
while($row = mysqli_fetch_array($result))
{
    $output .= '
 <tr>
  <td>'.$row["tennganh"].'</td>
  <td>'.$row["mota"].'</td>

 </tr>
 ';
}
$output .= '</table>';
echo $output;
?>
