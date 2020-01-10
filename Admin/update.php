<?php
require_once ("../includes/connection.php");
if(isset($_POST['id']))
{
    $id = $_POST['id'];
    $tentk = $_POST['tentk'];
    $matkhau = $_POST['matkhau'];
    $cap = $_POST['cap'];
    $email = $_POST['email'];
    $query = "UPDATE taikhoan SET tentk = '$tentk',matkhau = '$matkhau',cap='$cap',email ='$email' where id = '$id' " ;
    $result = mysqli_query($conn,$query);
}
?>
