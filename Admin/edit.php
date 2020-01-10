<?php
require_once ("../includes/connection.php");
if(isset($_POST['id']))
{
    $query = "SELECT * FROM taikhoan where id = '".$_POST['id']."'  ";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}
?>