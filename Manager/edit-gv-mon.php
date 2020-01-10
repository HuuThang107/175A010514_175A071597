<?php

if(isset($_POST['mamon']))
{
    $query = "SELECT * FROM giaovien_mon where mamon = '".$_POST['mamon']."'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}
?>
