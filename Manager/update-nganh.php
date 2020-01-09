<?php
require_once ("../includes/connection.php");
if(isset($_POST['manganh']))
{
    $id = $_POST['manganh'];
    $tennganh = $_POST['tennganh'];
    $mota = $_POST['mota'];
    $query = "UPDATE nganhhoc SET tennganh = '$tennganh',mota ='$mota' where manganh = '$id'" ;
    $result = mysqli_query($conn,$query);
}
?>