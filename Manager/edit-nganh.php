<?php
require_once ("../includes/connection.php");
if(isset($_POST['manganh']))
{
    $query = "SELECT * FROM nganhhoc where manganh = '".$_POST['manganh']."'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}
?>
