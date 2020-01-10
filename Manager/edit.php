<?php
require_once ("../includes/connection.php");
if(isset($_POST['manganh']))
{
    $query = "SELECT * FROM nganhhoc where manganh = '".$_POST['manganh']."'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

if(isset($_POST['mamon']))
{
    $query = "SELECT * FROM monhoc where mamon = '".$_POST['mamon']."'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

if(isset($_POST['magv']))
{
    $query = "SELECT * FROM giaovien where magv = '".$_POST['magv']."'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

if(isset($_POST['malophocphan']))
{
    $query = "SELECT * FROM lophocphan where malophocphan = '".$_POST['malophocphan']."'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}




?>
