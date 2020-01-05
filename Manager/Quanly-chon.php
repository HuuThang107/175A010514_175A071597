<?php
require_once ("../includes/connection.php");

$query = "SELECT * FROM giaovien ORDER BY magv DESC";

$result = mysqli_query($conn, $query);


while($row = mysqli_fetch_array($result))
{
$data[] = $row;
}

echo json_encode($data);


?>