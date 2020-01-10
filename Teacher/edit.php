<?php
require_once ("../includes/connection.php");
if(isset($_POST['masv']))
{
    $query = "SELECT * FROM sinhvien where masv = '".$_POST['masv']."'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}
if(isset($_POST['id']))
{
    $query = "SELECT * FROM lop_sinhvien where id = '".$_POST['id']."'  ";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

?>