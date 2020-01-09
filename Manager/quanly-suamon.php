<?php
require_once ("../includes/connection.php");
if(isset($_POST['mamon'])){
    $mamon = $_POST['mamon'];
    $query = "SELECT * FROM monhoc where mamon='$mamon'";
    $result = mysqli_query($conn,$query);
    while ($row = mysqli_fetch_array($result)){

    }
}

?>
